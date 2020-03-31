<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Matchs;

    class MatchsFixtures extends Fixture implements OrderedFixtureInterface
    {
        public function load(ObjectManager $manager)
        {
            foreach ($this->getMatchs() as [$description, $score, $score_detail, $type_score, $published]) {
                $match = new Matchs();

                $match->setDescription($description);
                $match->setScore($score);
                $match->setScoreDetail($score_detail);
                $match->setTypeScore($type_score);
                $match->setPublished($published);
                $match->setCreatedat(new \DateTimeImmutable('now'));
                $match->setSeason($this->getReference(SeasonsFixtures::SEASON_REFERENCE . rand(1,7)));
                $match->setSport($this->getReference(SportsFixtures::SPORT_REFERENCE . rand(1,7)));
                $match->setCompetition($this->getReference(CompetitionsFixtures::COMPETITION_REFERENCE . rand(1,7)));
                $match->setSexe($this->getReference(SexesFixtures::SEXE_REFERENCE . rand(1,7)));
                $match->setRecevant($this->getReference(TeamsFixtures::TEAM_REFERENCE . rand(1,7)));
                $match->setVisitor($this->getReference(TeamsFixtures::TEAM_REFERENCE . rand(1,7)));
                $manager->persist($match);
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getMatchs(): array
        {
            return [
                ['à Paris', '2 - 0', '', 'V', '1'],
                ['à Paris', '2 - 0', '', 'VP', '1'],
                ['à Paris', '2 - 2', '6-5', 'VTAB', '1'],
                ['à Paris', '0 - 0', '', 'N', '1'],
                ['à Paris', '0 - 1', '', 'D', '1'],
                ['à Paris', '0 - 1', '', 'DP', '1'],
                ['à Paris', '1 - 1', '3-5', 'DTAB', '1'],
            ];
        }

        public function getDependencies()
        {
            return array(
                SeasonsFixtures::class,
            );
        }

        public function getOrder()
        {
            return 10;
        }
    }
