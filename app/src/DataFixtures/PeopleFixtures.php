<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\People;

    class PeopleFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const PEOPLE_REFERENCE = 'person-';
        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getPeople() as [$firstname, $lastname]) {
                $person = new People();

                $person->setFirstName($firstname);
                $person->setLastName($lastname);
                $person->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::PEOPLE_REFERENCE . $i, $person);
                $manager->persist($person);
                $i++;
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getPeople(): array
        {
            return [
                ['Louis', 'RODRIGUES'],
                ['Gilles', 'MACODE'],
                ['Franck', 'DAVID'],
                ['Fabrice', 'TRUMP'],
                ['Nadia', 'DATER'],
                ['Sophie', 'MIRA'],
                ['Pauline', 'POIDAD'],
                ['Aurélien', 'DUPONT'],
                ['Julien', 'DUPONT'],
                ['Stéphane', 'TUCA'],
                ['Ambre', 'MACODE'],
            ];
        }

        public function getOrder()
        {
            return 11;
        }
    }
