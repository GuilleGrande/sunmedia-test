<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
     *
     * @ORM\Column(name="status", type="string")
     * @Assert\Choice(choices={"published", "stopped", "publishing"}, message="Status must be 'published', 'stopped' or 'publishing'.")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Advertiser", inversedBy="creatives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $advertiser;

    /**
     * @ORM\ManyToMany(targetEntity="Publisher", mappedBy="relatedCreatives")
     */
    private $relatedPublishers;

    /**
     * @ORM\ManyToMany(targetEntity="Component", inversedBy="relatedCreatives")
     */
    private $relatedComponents;

    public function __construct() {

        $this->relatedPublishers = new ArrayCollection();
        $this->relatedComponents = new ArrayCollection();

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

    public function setRelatedComponents(Component $component)
    {
        if ($this->relatedComponents->contains($component)) {
            return;
        }
        $this->relatedComponents[] = $component;
    }

    /**
     * @return ArrayCollection|Component[]
     */
    public function getRelatedComponents(){
        return $this->relatedComponents;
    }
}

