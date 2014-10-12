<?php

namespace EML\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EML\CmsBundle\Entity\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentcat")
     */
    protected $childscat;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="childscat")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id", nullable=true)
     */
    protected $parentcat;

    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="categories")
     * @ORM\JoinColumn(name="id_area", referencedColumnName="id", nullable=true)
     */
    protected $area;

    /**
     * @ORM\OneToMany(targetEntity="Tags", mappedBy="category")
     */
    protected $tags;
    
    /**
     * @ORM\ManyToMany(targetEntity="Element", mappedBy="categories")
     */
    protected $elements;

    /**
     * @ORM\OneToMany(targetEntity="Attachment", mappedBy="category")
     */
    protected $attachments;

    /**
     * @ORM\OneToMany(targetEntity="Featured", mappedBy="category")
     */
    protected $featureds;

    /**
     * @ORM\OneToMany(targetEntity="Images", mappedBy="category")
     */
    protected $images;

    /**
     * @ORM\OneToMany(targetEntity="Menus", mappedBy="category")
     */
    protected $menus;

    /**
     * @ORM\OneToMany(targetEntity="Links", mappedBy="category")
     */
    protected $links;

    public function __construct()
    {
        $this->childscat = new ArrayCollection();
        $this->elements = new ArrayCollection();
        $this->attachments = new ArrayCollection();
        $this->featureds = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->links = new ArrayCollection();
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
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer", nullable=true)
     */
    private $idCategory = NULL;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_area", type="integer", nullable=true)
     */
    private $idArea = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="view", type="string", length=255)
     */
    private $view;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255)
     */
    private $keywords;

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
     * @ORM\Column(name="abstract", type="text")
     */
    private $abstract;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="listed", type="integer")
     */
    private $listed;

    /**
     * @var integer
     *
     * @ORM\Column(name="isaccessible", type="integer")
     */
    private $isaccessible;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect", type="string", length=900, nullable=true)
     */
    private $redirect = NULL;

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
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }
    
    /**
     * Get parentcat
     *
     * @return integer 
     */
    public function getParentcat()
    {
        return $this->parentcat;
    }
    
    /**
     * Get childscat
     *
     * @return integer 
     */
    public function getChildscat()
    {
        return $this->childscat;
    }
    
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
     * @return Category
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
     * Set idArea
     *
     * @param integer $idArea
     * @return Category
     */
    public function setIdArea($idArea)
    {
        $this->idArea = $idArea;

        return $this;
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
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
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

    /**
     * Set view
     *
     * @param string $view
     * @return Category
     */
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get view
     *
     * @return string 
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Category
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set h1
     *
     * @param string $h1
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * Set abstract
     *
     * @param string $abstract
     * @return Category
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Category
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
     * Set listed
     *
     * @param integer $listed
     * @return Category
     */
    public function setListed($listed)
    {
        $this->listed = $listed;

        return $this;
    }

    /**
     * Get listed
     *
     * @return integer 
     */
    public function getListed()
    {
        return $this->listed;
    }

    /**
     * Set isaccessible
     *
     * @param integer $isaccessible
     * @return Category
     */
    public function setIsaccessible($isaccessible)
    {
        $this->isaccessible = $isaccessible;

        return $this;
    }

    /**
     * Get isaccessible
     *
     * @return integer 
     */
    public function getIsaccessible()
    {
        return $this->isaccessible;
    }

    /**
     * Set redirect
     *
     * @param string $redirect
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
