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
        $user->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-05-25'));
        $user->setSex('H');
        $user->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user->setPseudo('userpseudo');
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setEmail('modo@mail.fr');
        $user2->setRoles(['ROLE_MODO']);
        $password2 = $this->encoder->encodePassword($user2,'modo123');
        $user2->setPassword($password2);
        $user2->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-06-05'));
        $user2->setSex('F');
        $user2->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user2->setPseudo('modopseudo');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('admin@mail.fr');
        $user3->setRoles(['ROLE_ADMIN']);

        $password3 = $this->encoder->encodePassword($user3,'admin123');
        $user3->setPassword($password3);
        $user3->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-12-25'));
        $user3->setSex('H');
        $user3->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user3->setPseudo('adminpseudo');
        $manager->persist($user3);


        $userweb = new User();
        $userweb->setEmail('quidelantoine@gmail.com');
        $userweb->setPseudo('antoine');
        $userweb->setSex('H');
        $userweb->setAvatar('public\asset\img\avatar_default_300x300.png');
        $userweb->setRoles(array('ROLE_ADMIN','ROLE_USER'));
        $userweb->setPassword($this->encoder->encodePassword(
            $userweb,
            'michel'
        ));
        $userweb->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1978-02-06'));
        $manager->persist($userweb);


        $manager->flush();

        $this->addReference('userr', $user3);
    }


}