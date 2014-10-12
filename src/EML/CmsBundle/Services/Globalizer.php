<?php
namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;

use EML\CmsBundle\Entity\Menus;

use \Symfony\Component\DependencyInjection\ContainerAware;

class Globalizer extends ContainerAware {

    /**
     *
     * @var EntityManager
     */
    protected $em;
    function __construct(EntityManager $entityManager) {        
        $this->em = $entityManager;
    }
    
    function getSections($LOCAL,$idArea = null) 
    {
        $em = $this->em;
        $qb = $em->createQueryBuilder();
        $r = $qb->select('
                

                a.id AS a_id,
                a.title AS a_title,
                a.slug AS a_slug,
                a.description AS a_description,
                a.keywords AS a_keywords,
                a.h1 AS a_h1,
                a.h2 AS a_h2,
                a.text AS a_text,
                a.abstract AS a_abstract,
                a.weight AS a_weight,
                a.listed AS a_listed,
                a.isaccessible AS a_isaccessible,
                a.redirect AS a_redirect,
                a.lang AS a_lang,
                a.createdon AS a_createdon,
                a.modifyon AS a_modifyon,
                
                c.id AS c_id,
                c.idCategory AS c_idCategory,
                c.idArea AS c_idArea,
                c.title AS c_title,
                c.slug AS c_slug,
                c.description AS c_description,
                c.keywords AS c_keywords,
                c.h1 AS c_h1,
                c.h2 AS c_h2,
                c.text AS c_text,
                c.abstract AS c_abstract,
                c.weight AS c_weight,
                c.listed AS c_listed,
                c.isaccessible AS c_isaccessible,
                c.redirect AS c_redirect,
                c.lang AS c_lang,
                c.createdon AS c_createdon,
                c.modifyon AS c_modifyon,
                
                cc.id AS cc_id,
                cc.idCategory AS cc_idCategory,
                cc.idArea AS cc_idArea,
                cc.title AS cc_title,
                cc.slug AS cc_slug,
                cc.description AS cc_description,
                cc.keywords AS cc_keywords,
                cc.h1 AS cc_h1,
                cc.h2 AS cc_h2,
                cc.text AS cc_text,
                cc.abstract AS cc_abstract,
                cc.weight AS cc_weight,
                cc.listed AS cc_listed,
                cc.isaccessible AS cc_isaccessible,
                cc.redirect AS cc_redirect,
                cc.lang AS cc_lang,
                cc.createdon AS cc_createdon,
                cc.modifyon AS cc_modifyon
                
                
            ')
            //->from('EMLCmsBundle:Category', 'cc')
            ->from('EMLCmsBundle:Area', 'a')
            ->leftJoin('a.categories','c')
            ->leftJoin('c.childscat','cc')
            //->where('cc.isaccessible = 1')
                
                
            ->andWhere(" a.lang = '".$LOCAL."' ")
            ->andWhere(" c.idCategory IS NULL ")
            //->andWhere(" cc.idCategory = c.id ")
            //->andWhere(" a.idCategory IS NOT NULL ")
            //->andWhere('cc.idCategory = :idCategory')->setParameter('idCategory',$idCategory)
            //->orderBy("a.weight ASC, a.id ASC")
            ->addOrderBy("a.weight","ASC")
            ->addOrderBy("a.id","ASC")
            ->addOrderBy("c.weight","ASC")
            ->addOrderBy("c.id","ASC")
            ->addOrderBy("cc.weight","ASC")
            ->addOrderBy("cc.id","ASC")
            
            ->getQuery()->execute();
            
            
        return $r;    
        
    }
    
    function getCategories($LOCAL,$idArea) 
    {
        $em = $this->em;
        $qb = $em->createQueryBuilder();
        $r = $qb->select('
                

                a.id AS a_id,
                a.title AS a_title,
                a.slug AS a_slug,
                a.description AS a_description,
                a.keywords AS a_keywords,
                a.h1 AS a_h1,
                a.h2 AS a_h2,
                a.text AS a_text,
                a.abstract AS a_abstract,
                a.weight AS a_weight,
                a.listed AS a_listed,
                a.isaccessible AS a_isaccessible,
                a.redirect AS a_redirect,
                a.lang AS a_lang,
                a.createdon AS a_createdon,
                a.modifyon AS a_modifyon,
                
                c.id AS c_id,
                c.idCategory AS c_idCategory,
                c.idArea AS c_idArea,
                c.title AS c_title,
                c.slug AS c_slug,
                c.description AS c_description,
                c.keywords AS c_keywords,
                c.h1 AS c_h1,
                c.h2 AS c_h2,
                c.text AS c_text,
                c.abstract AS c_abstract,
                c.weight AS c_weight,
                c.listed AS c_listed,
                c.isaccessible AS c_isaccessible,
                c.redirect AS c_redirect,
                c.lang AS c_lang,
                c.createdon AS c_createdon,
                c.modifyon AS c_modifyon,
                
                cc.id AS cc_id,
                cc.idCategory AS cc_idCategory,
                cc.idArea AS cc_idArea,
                cc.title AS cc_title,
                cc.slug AS cc_slug,
                cc.description AS cc_description,
                cc.keywords AS cc_keywords,
                cc.h1 AS cc_h1,
                cc.h2 AS cc_h2,
                cc.text AS cc_text,
                cc.abstract AS cc_abstract,
                cc.weight AS cc_weight,
                cc.listed AS cc_listed,
                cc.isaccessible AS cc_isaccessible,
                cc.redirect AS cc_redirect,
                cc.lang AS cc_lang,
                cc.createdon AS cc_createdon,
                cc.modifyon AS cc_modifyon
                
                
            ')
            //->from('EMLCmsBundle:Category', 'cc')
            ->from('EMLCmsBundle:Area', 'a')
            ->leftJoin('a.categories','c')
            ->leftJoin('c.childscat','cc')
            //->where('cc.isaccessible = 1')
                
            ->andWhere(" a.id = '".$idArea."' ")
            ->andWhere(" a.lang = '".$LOCAL."' ")
            ->andWhere(" c.idCategory IS NULL ")
            //->andWhere(" cc.idCategory = c.id ")
            //->andWhere(" a.idCategory IS NOT NULL ")
            //->andWhere('cc.idCategory = :idCategory')->setParameter('idCategory',$idCategory)
            //->orderBy("a.weight ASC, a.id ASC")
            ->addOrderBy("a.weight","ASC")
            ->addOrderBy("a.id","ASC")
            ->addOrderBy("c.weight","ASC")
            ->addOrderBy("c.id","ASC")
            ->addOrderBy("cc.weight","ASC")
            ->addOrderBy("cc.id","ASC")
            
            ->getQuery()->execute();
            
            
        return $r;    
        
    }
    
    function getMenus($LOCAL)
    {
        $em = $this->em;
        $query = $em->createQuery("
            SELECT
                m.id,
                m.idMenustype,
                m.idCategory,
                m.idElement,
                m.label,
                m.weight,
                m.visibility,
                m.redirect,
                m.lang,
                m.createdon,
                m.modifyon,
                mt.id AS mt_id,
                mt.text AS mt_text,
                mt.slug AS mt_slug
            FROM
                EMLCmsBundle:Menus m,
                EMLCmsBundle:Menustype mt 
            WHERE
                mt.id = m.idMenustype
                AND m.lang='".$LOCAL."'
        ");
            
        //return $this->tryCatch($query);
        
        $new_rows=array();
        $res = $this->tryCatch($query);
        if(!empty($res))
        {
            foreach ($res AS $I)
            {
                //print_r($I);
                
                if(!empty($I['redirect']))
                {
                    $I['uri'] = $I['redirect'];
                }
                else if(!empty($I['idCategory']))
                {
                    $repo = $this->em
                        ->getRepository( 'EMLCmsBundle:Category' );
                        $Category = $repo -> findOneById( $I['idCategory'] );
                        
                    $I['uri'] = $this->container->get('router')->generate(
                            'eml_cms_cat', array('slug'=>$Category->getSlug())
                    );
                }
                else if(!empty($I['idElement']))
                {
                    $repo = $this->em
                        ->getRepository( 'EMLCmsBundle:Element' );
                        $Element = $repo -> findOneById( $I['idElement'] );
                        
                    $I['uri'] = $this->container->get('router')->generate(
                            'eml_cms_element', array('slug'=>$Element->getSlug())
                    );
                }
                //$new_rows[]=$I;
                $new_rows[$I['mt_slug']][]=$I;
                
            }
            /*
             * Gabriele - Fix - 12 ott 2014
             * Now the Menus return an array divided by MenuType Slug
             */ 
            //echo'<pre>';print_r($new_rows);echo'</pre>';
        }
        
        return $new_rows;
        //$this->generateUrl('_donutRoute', array('param1'=>'val1', 'param2'=>'val2'))
        
        
    }
    
    function getFeatured($LOCAL,$idCategory = null, $idElement = null) {
        
        $em = $this->em;
        $Q="
            SELECT
                f.id,
                f.idFeaturedstype,
                f.idCategory,
                f.idElement,
                f.h1,
                f.h2,
                f.text,
                f.weight,
                f.visibility,
                f.redirect,
                f.lang,
                f.createdon,
                f.modifyon,
                ft.id AS ft_id,
                ft.text AS ft_text,
                ft.slug AS ft_slug
            FROM
                EMLCmsBundle:Featured f,
                EMLCmsBundle:FeaturedsType ft 
            WHERE
                f.lang='".$LOCAL."'
                AND ft.id = f.idFeaturedstype
                AND f.idCategory ".
                    (($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory)."
                AND f.idElement ".
                    (($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement);
        $query = $em->createQuery($Q);
        
        return $this->tryCatch($query);
    }
    
    
    function getImages($LOCAL,$idCategory=null, $idElement=null) {
        $em = $this->em;
        $query = $em->createQuery('
            SELECT
                i.id,
                i.idCategory,
                i.idElement,
                i.h1,
                i.slug,
                i.h2,
                i.text,
                i.weight,
                i.visibility,
                i.lang,
                i.createdon,
                i.modifyon
            FROM
                EMLCmsBundle:Images i
            WHERE
                i.lang = \''.$LOCAL.'\'
                AND i.idCategory '.(($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND i.idElement '.(($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
            
        return $this->tryCatch($query);
    }
    
    
    function getLinks($LOCAL,$idCategory=null, $idElement=null) {
        $em = $this->em;
        $query = $em->createQuery('
            SELECT
                l.id,
                l.idCategory,
                l.idElement,
                l.h1,
                l.h2,
                l.text,
                l.uri,
                l.weight,
                l.visibility,
                l.lang,
                l.createdon,
                l.modifyon
            FROM
                EMLCmsBundle:Links l
            WHERE
                l.lang=\''.$LOCAL.'\'
                AND l.idCategory '.(($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND l.idElement '.(($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
        
        return $this->tryCatch($query);
    }
    
    function getAttachments($LOCAL,$idCategory=null, $idElement=null) {
        $em = $this->em;
        $query = $em->createQuery('
            SELECT
                a.id,
                a.idCategory,
                a.idElement,
                a.h1,
                a.h2,
                a.text,
                a.weight,
                a.visibility,
                a.password,
                a.lang,
                a.createdon,
                a.modifyon
            FROM
                EMLCmsBundle:Attachment a
            WHERE
                a.lang=\''.$LOCAL.'\'
                AND a.idCategory '.(($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND a.idElement '.(($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
        
        return $this->tryCatch($query);
    }
    
    
    function tryCatch($query)
    {
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
        
    }
    function get_method_argNames($class, $method) {
        $f = new \ReflectionMethod($class, $method);
        $result = array();
        foreach ($f->getParameters() as $param) {
            $result[] = $param->name;   
        }
        return $result;
    }
    
}
