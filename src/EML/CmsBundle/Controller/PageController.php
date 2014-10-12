<?php

namespace EML\CmsBundle\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EML\CmsBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PageController extends Controller
{
    public function elementAction(Request $request,$slug)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Element');
        $ele = $repo->findOneBySlug($slug);
        if($ele)
            $eleCat = $ele->getCategories();
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Category');
        
        $eleCatArea=null;
        if(isset($eleCat[0]))
        {
            $firstCat = $repo->findOneById($eleCat[0]->getId());
            $eleCatArea = $firstCat->getArea();
            $catParentcat = $firstCat->getParentcat();
            $catChildcat = $firstCat->getChildscat();
        }
        //echo'<pre>';print_r($eleCat);echo'</pre>';
        if (empty($ele) || !$ele)
            throw new NotFoundHttpException("Page not found");

        $idElement = $ele->getId();

        $Globalizer = $this->get('Globalizer');
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $menu = $Globalizer->getMenus($LOCAL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        $featured = $Globalizer->getFeatured($LOCAL,NULL,$idElement);
        $image = $Globalizer->getImages($LOCAL,NULL,$idElement);
        $attach = $Globalizer->getAttachments($LOCAL,NULL,$idElement);
        $link = $Globalizer->getLinks($LOCAL,NULL,$idElement);

        $viewParams = array(
            'name' => 'world',
            'sections' => $sections,
            'slug' => $slug,
            'featByEle' => $featured,
            'featured' => $featured_home,
            'element' => $ele,
            'eleFirstCat' =>$eleCat[0],
            'catParentcat' => $catParentcat,
            'catChildcat' => $catChildcat, 
            'eleAllCat' =>$eleCat,
            'eleCatArea'=>$eleCatArea,
            'menu' => $menu,
            'image' => $image,
            'attach' => $attach,
            'link' => $link,
        );
        
        $type=$ele->getView();
        $views = $this->setView("Element",$type);
        //print_r($views); 
        return $this->render($views, $viewParams);
    }

    public function areaAction($idArea, $slug, Request $request)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Area');

        $area = $repo->findOneBySlug($slug);
        if (empty($area) || ($area->getId() != $idArea))
            throw new NotFoundHttpException("Page not found");
        //$category = $Sectioner->get($idArea);
        
        /*
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Category');
        $cat = $repo->findByIdArea($idArea);
        */
        
        
        
        $Globalizer = $this->get('Globalizer');
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $categories = $Globalizer->getCategories($LOCAL,$idArea);
        //echo'<pre>';print_r($categories);echo'</pre>';exit;
        //echo'<pre>';print_r($sections);echo'</pre>';exit;
        $menu = $Globalizer->getMenus($LOCAL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        

        $viewParams = array(
            'name' => 'world',
            'sections'=>$sections,
            'slug' => $slug,
            'area' => $area, 
            //'cat' => $cat, 
            'categories' => $categories,
            'featured' => $featured_home,
            //'r2' => $r2,
            'menu' => $menu,
            
        );
        $type=$area->getView();
        $views = $this->setView("Area",$type);
        return $this->render($views, $viewParams);
    }
    
    
    public function areaTagAction($idArea, $slug, $tagslug, Request $request)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Area');

        $area = $repo->findOneBySlug($slug);
        if (empty($area) || ($area->getId() != $idArea))
            throw new NotFoundHttpException("Page not found");
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Tags');
        $tag = $repo->findOneBySlug($tagslug);
        if (empty($tag) || ($tag->getSlug() != $tagslug) ||
                (
                    $tag->getIdArea() != $idArea
                )
           )
            throw new NotFoundHttpException("Page not found");
        
        //$category = $Sectioner->get($idArea);
        
        /*
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Category');
        $cat = $repo->findByIdArea($idArea);
        */
        
        
        
        $Globalizer = $this->get('Globalizer');
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $categories = $Globalizer->getCategories($LOCAL,$idArea);
        //echo'<pre>';print_r($categories);echo'</pre>';exit;
        //echo'<pre>';print_r($sections);echo'</pre>';exit;
        $menu = $Globalizer->getMenus($LOCAL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        

        $viewParams = array(
            'sections'=>$sections,
            'slug' => $slug,
            'area' => $area,
            'tag' => $tag,
            //'cat' => $cat, 
            'categories' => $categories,
            'featured' => $featured_home,
            //'r2' => $r2,
            'menu' => $menu,
        );
        $type=$area->getView();
        $views = $this->setView("AreaTag",$type);
        return $this->render($views, $viewParams);
    }

