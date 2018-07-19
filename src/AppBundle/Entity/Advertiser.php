<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Advertiser
 *
 * @ORM\Table(name="advertisers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdvertiserRepository")
 */
class Advertiser {

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
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
     * @ORM\OneToMany(targetEntity="Creative", mappedBy="advertiser", fetch="EXTRA_LAZY")
     */
    private $creatives;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    public function __construct()
    {
        $this->creatives = new ArrayCollection();
    }

    public function __toString(){
        return $this->getName();
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
     * @return Advertiser
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

    public function getCreatives()
    {
        return $this->creatives;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug()
    {
        $this->slug = $slug;
    }
}

