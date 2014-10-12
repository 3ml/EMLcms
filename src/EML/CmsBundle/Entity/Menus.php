<?php

namespace EML\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EML\CmsBundle\Entity\MenusRepository")
 */
class Menus
{
    /**
     * @ORM\ManyToOne(targetEntity="Menustype", inversedBy="menus")
     * @ORM\JoinColumn(name="id_menustype", referencedColumnName="id")
     */
    protected $menustype;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="menus")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id", nullable=true)
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="Element", inversedBy="menus")
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
     * @var integer
     *
     * @ORM\Column(name="id_menustype", type="integer")
     */
    private $idMenustype;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="text")
     */
    private $label;

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
     * Set idCategory
     *
     * @param integer $idCategory
     * @return Menus
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
     * @return Menus
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
     * Set idMenustype
     *
     * @param integer $idMenustype
     * @return Menus
     */
    public function setIdMenustype($idMenustype)
    {
        $this->idMenustype = $idMenustype;

        return $this;
    }

    /**
     * Get idMenustype
     *
     * @return integer 
     */
    public function getIdMenustype()
    {
        return $this->idMenustype;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return Menus
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Menus
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
     * @return Menus
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
     * @return Menus
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
     * @return Menus
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
     * @return Menus
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
     * @return Menus
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
