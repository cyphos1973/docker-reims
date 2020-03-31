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
     * @ORM\Entity(repositoryClass="App\Repository\SeasonsRepository")
     */
    class Seasons
    {
        use EntityIdTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
            $this->matchs = new ArrayCollection();
            $this->people = new ArrayCollection();
        }

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $title;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\Matchs", mappedBy="season")
         */
        private $matchs;

        /**
         * @ORM\ManyToMany(targetEntity="App\Entity\People", mappedBy="season")
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
         * @return Collection|Matchs[]
         */
        public function getMatchs(): Collection
        {
            return $this->matchs;
        }

        public function addMatch(Matchs $match): self
        {
            if (!$this->matchs->contains($match)) {
                $this->matchs[] = $match;
                $match->setSeason($this);
            }

            return $this;
        }

        public function removeMatch(Matchs $match): self
        {
            if ($this->matchs->contains($match)) {
                $this->matchs->removeElement($match);
                // set the owning side to null (unless already changed)
                if ($match->getSeason() === $this) {
                    $match->setSeason(null);
                }
            }

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
                $person->addSeason($this);
            }

            return $this;
        }

        public function removePerson(People $person): self
        {
            if ($this->people->contains($person)) {
                $this->people->removeElement($person);
                $person->removeSeason($this);
            }

            return $this;
        }
    }
