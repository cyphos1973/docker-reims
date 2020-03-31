<?php

    namespace App\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    use \Exception;
    use App\Entity\Traits\EntityPublishedTrait;
    use App\Entity\Traits\EntityIdTrait;
    use App\Entity\Traits\EntityTimeTrait;
    use DateTimeImmutable;
    use Ramsey\Uuid\Uuid;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\MatchsRepository")
     */
    class Matchs
    {
        use EntityIdTrait;
        use EntityPublishedTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
        }

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $description;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $score;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $score_detail;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $typeScore;

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Seasons", inversedBy="matchs")
         */
        private $season;

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Sports", inversedBy="matchs")
         */
        private $sport;

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Competitions", inversedBy="matchs")
         */
        private $competition;

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Sexes", inversedBy="matchs")
         */
        private $sexe;

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Teams", inversedBy="home")
         */
        private $recevant;

        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Teams", inversedBy="away")
         */
        private $visitor;

        public function getDescription(): ?string
        {
            return $this->description;
        }

        public function setDescription(?string $description): self
        {
            $this->description = $description;

            return $this;
        }

        public function getScore(): ?string
        {
            return $this->score;
        }

        public function setScore(?string $score): self
        {
            $this->score = $score;

            return $this;
        }

        public function getScoreDetail(): ?string
        {
            return $this->score_detail;
        }

        public function setScoreDetail(?string $score_detail): self
        {
            $this->score_detail = $score_detail;

            return $this;
        }

        public function getTypeScore(): ?string
        {
            return $this->typeScore;
        }

        public function setTypeScore(string $typeScore): self
        {
            $this->typeScore = $typeScore;

            return $this;
        }

        public function getSeason(): ?Seasons
        {
            return $this->season;
        }

        public function setSeason(?Seasons $season): self
        {
            $this->season = $season;

            return $this;
        }

        public function getSport(): ?Sports
        {
            return $this->sport;
        }

        public function setSport(?Sports $sport): self
        {
            $this->sport = $sport;

            return $this;
        }

        public function getCompetition(): ?Competitions
        {
            return $this->competition;
        }

        public function setCompetition(?Competitions $competition): self
        {
            $this->competition = $competition;

            return $this;
        }

        public function getSexe(): ?Sexes
        {
            return $this->sexe;
        }

        public function setSexe(?Sexes $sexe): self
        {
            $this->sexe = $sexe;

            return $this;
        }

        public function getRecevant(): ?Teams
        {
            return $this->recevant;
        }

        public function setRecevant(?Teams $recevant): self
        {
            $this->recevant = $recevant;

            return $this;
        }

        public function getVisitor(): ?Teams
        {
            return $this->visitor;
        }

        public function setVisitor(?Teams $visitor): self
        {
            $this->visitor = $visitor;

            return $this;
        }
    }
