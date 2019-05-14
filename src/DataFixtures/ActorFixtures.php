<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Actors;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;


class ActorFixtures extends Fixture
{
    public const ACTOR_REFERENCE = 'ACTOR';
    
    public function load(ObjectManager $manager)
    {
        

        $actor1 = new Actors();
        $actor1->setFirstName('Christian');
        $actor1->setLastName('Clavier');
        $actor1->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1965-06-05'));
        $manager->persist($actor1);

        $actor2 = new Actors();
        $actor2->setFirstName('Gérard');
        $actor2->setLastName('Depardieu');
        $actor2->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1952-12-27'));
        $manager->persist($actor2);
        
        $actor3 = new Actors();
        $actor3->setFirstName('Alain');
        $actor3->setLastName('Delon');
        $actor3->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1935-11-08'));
        $manager->persist($actor3);

        $actor4 = new Actors();
        $actor4->setFirstName('Vincent');
        $actor4->setLastName('Cassel');
        $actor4->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1966-12-23'));
        $manager->persist($actor4);

        $actor5 = new Actors();
        $actor5->setFirstName('Jean');
        $actor5->setLastName('Reno');
        $actor5->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1948-07-30'));
        $manager->persist($actor5);

        $actor6 = new Actors();
        $actor6->setFirstName('Gérard');
        $actor6->setLastName('Jugnot');
        $actor6->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1952-12-27'));
        $manager->persist($actor6);

        $actor7 = new Actors();
        $actor7->setFirstName('Leonardo');
        $actor7->setLastName('DiCaprio');
        $actor7->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1974-11-11'));
        $manager->persist($actor7);

        $actor8 = new Actors();
        $actor8->setFirstName('Johnny');
        $actor8->setLastName('Depp');
        $actor8->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1963-06-09'));
        $manager->persist($actor8);

        $actor9 = new Actors();
        $actor9->setFirstName('Robert');
        $actor9->setLastName('Downey Jr.');
        $actor9->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1965-04-04'));
        $manager->persist($actor9);

        $actor10 = new Actors();
        $actor10->setFirstName('Jack');
        $actor10->setLastName('Nicholson');
        $actor10->setBirthDate(\DateTime::createFromFormat('Y-m-d', '1937-04-22'));
        $manager->persist($actor10);
        $manager->flush();

        $this->addReference(self::ACTOR_REFERENCE, $actor1);
    }
}
