<?php

    namespace App\Controller;


    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Routing\Annotation\Route;

    class HomepageController extends Controller
    {
        /**
         * @Route("/", name="homepage")
         */
        public function index()
        {
            return $this->render('user/index.html.twig', [
                'username' => 'User',
            ]);
        }
    }