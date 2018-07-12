<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Component
 *
 * @ORM\Table(name="components")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComponentRepository")
 */
class Component
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
     * @var float
     *
     * @ORM\Column(name="height", type="float")
     */
    private $height;

    /**
     * @var float
     *
     * @ORM\Column(name="width", type="float")
     */
    private $width;

    /**
     * @var float
     *
     * @ORM\Column(name="coor_x", type="float")
     */
    private $coorX;

    /**
     * @var float
     *
     * @ORM\Column(name="coor_y", type="float")
     */
    private $coorY;

    /**
     * @var float
     *
     * @ORM\Column(name="coor_z", type="float")
     */
    private $coorZ;


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
     * @return Component
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
     * Set height
     *
     * @param float $height
     *
     * @return Component
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param float $width
     *
     * @return Component
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set coorX
     *
     * @param float $coorX
     *
     * @return Component
     */
    public function setCoorX($coorX)
    {
        $this->coorX = $coorX;

        return $this;
    }

    /**
     * Get coorX
     *
     * @return float
     */
    public function getCoorX()
    {
        return $this->coorX;
    }

    /**
     * Set coorY
     *
     * @param float $coorY
     *
     * @return Component
     */
    public function setCoorY($coorY)
    {
        $this->coorY = $coorY;

        return $this;
    }

    /**
     * Get coorY
     *
     * @return float
     */
    public function getCoorY()
    {
        return $this->coorY;
    }

    /**
     * Set coorZ
     *
     * @param float $coorZ
     *
     * @return Component
     */
    public function setCoorZ($coorZ)
    {
        $this->coorZ = $coorZ;

        return $this;
    }

    /**
     * Get coorZ
     *
     * @return float
     */
    public function getCoorZ()
    {
        return $this->coorZ;
    }
}

