<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Competitions;

    class CompetitionsFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const COMPETITION_REFERENCE = 'competition-';

        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getCompetitions() as [$name]) {
                $competition = new Competitions();

                $competition->setTitle($name);
                $competition->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::COMPETITION_REFERENCE . $i, $competition);
                $manager->persist($competition);
                $i++;
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getCompetitions(): array
        {
            return [
                ['Coupe de France'],
                ['Coupe d\'Espérance'],
                ['Championnat de France'],
                ['Championnat de France zone'],
                ['Championnat régional'],
                ['Championnat d\'Europe Danemark 2011'],
                ['Championnat du monde Turquie 2012'],
                ['Championnat d\'Europe Bulgarie 2014'],
                ['Championnat d\'Europe Allemagne 2015'],
                ['Deaflympics Turquie 2017'],
                ['Championnat d\'Europe Grèĉe 2019'],
                ['Deaflympics Brésil 2021'],
                ['DCL Graz 2015'],
                ['DCL Sevilla 2017'],
                ['DCL Alcala 2018'],
                ['DCL Milan 2018'],
                ['DCL Stuttgart 2019'],
            ];
        }

        public function getOrder()
        {
            return 7;
        }
    }
