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
     * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
     */
    class Roles
    {
        use EntityIdTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
            $this->people = new ArrayCollection();
        }

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $title;

        /**
         * @ORM\ManyToMany(targetEntity="App\Entity\People", mappedBy="role", cascade={"persist"})
         * @ORM\JoinTable(name="people_role")
         */
        private $people;

        public function getTitle(): ?string
        {
            return $this->title;
        }

        public function setTitle(string $title): self
        {
            $this->title = $title;

            return $this;
        }

        /**
         * @return Collection|People[]
         */
        public function getPeople(): Collection
        {
            return $this->people;
        }

        public function addPerson(People $person): self
        {
            if (!$this->people->contains($person)) {
                $this->people[] = $person;
                $person->addRole($this);
            }

            return $this;
        }

        public function removePerson(People $person): self
        {
            if ($this->people->contains($person)) {
                $this->people->removeElement($person);
                $person->removeRole($this);
            }

            return $this;
        }
    }
