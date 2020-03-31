<?php

    namespace App\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    use \Exception;
    use App\Entity\Traits\EntityIdTrait;
    use App\Entity\Traits\EntityTimeTrait;
    use DateTimeImmutable;
    use Ramsey\Uuid\Uuid;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\PeopleRepository")
     */
    class People
    {
        use EntityIdTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
            $this->role = new ArrayCollection();
            $this->season = new ArrayCollection();
        }

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $last_name;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $first_name;

        /**
         * @ORM\Column(type="date", nullable=true)
         */
        private $date_birth;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $map_birth;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $image;

        /**
         * @ORM\ManyToMany(targetEntity="App\Entity\Roles", inversedBy="people")
         * ORM\JoinTable(name="people_role",
         *      joinColumns={@ORM\JoinColumn(name="people_id", referencedColumnName="id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="roles_id", referencedColumnName="id")}
         *      )
         * @ORM\JoinTable(name="people_role")
         */
        private $role;

        /**
         * @ORM\ManyToMany(targetEntity="App\Entity\Seasons", inversedBy="people")
         * ORM\JoinTable(name="people_season",
         *      joinColumns={@ORM\JoinColumn(name="people_id", referencedColumnName="id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="seasons_id", referencedColumnName="id")}
         *      )
         * @ORM\JoinTable(name="people_season")
         */
        private $season;

        public function getLastName(): ?string
        {
            return $this->last_name;
        }

        public function setLastName(string $last_name): self
        {
            $this->last_name = $last_name;

            return $this;
        }

        public function getFirstName(): ?string
        {
            return $this->first_name;
        }

        public function setFirstName(string $first_name): self
        {
            $this->first_name = $first_name;

            return $this;
        }

        public function getDateBirth(): ?\DateTimeInterface
        {
            return $this->date_birth;
        }

        public function setDateBirth(?\DateTimeInterface $date_birth): self
        {
            $this->date_birth = $date_birth;

            return $this;
        }

        public function getMapBirth(): ?string
        {
            return $this->map_birth;
        }

        public function setMapBirth(?string $map_birth): self
        {
            $this->map_birth = $map_birth;

            return $this;
        }

        public function getImage(): ?string
        {
            return $this->image;
        }

        public function setImage(?string $image): self
        {
            $this->image = $image;

            return $this;
        }

        /**
         * @return Collection|Roles[]
         */
        public function getRole(): Collection
        {
            return $this->role;
        }

        public function addRole(Roles $role): self
        {
            if (!$this->role->contains($role)) {
                $this->role[] = $role;
                $role->addPerson($this);
            }

            return $this;
        }

        public function removeRole(Roles $role): self
        {
            if ($this->role->contains($role)) {
                $this->role->removeElement($role);
            }

            return $this;
        }

        /**
         * @return Collection|Seasons[]
         */
        public function getSeason(): Collection
        {
            return $this->season;
        }

        public function addSeason(Seasons $season): self
        {
            if (!$this->season->contains($season)) {
                $this->season[] = $season;
                $season->addPerson($this);
            }

            return $this;
        }

        public function removeSeason(Seasons $season): self
        {
            if ($this->season->contains($season)) {
                $this->season->removeElement($season);
            }

            return $this;
        }
    }
