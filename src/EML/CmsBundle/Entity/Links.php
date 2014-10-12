<?php

namespace EML\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Links
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EML\CmsBundle\Entity\LinksRepository")
 */
class Links
{
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="links")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id", nullable=true)
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="Element", inversedBy="links")
     * @ORM\JoinColumn(name="id_element", referencedColumnName="id", nullable=true)
     */
    protected $element;




    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer", nullable=true)
     */
    private $idCategory = NULL;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_element", type="integer", nullable=true)
     */
    private $idElement = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="h1", type="string", length=255)
     */
    private $h1;

    /**
     * @var string
     *
     * @ORM\Column(name="h2", type="string", length=255)
     */
    private $h2;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="text")
     */
    private $uri;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="visibility", type="integer")
     */
    private $visibility;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=20)
     */
    private $lang;

    /**
     * @var integer
     *
     * @ORM\Column(name="createdon", type="integer")
     */
    private $createdon;

    /**
     * @var integer
     *
     * @ORM\Column(name="modifyon", type="integer")
     */
    private $modifyon;


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
     * Set idCategory
     *
     * @param integer $idCategory
     * @return Links
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set idElement
     *
     * @param integer $idElement
     * @return Links
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
     * Set h1
     *
     * @param string $h1
     * @return Links
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;

        return $this;
    }

    /**
     * Get h1
     *
     * @return string 
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * Set h2
     *
     * @param string $h2
     * @return Links
     */
    public function setH2($h2)
    {
        $this->h2 = $h2;

        return $this;
    }

    /**
     * Get h2
     *
     * @return string 
     */
    public function getH2()
    {
        return $this->h2;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Links
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
     * Set uri
     *
     * @param string $uri
     * @return Links
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Links
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set visibility
     *
     * @param integer $visibility
     * @return Links
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get visibility
     *
     * @return integer 
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Links
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set createdon
     *
     * @param integer $createdon
     * @return Links
     */
    public function setCreatedon($createdon)
    {
        $this->createdon = $createdon;

        return $this;
    }

    /**
     * Get createdon
     *
     * @return integer 
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * Set modifyon
     *
     * @param integer $modifyon
     * @return Links
     */
    public function setModifyon($modifyon)
    {
        $this->modifyon = $modifyon;

        return $this;
    }

    /**
     * Get modifyon
     *
     * @return integer 
     */
    public function getModifyon()
    {
        return $this->modifyon;
    }
}
