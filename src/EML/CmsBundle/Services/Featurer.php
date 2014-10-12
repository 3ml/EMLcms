<?php

namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;
use EML\CmsBundle\Entity\Featured;


class Featurer {

    /**
     *
     * @var EntityManager
     */
    protected $em;

    var $home;

    function __construct(EntityManager $entityManager) {
        
        $this->em = $entityManager;
        $this->home = $this->get();
        
    }

    function get() {
        return $this->sql(null, null);
    }

    function getByCategory($id) {
        return $this->sql($id, null);
    }

    function getByElement($id) {
        return $this->sql(null, $id);
    }

    private function sql($idCategory = null, $idElement = null) {
        $em = $this->em;
        $query = $em->createQuery('
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
                ft.id = f.idFeaturedstype
                AND f.idCategory '.
                    (($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND f.idElement '.
                    (($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
