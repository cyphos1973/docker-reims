<?php

    namespace App\Entity;

    use App\Entity\Traits\EntityActiveTrait;
    use \Exception;
    use App\Entity\Traits\EntityIdTrait;
    use App\Entity\Traits\EntityTimeTrait;
    use DateTimeImmutable;
    use Ramsey\Uuid\Uuid;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
     */
    class Users
    {
        use EntityIdTrait;
        use EntityActiveTrait;
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
        private $login;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $pwd;

        /**
         * @ORM\Column(type="datetime")
         */
        private $date_login;

        /**
         * @ORM\Column(type="datetime")
         */
        private $date_logout;

        public function getLogin(): ?string
        {
            return $this->login;
        }

        public function setLogin(string $login): self
        {
            $this->login = $login;

            return $this;
        }

        public function getPwd(): ?string
        {
            return $this->pwd;
        }

        public function setPwd(string $pwd): self
        {
            $this->pwd = $pwd;

            return $this;
        }

        public function getDateLogin(): ?\DateTimeInterface
        {
            return $this->date_login;
        }

        public function setDateLogin(\DateTimeInterface $date_login): self
        {
            $this->date_login = $date_login;

            return $this;
        }

        public function getDateLogout(): ?\DateTimeInterface
        {
            return $this->date_logout;
        }

        public function setDateLogout(\DateTimeInterface $date_logout): self
        {
            $this->date_logout = $date_logout;

            return $this;
        }
    }
