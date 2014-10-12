<?php

namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;
use EML\CmsBundle\Entity\Area;


class Sectioner {

    /**
     *
     * @var EntityManager
     */
    protected $em;

    function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
        
    }

    function get($idArea) {
        return $this->sql($idArea);
    }

    /*
    function getByCategory($id) {
        return $this->sql($id, null);
    }

    function getByElement($id) {
        return $this->sql(null, $id);
    }
    */

    private function sql($idArea = null) {
        $em = $this->em;
        $Q="
            SELECT
                c.id,
                c.idCategory,
                c.title,
                c.slug,
                c.description,
                c.keywords,
                c.h1,
                c.h2,
                c.text,
                c.abstract,
                c.weight,
                c.listed,
                c.isaccessible,
                c.redirect,
                c.lang,
                c.createdon,
                c.modifyon,
                a.id AS a_id,
                a.title AS a_title,
                a.slug AS a_slug,
                a.h1 AS a_h1,
                
            FROM
                EMLCmsBundle:Category c,
                EMLCmsBundle:Area a 
            WHERE
                c.idCategory IS NOT NULL 
                
                ";

                //AND c.lang='".."'
                    
            if(!empty($idArea) && is_numeric($idArea))
            {
                $Q.=' AND c.idArea = a.id '
                  . " AND c.idArea ='".$idArea."' ";
            }   
        
        $query = $em->createQuery($Q);
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
