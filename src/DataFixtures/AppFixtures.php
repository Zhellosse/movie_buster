<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('user@mail.fr');
        $user->setRoles(['user']);
        $user->setPassword('user123');
        $user->setRank('user');
        $user->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-05-25'));
        $user->setSex('H');
        $user->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user->setPseudo('userpseudo');
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setEmail('modo@mail.fr');
        $user2->setRoles(['modo']);
        $user2->setPassword('modo123');
        $user2->setRank('modo');
        $user2->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-06-05'));
        $user2->setSex('F');
        $user2->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user2->setPseudo('modopseudo');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('admin@mail.fr');
        $user3->setRoles(['admin']);
        $user3->setPassword('admin123');
        $user3->setRank('admin');
        $user3->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1990-12-25'));
        $user3->setSex('H');
        $user3->setAvatar('public\asset\img\avatar_default_300x300.png');
        $user3->setPseudo('adminpseudo');
        $manager->persist($user3);

        
        
        $genre = new Genre();
        $genre->setName('action');
        $manager->persist($genre);

        $genre2 = new Genre();
        $genre2->setName('drama');
        $manager->persist($genre2);

        $genre3 = new Genre();
        $genre3->setName('thriller');
        $manager->persist($genre3);

        $genre4 = new Genre();
        $genre4->setName('adventure');
        $manager->persist($genre4);

        $genre5 = new Genre();
        $genre5->setName('crime');
        $manager->persist($genre5);

        $genre6 = new Genre();
        $genre6->setName('comedy');
        $manager->persist($genre6);

        $genre7 = new Genre();
        $genre7->setName('animated');
        $manager->persist($genre7);

        $genre8 = new Genre();
        $genre8->setName('family');
        $manager->persist($genre8);

        $genre9 = new Genre();
        $genre9->setName('fantasy');
        $manager->persist($genre9);

        $genre10 = new Genre();
        $genre10->setName('historical');
        $manager->persist($genre10);

        $genre11 = new Genre();
        $genre11->setName('epic');
        $manager->persist($genre11);

        $genre12 = new Genre();
        $genre12->setName('horror');
        $manager->persist($genre12);

        $genre13 = new Genre();
        $genre13->setName('music');
        $manager->persist($genre13);

        $genre14 = new Genre();
        $genre14->setName('period');
        $manager->persist($genre14);

        $genre15 = new Genre();
        $genre15->setName('romance');
        $manager->persist($genre15);

        $genre16 = new Genre();
        $genre16->setName('romantic');
        $manager->persist($genre16);

        $genre17 = new Genre();
        $genre17->setName('sci-fi');
        $manager->persist($genre17);

        $genre18 = new Genre();
        $genre18->setName('sports');
        $manager->persist($genre18);

        $genre19 = new Genre();
        $genre19->setName('war');
        $manager->persist($genre19);

        $genre20 = new Genre();
        $genre20->setName('western');
        $manager->persist($genre20);

        


        $manager->flush();
    }
}
