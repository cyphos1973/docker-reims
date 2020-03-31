<?php

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Matchs;

    /**
     * @Route("/", name="frontend_")
     */
    class FrontendController extends AbstractController
    {
        /**
         * @Route("/home", name="index")
         */
        public function index()
        {
            $matchsIndex = $this->getDoctrine()
                ->getRepository(Matchs::class)
                ->findAll();

            return $this->render('frontend/index.html.twig', [
                'matchs' => $matchsIndex
            ]);
        }

        /**
         * @Route("/histo", name="histo")
         */
        public function histo()
        {
            return $this->render('frontend/histo.html.twig');
        }

        /**
         * @Route("/palmares", name="palmares")
         */
        public function palmares()
        {
            return $this->render('frontend/palmares.html.twig');
        }

        /**
         * @Route("/matchs", name="matchs")
         */
        public function matchs()
        {
            return $this->render('frontend/matchs.html.twig');
        }

        /**
         * @Route("/media", name="media")
         */
        public function media()
        {
            return $this->render('frontend/media.html.twig');
        }

        /**
         * @Route("/team", name="team")
         */
        public function team()
        {
            return $this->render('frontend/team.html.twig');
        }

        /**
         * @Route("/person", name="person")
         */
        public function person()
        {
            return $this->render('frontend/person.html.twig');
        }
    }
