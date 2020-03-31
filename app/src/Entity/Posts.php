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
     * @ORM\Entity(repositoryClass="App\Repository\PostsRepository")
     */
    class Posts
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
         * @ORM\Column(type="string", length=255)
         */
        private $title;

        /**
         * @ORM\Column(type="text", nullable=true)
         */
        private $content;

        /**
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $image;

        public function getTitle(): ?string
        {
            return $this->title;
        }

        public function setTitle(string $title): self
        {
            $this->title = $title;

            return $this;
        }

        public function getContent(): ?string
        {
            return $this->content;
        }

        public function setContent(?string $content): self
        {
            $this->content = $content;

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
    }
