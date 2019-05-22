<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Note;
use App\Entity\Actors;
use App\Entity\Movie;
use App\DataFixtures\MovieFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NoteFixtures extends Fixture implements DependentFixtureInterface
{
    

    public function load(ObjectManager $manager)
    {
        $note = new note();
        $note->setScore(2);
        $note->setUser($this->getReference('user1'));
        $note->setMovie($this->getReference('movie1'));
        $manager->persist($note);
        $manager->flush();
/*
        $note2 = new note();
        $note2->setScore(3);
        $note2->setUser($this->getReference('user1'));
        $manager->persist($note2);

        $note3 = new note();
        $note3->setScore(1);
        $note3->setUser($this->getReference('user1'));
        $manager->persist($note3);

        $note4 = new note();
        $note4->setScore(4);
        $note4->setUser($this->getReference('user1'));
        $manager->persist($note4);

        $note5 = new note();
        $note5->setScore(5);
        $note5->setUser($this->getReference('user1'));
        $manager->persist($note5);

        $note6 = new note();
        $note6->setScore(6);
        $note6->setUser($this->getReference('user1'));
        $manager->persist($note6);

        $note7 = new note();
        $note7->setScore(7);
        $note7->setUser($this->getReference('user1'));
        $manager->persist($note7);

        $note8 = new note();
        $note8->setScore(8);
        $note8->setUser($this->getReference('user1'));
        $manager->persist($note8);

        $note9 = new note();
        $note9->setScore(9);
        $note9->setUser($this->getReference('user1'));
        $manager->persist($note9);

        $note10 = new note();
        $note10->setScore(10);
        $note10->setUser($this->getReference('user1'));
        $manager->persist($note10);

        $note11 = new note();
        $note11->setScore(9);
        $note11->setUser($this->getReference('user1'));
        $manager->persist($note11);

        $note12 = new note();
        $note12->setScore(8);
        $note12->setUser($this->getReference('user1'));
        $manager->persist($note12);

        $note13 = new note();
        $note13->setScore(7);
        $note13->setUser($this->getReference('user1'));
        $manager->persist($note13);

        $note14 = new note();
        $note14->setScore(6);
        $note14->setUser($this->getReference('user1'));
        $manager->persist($note14);

        $note15 = new note();
        $note15->setScore(5);
        $note15->setUser($this->getReference('user1'));
        $manager->persist($note15);

        $note16 = new note();
        $note16->setScore(4);
        $note16->setUser($this->getReference('user2'));
        $manager->persist($note16);

        $note17 = new note();
        $note17->setScore(3);
        $note17->setUser($this->getReference('user2'));
        $manager->persist($note17);

        $note18 = new note();
        $note18->setScore(2);
        $note18->setUser($this->getReference('user2'));
        $manager->persist($note18);

        $note19 = new note();
        $note19->setScore(1);
        $note19->setUser($this->getReference('user2'));
        $manager->persist($note19);

        $note20 = new note();
        $note20->setScore(5);
        $note20->setUser($this->getReference('user2'));
        $manager->persist($note20);
        */
        
 /*
        $this->addReference('note', $note);
       
        $this->addReference('note2', $note2);
        $this->addReference('note3', $note3);
        $this->addReference('note4', $note4);
        $this->addReference('note5', $note5);
        $this->addReference('note6', $note6);
        $this->addReference('note7', $note7);
        $this->addReference('note8', $note8);
        $this->addReference('note9', $note9);
        $this->addReference('note10', $note10);
        $this->addReference('note11', $note11);
        $this->addReference('note12', $note12);
        $this->addReference('note13', $note13);
        $this->addReference('note14', $note14);
        $this->addReference('note15', $note15);
        $this->addReference('note16', $note16);
        $this->addReference('note17', $note17);
        $this->addReference('note18', $note18);
        $this->addReference('note19', $note19);
        $this->addReference('note20', $note20);
        */
       
    }
    public function getDependencies()
    {
        return array(

            MovieFixtures::class,
         
        );
    }

}