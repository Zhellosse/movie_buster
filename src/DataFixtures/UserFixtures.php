<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Actors;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'userr';

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user@mail.fr');
        $user->setRoles(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user,'user123');
        $user->setPassword($password);
        $user->setPassword('user123');
        $user->setRank('user');
        $user->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-05-25'));
        $user->setSex('H');
        $user->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user->setPseudo('userpseudo');
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setEmail('modo@mail.fr');
        $user2->setRoles(['ROLE_MODO']);
        $user2->setPassword('modo123');
        $user2->setRank('modo');
        $user2->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-06-05'));
        $user2->setSex('F');
        $user2->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user2->setPseudo('modopseudo');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('admin@mail.fr');
        $user3->setRoles(['ROLE_ADMIN']);
        $user3->setPassword('admin123');
        $user3->setRank('admin');
        $user3->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-12-25'));
        $user3->setSex('H');
        $user3->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user3->setPseudo('adminpseudo');
        $manager->persist($user3);

        $manager->flush();

        $this->addReference('userr', $user3);
    }


}