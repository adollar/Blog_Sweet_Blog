<?php

    namespace App\Controller;


    use App\Entity\User;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Routing\Annotation\Route;

    class UserController extends Controller
    {
        /**
         * @Route("/profile", name="user_profile")
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