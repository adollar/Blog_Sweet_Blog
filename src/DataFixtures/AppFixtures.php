<?php

    namespace App\DataFixtures;

    use App\Entity\User;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class AppFixtures extends Fixture
    {
        private $encoder;

        public function __construct(UserPasswordEncoderInterface $encoder)
        {
            $this->encoder = $encoder;
        }

        public function load(ObjectManager $manager)
        {
            $user = new User();
            $user->setUsername('user');

            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $user->setEmail('user@gmail.com');
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
            $manager->flush();    
            
            $user = new User();
            $user->setUsername('admin');

            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);
            $user->setEmail('antony.hopkins008@gmail.com');
            $user->setRoles(['ROLE_ADMIN']);

            $manager->persist($user);
            $manager->flush();
        }
    }