<?php

    namespace App\Controller;

    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class IndexController extends Controller
    {
        /**
         * @Route("/", name="user")
         */
        public function index()
        {
            return $this->render(
                'user/index.html.twig',
                [
                    'username' => 'User',
                ]
            );
        }
    }
