<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

    class SecurityController extends Controller
    {
        /**
         * @Route("/login", name="login")
         *
         * @param AuthenticationUtils $authenticationUtils
         *
         * @return Response
         */
        public function login(AuthenticationUtils $authenticationUtils)
        {
            $error = $authenticationUtils->getLastAuthenticationError();

            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render(
                'security/login.html.twig',
                [
                    'last_username' => $lastUsername,
                    'error'         => $error,
                ]
            );
        }

        /**
         * @Route("/logout", name="logout")
         */
        public function logout()
        {
        }
    }
