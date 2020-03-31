<?php

    namespace App\Entity;

    use \Exception;
    use App\Entity\Traits\EntityIdTrait;
    use App\Entity\Traits\EntityTimeTrait;
    use DateTimeImmutable;
    use Ramsey\Uuid\Uuid;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\CountriesRepository")
     */
    class Countries
    {
        use EntityIdTrait;
        use EntityTimeTrait;

        /** @throws Exception */
        public function __construct()
        {
            $this->uuid = Uuid::uuid4();
            $this->setCreatedAt(new DateTimeImmutable());
        }

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $name;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $alpha2;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $alpha3;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $code_locale;

        public function getName(): ?string
        {
            return $this->name;
        }

        public function setName(string $name): self
        {
            $this->name = $name;

            return $this;
        }

        public function getAlpha2(): ?string
        {
            return $this->alpha2;
        }

        public function setAlpha2(string $alpha2): self
        {
            $this->alpha2 = $alpha2;

            return $this;
        }

        public function getAlpha3(): ?string
        {
            return $this->alpha3;
        }

        public function setAlpha3(string $alpha3): self
        {
            $this->alpha3 = $alpha3;

            return $this;
        }

        public function getCodeLocale(): ?string
        {
            return $this->code_locale;
        }

        public function setCodeLocale(string $code_locale): self
        {
            $this->code_locale = $code_locale;

            return $this;
        }
    }
