<?php

namespace EML\CmsBundle\Services;
use Doctrine\ORM\EntityManager;
use EML\CmsBundle\Entity\Attachment;


class Attachmenter {

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
                a.idCategory '.(($idCategory===null || !is_numeric($idCategory)) ? 'IS NULL' : '= '.$idCategory).'
                AND a.idElement '.(($idElement===null || !is_numeric($idElement)) ? 'IS NULL' : '= '.$idElement)
        );
            
        try {
            return $query->getResult();
        }
        catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
