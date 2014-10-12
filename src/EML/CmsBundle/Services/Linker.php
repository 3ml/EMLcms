<?php

namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;
use EML\CmsBundle\Entity\Links;


class Linker {

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
                l.idCategory '.(($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND l.idElement '.(($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
            
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
