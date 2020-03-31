<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Persistence\ObjectManager;
    use App\Entity\Posts;

    class PostsFixtures extends Fixture implements OrderedFixtureInterface
    {
        public function load(ObjectManager $manager)
        {
            $content = 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.';
            $image = 'ronaldo.jpeg';

            foreach ($this->getPosts() as [$title]) {
                $post = new Posts();

                $post->setTitle($title);
                $post->setContent($content);
                $post->setImage($image);
                $post->setPublished(true);
                $post->setCreatedat(new \DateTimeImmutable('now'));

                $manager->persist($post);
            }
            $manager->flush();

        }

        /**
         * Get an array of random Classroom names and grades.
         */
        private function getPosts(): array
        {
            return [
                ['Qu\'est-ce que le Lorem Ipsum?'],
                ['Pourquoi l\'utiliser?'],
                ['D\'où vient-il?'],
                ['Où puis-je m\'en procurer?'],
                ['Le passage de Lorem Ipsum standard, utilisé depuis 1500'],
                ['Traduction de H. Rackham (1914)'],
            ];
        }

        public function getOrder()
        {
            return 8;
        }
    }
