<?php

    namespace App\Entity\Traits;

    use DateTime;
    use DateTimeInterface;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * A trait for createdAt and updatedAt properties in every entities.
     * You can also use mappedsuperclass but not recommended.
     *
     * @author  Gaëtan Rolé-Dubruille <gaetan.role-dubruille@sensiolabs.com>
     * @link    https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/inheritance-mapping.html
     * @link    https://stackoverflow.com/questions/25749418/symfony2-mappedsuperclass-and-doctrinegenerateentities
     */
    trait EntityPublishedTrait
    {
        /**
         * @var boolean
         * @ORM\Column(type="boolean", options={"default": false})
         */
        private $published = false;

        /**
         * @return bool
         */
        public function isPublished(): bool
        {
            return $this->published;
        }

        /**
         * @param bool $published
         *
         * @return PublishedTrait
         */
        public function setPublished(bool $published): self
        {
            $this->published = $published;
            return $this;
        }
    }
