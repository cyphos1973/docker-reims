<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Teams;

    class TeamsFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const TEAM_REFERENCE = 'team-';

        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getTeams() as [$title, $logo]) {
                $team = new Teams();

                $team->setTitle($title);
                $team->setLogo($logo);
                $team->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::TEAM_REFERENCE . $i, $team);
                $manager->persist($team);
                $i++;
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getTeams(): array
        {
            return [
                ['CSSM PARIS', 'cssmp.png'],
                ['ASS BORDEAUX', 'assb.png'],
                ['ESS VITRY', 'essv.png'],
                ['ASS STRASBOURG', 'asss.png'],
                ['CSS REIMS', 'ccsr.png'],
                ['CSS RENNES', 'cssr.png'],
                ['ASS MARSEILLE', 'assm.png'],
            ];
        }

        public function getOrder()
        {
            return 5;
        }
    }
