<?php

    namespace App\Controller;

    use App\Entity\User;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class AdminController extends Controller
    {
        /**
         * @Route("/admin", name="user")
         *
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function index()
        {
            /** @var User $currentUser */
            $currentUser = $this->getUser();

            return $this->render('user/index.html.twig', [
                'username' => $currentUser->getUsername(),
            ]);
        }
    }
