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
     * @ORM\Entity(repositoryClass="App\Repository\TeamsRepository")
     */
    class Teams
    {
        use EntityIdTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
            $this->matchs = new ArrayCollection();
            $this->home = new ArrayCollection();
            $this->away = new ArrayCollection();
        }

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $title;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $logo;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\Matchs", mappedBy="recevant")
         */
        private $home;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\Matchs", mappedBy="visitor")
         */
        private $away;

        public function getTitle(): ?string
        {
            return $this->title;
        }

        public function setTitle(string $title): self
        {
            $this->title = $title;

            return $this;
        }

        public function getLogo(): ?string
        {
            return $this->logo;
        }

        public function setLogo(string $logo): self
        {
            $this->logo = $logo;

            return $this;
        }

        /**
         * @return Collection|Matchs[]
         */
        public function getHome(): Collection
        {
            return $this->home;
        }

        public function addHome(Matchs $home): self
        {
            if (!$this->home->contains($home)) {
                $this->home[] = $home;
                $home->setRecevant($this);
            }

            return $this;
        }

        public function removeHome(Matchs $home): self
        {
            if ($this->home->contains($home)) {
                $this->home->removeElement($home);
                // set the owning side to null (unless already changed)
                if ($home->getRecevant() === $this) {
                    $home->setRecevant(null);
                }
            }

            return $this;
        }

        /**
         * @return Collection|Matchs[]
         */
        public function getAway(): Collection
        {
            return $this->away;
        }

        public function addAway(Matchs $away): self
        {
            if (!$this->away->contains($away)) {
                $this->away[] = $away;
                $away->setVisitor($this);
            }

            return $this;
        }

        public function removeAway(Matchs $away): self
        {
            if ($this->away->contains($away)) {
                $this->away->removeElement($away);
                // set the owning side to null (unless already changed)
                if ($away->getVisitor() === $this) {
                    $away->setVisitor(null);
                }
            }

            return $this;
        }

    }
