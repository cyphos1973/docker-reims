<?php

    namespace App\Entity\Traits;

    use Doctrine\ORM\Mapping as ORM;

    trait EntityActiveTrait
    {
        /**
         * @var boolean
         * @ORM\Column(type="boolean", options={"default": false})
         */
        private $active = false;

        /**
         * @return bool
         */
        public function isActive(): bool
        {
            return $this->active;
        }

        /**
         * @param bool $active
         * @return ActiveTrait
         */
        public function setActive(bool $active): self
        {
            $this->active = $active;
            return $this;
        }
    }