<?php

    namespace App\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;
    use Serializable;
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
     * @ORM\HasLifecycleCallbacks()
     */
    class User implements UserInterface, Serializable
    {
        /**
         * @ORM\Id()
         * @ORM\GeneratedValue()
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=100, unique=true)
         */
        private $username;

        /**
         * @ORM\Column(type="string", length=64)
         */
        private $password;

        /**
         * @ORM\Column(type="string", length=254, unique=true)
         */
        private $email;

        /**
         * @ORM\Column(name="is_active", type="boolean")
         */
        private $isActive;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="post")
         *
         * @var array
         */
        private $posts;

        /**
         * @var array
         *
         * @ORM\Column(type="json")
         */
        private $roles = [];

        /**
         * @ORM\Column(type="datetime")
         */
        private $createdAt;

        /**
         * User constructor.
         */
        public function __construct()
        {
            $this->posts    = new ArrayCollection();
            $this->isActive = true;
        }

        public function getRoles(): array
        {
            return $this->roles;
        }

        public function setRoles(array $roles): void
        {
            $this->roles = $roles;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getIsActive()
        {
            return $this->isActive;
        }

        /**
         * @param mixed $isActive
         */
        public function setIsActive($isActive): void
        {
            $this->isActive = $isActive;
        }

        /**
         * @return array
         */
        public function getPosts(): array
        {
            return $this->posts;
        }

        /**
         * @param array $posts
         *
         * @return User
         */
        public function setPosts(array $posts): User
        {
            $this->posts = $posts;

            return $this;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setUsername(string $name): self
        {
            $this->username = $name;

            return $this;
        }

        public function getCreatedAt(): ?\DateTimeInterface
        {
            return $this->createdAt;
        }

        /**
         * @ORM\PrePersist
         */
        public function setCreatedAt(): self
        {
            $this->createdAt = new \DateTime();

            return $this;
        }

        public function getPassword(): string
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
        }

        public function getSalt()
        {
            return null;
        }

        public function getUsername(): string
        {
            return $this->username;
        }

        public function eraseCredentials()
        {
        }

        public function serialize(): string
        {
            return serialize([
                $this->id,
                $this->username,
                $this->password,

            ]);
        }

        public function unserialize($serialized)
        {
            list($this->id, $this->username, $this->password) = unserialize($serialized);
        }
    }
