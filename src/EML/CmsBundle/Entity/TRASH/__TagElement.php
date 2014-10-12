<?php

namespace EML\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagElement
 */
class TagElement
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idElement;

    /**
     * @var integer
     */
    private $idTag;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idElement
     *
     * @param integer $idElement
     * @return TagElement
     */
    public function setIdElement($idElement)
    {
        $this->idElement = $idElement;

        return $this;
    }

    /**
     * Get idElement
     *
     * @return integer 
     */
    public function getIdElement()
    {
        return $this->idElement;
    }

    /**
     * Set idTag
     *
     * @param integer $idTag
     * @return TagElement
     */
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get idTag
     *
     * @return integer 
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}
