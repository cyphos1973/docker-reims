<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Countries;

    class CountriesFixtures extends Fixture implements OrderedFixtureInterface
    {
        public function load(ObjectManager $manager)
        {

            foreach ($this->getCountries() as [$fullname, $alpha2, $alpha3, $code]) {
                $country = new Countries();

                $country->setName($fullname);
                $country->setAlpha2($alpha2);
                $country->setAlpha3($alpha3);
                $country->setCodeLocale($code);
                $country->setCreatedat(new \DateTimeImmutable('now'));

                $manager->persist($country);
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getCountries(): array
        {
            return [
                ['France', 'Fr', 'Fra', 'fr_FR'],
                ['États-Unis', 'US', 'USA', 'en_US'],
                ['Allemagne', 'De', 'Deu', 'de_DE'],
            ];
        }

        public function getOrder()
        {
            return 2;
        }
    }
