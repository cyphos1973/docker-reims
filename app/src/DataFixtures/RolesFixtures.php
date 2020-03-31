<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Roles;

    class RolesFixtures extends Fixture implements OrderedFixtureInterface
    {
        public const ROLE_REFERENCE = 'role-';

        public function load(ObjectManager $manager)
        {
            $i = 1;
            foreach ($this->getRoles() as [$name]) {
                $role = new Roles();

                $role->setTitle($name);
                $role->setCreatedat(new \DateTimeImmutable('now'));
                $this->addReference(self::ROLE_REFERENCE . $i, $role);
                $manager->persist($role);
                $i++;
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getRoles(): array
        {
            return [
                ['Président d\'honneur'],
                ['Président'],
                ['Vice-président'],
                ['Secrétaire'],
                ['Secrétaire adjoint'],
                ['Trésorier'],
                ['Trésorier adjoint'],
                ['Conseiller'],
                ['Membre d\'honneur'],
                ['Entraîneur'],
                ['Entraîneur adjoint'],
                ['Délégué'],
                ['Médecin-kiné'],
                ['Gardien'],
                ['Défenseur'],
                ['Milieu'],
                ['Attaquant'],
            ];
        }

        public function getOrder()
        {
            return 4;
        }
    }
