<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Seasons;

    class SeasonsFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const SEASON_REFERENCE = 'season-';

        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getSeasons() as [$name]) {
                $season = new Seasons();

                $season->setTitle($name);
                $season->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::SEASON_REFERENCE . $i, $season);
                $manager->persist($season);
                $i++;
            }
            $manager->flush();
        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getSeasons(): array
        {
            return [
                ['2000-2001'],
                ['2001-2002'],
                ['2002-2003'],
                ['2003-2004'],
                ['2004-2005'],
                ['2005-2006'],
                ['2006-2007'],
                ['2007-2008'],
                ['2008-2009'],
                ['2009-2010'],
                ['2010-2011'],
                ['2011-2012'],
                ['2012-2013'],
                ['2013-2014'],
                ['2014-2015'],
                ['2015-2016'],
                ['2016-2017'],
                ['2017-2018'],
                ['2018-2019'],
                ['2019-2020'],
                ['2020-2021'],
                ['2021-2022'],
                ['2022-2023'],
            ];
        }

        public function getOrder()
        {
            return 9;
        }
    }
