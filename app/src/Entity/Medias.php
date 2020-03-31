<?php

    namespace App\Entity;

    use App\Entity\Traits\EntityPublishedTrait;
    use \Exception;
    use App\Entity\Traits\EntityIdTrait;
    use App\Entity\Traits\EntityTimeTrait;
    use DateTimeImmutable;
    use Ramsey\Uuid\Uuid;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\MediasRepository")
     */
    class Medias
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
        private $image;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $description;

        public function getImage(): ?string
        {
            return $this->image;
        }

        public function setImage(?string $image): self
        {
            $this->image = $image;

            return $this;
        }

        public function getDescription(): ?string
        {
            return $this->description;
        }

        public function setDescription(?string $description): self
        {
            $this->description = $description;

            return $this;
        }
    }
