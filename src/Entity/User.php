<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    public function __construct() {
        $this->posts = new ArrayCollection();
    } 
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="post") 
     * 
     * @var array 
     */
    private $posts;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @return array
     */
    public function getPosts(): array {
        return $this->posts;
    }

    /**
     * @param array $posts
     *
     * @return ArrayCollection
     */
    public function setPosts(array $posts): ArrayCollection {
        $this->posts = $posts;
    }

   
    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
