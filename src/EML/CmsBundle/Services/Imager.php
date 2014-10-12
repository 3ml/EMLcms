<?php

namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;
use EML\CmsBundle\Entity\Images;


class Imager {

    /**
     *
     * @var EntityManager
     */
    protected $em;
    
    function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    function get($idCategory=null, $idElement=null) {
        $em = $this->em;
        $query = $em->createQuery('
            SELECT
                i.id,
                i.idCategory,
                i.idElement,
                i.h1,
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
                i.idCategory '.(($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND i.idElement '.(($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
            
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
