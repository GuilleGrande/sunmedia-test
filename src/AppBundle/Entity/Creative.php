<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Creative
 *
 * @ORM\Table(name="creatives")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreativeRepository")
 */
class Creative
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = false;

    /**
     * @ORM\ManyToOne(targetEntity="Advertiser", inversedBy="creatives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $advertiser;

    /**
     * @ORM\ManyToMany(targetEntity="Publisher", mappedBy="relatedCreatives")
     */
    private $relatedPublishers;

    public function __construct() {

        $this->relatedPublishers = new ArrayCollection();

    }

    public function __toString(){
        return $this->name;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Creative
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Creative
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setAdvertiser(Advertiser $advertirser)
    {
        $this->advertiser = $advertirser;
    }

    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    /**
     * @return ArrayCollection|Publisher[]
     */
    public function getRelatedPublishers()
    {
        return $this->relatedPublishers;

    }
}

