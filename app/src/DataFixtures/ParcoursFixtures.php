<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Parcours;

    class ParcoursFixtures extends Fixture implements OrderedFixtureInterface
    {
        public function load(ObjectManager $manager)
        {

            foreach ($this->getParcours() as [$name]) {
                $parcours = new Parcours();

                $parcours->setTitle($name);
                $parcours->setCreatedat(new \DateTimeImmutable('now'));

                $manager->persist($parcours);
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getParcours(): array
        {
            return [
                ['Vainqueur'],
                ['Or'],
                ['Champion'],
                ['Finaliste'],
                ['Argent'],
                ['Vice-champion'],
                ['Demi-finale'],
                ['Bronze'],
                ['Quart de finale'],
                ['Huitième de finale'],
                ['Tour préliminaire'],
            ];
        }

        public function getOrder()
        {
            return 3;
        }
    }
