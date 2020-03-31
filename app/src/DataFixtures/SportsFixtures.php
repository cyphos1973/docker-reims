<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Sports;

    class SportsFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const SPORT_REFERENCE = 'sport-';

        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getSports() as [$name]) {
                $sport = new Sports();

                $sport->setTitle($name);
                $sport->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::SPORT_REFERENCE . $i, $sport);
                $manager->persist($sport);
                $i++;
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getSports(): array
        {
            return [
                ['Athlétisme'],
                ['Basket'],
                ['Badminton'],
                ['Boules lyonnaises'],
                ['Bowling'],
                ['Football'],
                ['Futsal'],
                ['Tir'],
                ['Volley'],
            ];
        }

        public function getOrder()
        {
            return 6;
        }
    }
