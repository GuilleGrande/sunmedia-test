<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Video
 *
 * @ORM\Table(name="videos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="url", type="string", length=255)
     * @Assert\Url(message = "The url '{{ value }}' is not a valid url")
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     * @Assert\Choice(choices={"mp4", "webm"}, message="Format must be 'mp4' or 'webm'.")
     */
    private $format;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float")
     */
    private $size;

    /**
     * @ORM\OneToMany(targetEntity="Component", mappedBy="video")
     */
    private $component;

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
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Video
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return Video
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set component
     */
    public function setComponent(Component $component)
    {
        $this->component = $component;

        return $this;
    }

    /**
     * Get component
     */
    public function getComponent()
    {
        return $this->component;
    }
}