    public function categoryAction($slug, Request $request)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Category');

        $cat = $repo->findOneBySlug($slug);
        if (empty($cat))
            throw new NotFoundHttpException("Page not found");
        
        $idCategory = $cat->getId();
        
        
        $catArea = $cat->getArea();
        $catParentcat = $cat->getParentcat();
        //print_r($catArea);
        if(empty($catArea)){
            if(!empty($catParentcat))
                $catArea = $catParentcat->getArea();
        }
        
        $Globalizer = $this->get('Globalizer');
        $menu = $Globalizer->getMenus($LOCAL);
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        $featured = $Globalizer->getFeatured($LOCAL,$idCategory,NULL);
        $image = $Globalizer->getImages($LOCAL,$idCategory,NULL);
        $attach = $Globalizer->getAttachments($LOCAL,$idCategory,NULL);
        $link = $Globalizer->getLinks($LOCAL,$idCategory,NULL);
        
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        # get child elements:
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
            ->innerJoin('e.categories','c')
            ->where('e.isaccessible = 1')
            ->andWhere(" e.lang = '".$LOCAL."' ")
            ->andWhere('c.id = :idCategory')->setParameter('idCategory',$idCategory)
            ->getQuery()
            ->execute();
        
        # get child cats:
        $qb2 = $this->getDoctrine()->getManager()->createQueryBuilder();
        $r2 = $qb2->select('
                cc.id,
                cc.idCategory,
                cc.title,
                cc.slug,
                cc.description,
                cc.keywords,
                cc.h1,
                cc.h2,
                cc.text,
                cc.abstract,
                cc.weight,
                cc.listed,
                cc.isaccessible,
                cc.redirect,
                cc.lang,
                cc.createdon,
                cc.modifyon
            ')
            ->from('EMLCmsBundle:Category', 'cc')
            ->where('cc.isaccessible = 1')
            ->andWhere('cc.idCategory = :idCategory')->setParameter('idCategory',$idCategory)
            ->getQuery()
            ->execute();

        
        $viewParams = array(
            'sections'=>$sections,
            'slug' => $slug,
            'featByCat' => $featured,
            'featured' => $featured_home,
            'cat'=>$cat,
            'catArea'=>$catArea,
            'catParentcat'=>$catParentcat,
            'elements' => $elements,
            'r2' => $r2,
            'menu' => $menu,
            'image' => $image,
            'attach' => $attach,
            'link' => $link,
        );
        
        #$viewParams['Variables']=json_encode($viewParams);
        //print_r($viewParams['Variables']);
        
        $type=$cat->getView();
        $views = $this->setView("Category",$type);
        return $this->render($views, $viewParams);
    }

    
    public function categoryTagAction($slug, $tagslug, Request $request)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Category');

        $cat = $repo->findOneBySlug($slug);
        if (empty($cat))
            throw new NotFoundHttpException("Page not found");
        
        $idCategory = $cat->getId();
        
        
        $catArea = $cat->getArea();
        $catParentcat = $cat->getParentcat();
        //print_r($catArea);
        if(empty($catArea)){
            if(!empty($catParentcat))
                $catArea = $catParentcat->getArea();
        }
        
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Tags');
        $tag = $repo->findOneBySlug($tagslug);
        
        if (empty($tag) || ($tag->getSlug() != $tagslug))
            throw new NotFoundHttpException("Page not found");
        else if( $tag->getIdArea() != $catArea->getId() && $tag->getIdcategory()!=$cat->getId() && $tag->getIdcategory()!=$cat->getParentcat()->getId()  )
            throw new NotFoundHttpException("Page not found");
        
        $idTag = $tag->getId();
        
        
        $Globalizer = $this->get('Globalizer');
        $menu = $Globalizer->getMenus($LOCAL);
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        $featured = $Globalizer->getFeatured($LOCAL,$idCategory,NULL);
        $image = $Globalizer->getImages($LOCAL,$idCategory,NULL);
        $attach = $Globalizer->getAttachments($LOCAL,$idCategory,NULL);
        $link = $Globalizer->getLinks($LOCAL,$idCategory,NULL);
        
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        # get child elements:
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
            ->innerJoin('e.categories','c')
            ->innerJoin('e.tags','t')
            ->where('e.isaccessible = 1')
            ->andWhere(" e.lang = '".$LOCAL."' ")
            ->andWhere('c.id = :idCategory')->setParameter('idCategory',$idCategory)
            ->andWhere('t.id = :idTag')->setParameter('idTag',$idTag)
            ->getQuery()
            ->execute();
        
