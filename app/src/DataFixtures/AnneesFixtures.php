<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Annees;

    class AnneesFixtures extends Fixture implements OrderedFixtureInterface
    {
        public function load(ObjectManager $manager)
        {

            foreach ($this->getAnnees() as [$name]) {
                $annee = new Annees();

                $annee->setTitle($name);
                $annee->setCreatedat(new \DateTimeImmutable('now'));

                $manager->persist($annee);
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getAnnees(): array
        {
            return [
                ['2000'],
                ['2001'],
                ['2002'],
                ['2003'],
                ['2004'],
                ['2005'],
                ['2006'],
                ['2007'],
                ['2008'],
                ['2009'],
                ['2010'],
                ['2011'],
                ['2012'],
                ['2013'],
                ['2014'],
                ['2015'],
                ['2016'],
                ['2017'],
                ['2018'],
                ['2018'],
                ['2020'],
                ['2021'],
                ['2022'],
            ];
        }

        public function getOrder()
        {
            return 1;
        }
    }
