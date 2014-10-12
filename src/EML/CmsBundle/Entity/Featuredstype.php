<?php

namespace EML\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Featuredstype
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EML\CmsBundle\Entity\FeaturedstypeRepository")
 */
class Featuredstype
{
    /**
     * @ORM\OneToMany(targetEntity="Featured", mappedBy="featuredstype")
     */
    protected $featureds;

    public function __construct()
    {
        $this->featureds = new ArrayCollection();
    }






    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=20)
     */
    private $slug;


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
     * Set text
     *
     * @param string $text
     * @return Featuredstype
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Featuredstype
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