        # get child cats:
        $qb2 = $this->getDoctrine()->getManager()->createQueryBuilder();
        $r2 = $qb2->select('
                cc.id,
                cc.idCategory,
                cc.title,
                cc.slug,
                cc.description,
                cc.keywords,
                cc.h1,
                cc.h2,
                cc.text,
                cc.abstract,
                cc.weight,
                cc.listed,
                cc.isaccessible,
                cc.redirect,
                cc.lang,
                cc.createdon,
                cc.modifyon
            ')
            ->from('EMLCmsBundle:Category', 'cc')
            ->where('cc.isaccessible = 1')
            ->andWhere('cc.idCategory = :idCategory')->setParameter('idCategory',$idCategory)
            ->getQuery()
            ->execute();

        
        $viewParams = array(
            'sections'=>$sections,
            'slug' => $slug,
            'featByCat' => $featured,
            'featured' => $featured_home,
            'cat'=>$cat,
            'catArea'=>$catArea,
            'catParentcat'=>$catParentcat,
            'elements' => $elements,
            'r2' => $r2,
            'menu' => $menu,
            'image' => $image,
            'attach' => $attach,
            'link' => $link,
        );
        
        #$viewParams['Variables']=json_encode($viewParams);
        //print_r($viewParams['Variables']);
        
        $type=$cat->getView();
        $views = $this->setView("CategoryTag",$type);
        return $this->render($views, $viewParams);
    }
    
    public function catCategoryAction($slug1, $slug2, Request $request)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Category');
        $cat1 = $repo->findOneBySlug($slug1);
        if (empty($cat1))
            throw new NotFoundHttpException("Page not found");
        $cat2 = $repo->findOneBySlug($slug2);
        if (empty($cat2))
            throw new NotFoundHttpException("Page not found");

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        $idCat1 = $cat1->getId();
        $idCat2 = $cat2->getId();
        $r = $qb->select('
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
            ->innerJoin('e.categories','c')
            ->where('e.isaccessible = 1')
            ->andWhere(" e.lang = '".$LOCAL."' ")
            ->andWhere('c.id = :idCategory')->setParameter('idCategory',$idCat1)
            ->andWhere('c.id = :idCategory')->setParameter('idCategory',$idCat2)
            ->getQuery()
            ->execute();

        
        $Globalizer = $this->get('Globalizer');
        $menu = $Globalizer->getMenus($LOCAL);
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        
        $viewParams = array(
            'name' => 'world',
            'sections' => $sections,
            'slug1' => $slug1,
            'slug2' => $slug2,
            'cat1' => $cat1,
            'cat2' => $cat2,
            'r' => $r,
            'featured' => $featured_home,
            //'featured' => $featured,
            'menu' => $menu,
        );
        return $this->render('EMLCmsBundle:Page:cat_cat.html.twig', $viewParams);
    }

    public function tagAction($slug, Request $request)
    {
        $LOCAL = $this->get('request')->getLocale();
        
        $repo = $this->getDoctrine()
            ->getRepository('EMLCmsBundle:Tags');
        $tag = $repo->findOneBySlug($slug);
        
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $idTag = $tag->getId();
        $r = $qb->select('
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
            ->innerJoin('e.tags','t')
            ->where('e.isaccessible = 1')
            ->andWhere(" e.lang = '".$LOCAL."' ")
            ->andWhere('t.id = :idTag')->setParameter('idTag',$idTag)
            ->getQuery()
            ->execute();
        
        //$featured = $Featurer->get(NULL, NULL);
        $Globalizer = $this->get('Globalizer');
        $sections = $Globalizer->getSections($LOCAL,NULL);
        $menu = $Globalizer->getMenus($LOCAL);
        $featured_home  = $Globalizer->getFeatured($LOCAL,NULL,NULL);
        

        $viewParams = array(
            'name' => 'world',
            'sections'=>$sections,
            'slug' => $slug,
            'featured' => $featured_home,
            //'category' => $category[0],
            'menu' => $menu,
            'tag' => $tag,
            'r'=> $r
        );
        
        return $this->render('EMLCmsBundle:Page:tag.html.twig', $viewParams);
    }
    
    
    
    private function setView($viewDir,$type=NULL){
        $viewName=($this->get('templating')->exists('EMLCmsBundle:'.$viewDir.':'.$type.'.html.twig') 
                && !empty($type))
                ?$type:"default";
        return 'EMLCmsBundle:'.$viewDir.':'.$viewName.'.html.twig';
    }
}
