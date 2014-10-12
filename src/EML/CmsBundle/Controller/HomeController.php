<?php

namespace EML\CmsBundle\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EML\CmsBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{

    public function indexAction()
    {   
        /*  
         * Perform redirect for _local
         */
        $params=array();
        return $this->redirect($this->generateUrl('eml_cms_home_lang', $params));
    }

    public function homeAction()
    {
        
        $LOCAL = $this->get('request')->getLocale();
        
        $Globalizer = $this->get('Globalizer');
        $menu = $Globalizer->getMenus($LOCAL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        
        $sections = $Globalizer->getSections($LOCAL,NULL);
        //echo '<pre>';print_r($sections);echo '</pre>';
        //echo'<pre>';print_r($featured_home);echo'</pre>';
        
        $viewParams = array(
            'sections' => $sections,
            'featured' => $featured_home,
            'menu' => $menu
        );
        
        #$viewParams['Variables']=json_encode($viewParams,true);
        
        
        //$viewParams['Variables']=$viewParams;
        //echo'<pre>';print_r($viewParams);echo'</pre>';
        return $this->render('EMLCmsBundle:Home:index.html.twig', $viewParams);
    }
    
    public function qAction()
    {
        $LOCAL = $this->get('request')->getLocale();
        
        $Globalizer = $this->get('Globalizer');
        $menu = $Globalizer->getMenus($LOCAL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        
        $sections = $Globalizer->getSections($LOCAL,NULL);
        //echo '<pre>';print_r($sections);echo '</pre>';
        //echo'<pre>';print_r($featured_home);echo'</pre>';
        
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        $q = $this->get('request')->request->get('q');

        $elements = $qb->select('
                e.id,
                e.title,
                e.slug,
                e.description,
                e.keywords,
                e.h1,
                e.h2,
                e.text,
                e.abstract,
                e.weight,
                e.listed,
                e.isaccessible,
                e.redirect,
                e.lang,
                e.createdon,
                e.modifyon
            ')
            ->from('EMLCmsBundle:Element', 'e')
            ->where('e.isaccessible = 1')
            ->andWhere(" e.lang = '".$LOCAL."' ")
            ->andWhere(" e.h1 LIKE '%".$q."%' ")
            ->getQuery()
            ->execute();
        
        $viewParams = array(
            'sections' => $sections,
            'name' => 'world',
            'elements'=>$elements,
            'featured' => $featured_home,
            'menu' => $menu
        );
        return $this->render('EMLCmsBundle:Home:search_results.html.twig', $viewParams);
    }
}
