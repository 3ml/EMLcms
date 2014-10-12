<?php

namespace EML\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Featured
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EML\CmsBundle\Entity\FeaturedRepository")
 */
class Featured
{
    /**
     * @ORM\ManyToOne(targetEntity="Featuredstype", inversedBy="featureds")
     * @ORM\JoinColumn(name="id_featuredstype", referencedColumnName="id")
     */
    protected $featuredstype;




    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="featureds")
     * @ORM\JoinColumn(name="id_area", referencedColumnName="id", nullable=true)
     */
    protected $area;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="featureds")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id", nullable=true)
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="Element", inversedBy="featureds")
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
     * @ORM\Column(name="id_area", type="integer", nullable=true)
     */
    private $idArea = NULL;
    
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
     * @var integer
     *
     * @ORM\Column(name="id_featuredstype", type="integer")
     */
    private $idFeaturedstype;

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
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="visibility", type="integer")
     */
    private $visibility;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect", type="string", length=900)
     */
    private $redirect;

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
     * Get idArea
     *
     * @return integer 
     */
    public function getIdArea()
    {
        return $this->idArea;
    }
    
    /**
     * Set idArea
     *
     * @param integer $idArea
     * @return Featured
     */
    public function setIdArea($idArea)
    {
        $this->idArea = $idArea;

        return $this;
    }

    /**
     * Set idCategory
     *
     * @param integer $idCategory
     * @return Featured
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
     * @return Featured
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
     * Set idFeaturedstype
     *
     * @param integer $idFeaturedstype
     * @return Featured
     */
    public function setIdFeaturedstype($idFeaturedstype)
    {
        $this->idFeaturedstype = $idFeaturedstype;

        return $this;
    }

    /**
     * Get idFeaturedstype
     *
     * @return integer 
     */
    public function getIdFeaturedstype()
    {
        return $this->idFeaturedstype;
    }

    /**
     * Set h1
     *
     * @param string $h1
     * @return Featured
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
     * @return Featured
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
     * @return Featured
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
     * Set weight
     *
     * @param integer $weight
     * @return Featured
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
     * @return Featured
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
     * Set redirect
     *
     * @param string $redirect
     * @return Featured
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;

        return $this;
    }

    /**
     * Get redirect
     *
     * @return string 
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Featured
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
     * @return Featured
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
     * @return Featured
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
