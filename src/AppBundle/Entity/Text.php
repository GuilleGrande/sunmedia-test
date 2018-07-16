<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Text
 *
 * @ORM\Table(name="texts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TextRepository")
 */
class Text
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
     * @ORM\Column(name="content", type="string", length=140)
     * @Assert\Length(
     *      min = 1,
     *      max = 140,
     *      minMessage = "Content must be at least {{ limit }} characters long",
     *      maxMessage = "Content cannot be longer than {{ limit }} characters"
     * )
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="Component", mappedBy="text")
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
     * Set content
     *
     * @param string $content
     *
     * @return Text
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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

