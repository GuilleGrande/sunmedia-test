<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Publisher
 * 
 * @ORM\Table(name="publishers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PublisherRepository")
 */
class Publisher {

    /**
     * @var int
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Creative")
     */
    private $publisherCreative;

    public function __contruct()
    {
        $this->publisherCreative = new ArrayCollection();
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
     * @return Publisher
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

    public function addPublisherCreative(Creative $creative)
    {
        if ($this->publisherCreative->contains($creative)) {
            return;
        }
        $this->publisherCreative[] = $creative; 
    }

    public function getPublisherCreative(){
        return $this->publisherCreative;
    }
}