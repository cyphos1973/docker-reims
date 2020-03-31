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
     * @ORM\Entity(repositoryClass="App\Repository\SportsRepository")
     */
    class Sports
    {
        use EntityIdTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
            $this->matchs = new ArrayCollection();
        }

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $title;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\Matchs", mappedBy="sport")
         */
        private $matchs;

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
                $match->setSport($this);
            }

            return $this;
        }

        public function removeMatch(Matchs $match): self
        {
            if ($this->matchs->contains($match)) {
                $this->matchs->removeElement($match);
                // set the owning side to null (unless already changed)
                if ($match->getSport() === $this) {
                    $match->setSport(null);
                }
            }

            return $this;
        }
    }
