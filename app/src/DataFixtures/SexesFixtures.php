<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Sexes;

    class SexesFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const SEXE_REFERENCE = 'sexe-';

        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getSexes() as [$name]) {
                $sexe = new Sexes();

                $sexe->setTitle($name);
                $sexe->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::SEXE_REFERENCE . $i, $sexe);
                $manager->persist($sexe);
                $i++;
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getSexes(): array
        {
            return [
                ['Homme'],
                ['Femme'],
                ['Garçon'],
                ['Fille'],
                ['MR'],
                ['MME'],
                ['MELLE'],
                ['Monsieur'],
                ['Madame'],
                ['Mademoiselle'],
            ];
        }

        public function getOrder()
        {
            return 5;
        }
    }
