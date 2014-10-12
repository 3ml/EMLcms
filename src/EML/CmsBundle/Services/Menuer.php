<?php

namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;
use EML\CmsBundle\Entity\Menus;


class Menuer {

    /**
     *
     * @var EntityManager
     */
    protected $em;
    
    function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    function get() {
        $em = $this->em;
        $query = $em->createQuery('
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
        ');
            
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
