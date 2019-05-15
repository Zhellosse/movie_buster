<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Note;
use App\Entity\Actors;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class NoteFixtures extends Fixture
{
    public const Note_REFERENCE = 'Note';

    public function load(ObjectManager $manager)
    {
        $Note = new Note();
        $Note->setScore(2);
        $Note->setUser($this->getReference('userr'));
        $manager->persist($Note);

        $Note2 = new Note();
        $Note2->setScore(3);
        $Note2->setUser($this->getReference('userr'));
        $manager->persist($Note2);

        $Note3 = new Note();
        $Note3->setScore(1);
        $Note3->setUser($this->getReference('userr'));
        $manager->persist($Note3);

        $Note4 = new Note();
        $Note4->setScore(4);
        $Note4->setUser($this->getReference('userr'));
        $manager->persist($Note4);

        $Note5 = new Note();
        $Note5->setScore(5);
        $Note5->setUser($this->getReference('userr'));
        $manager->persist($Note5);

        $Note6 = new Note();
        $Note6->setScore(6);
        $Note6->setUser($this->getReference('userr'));
        $manager->persist($Note6);

        $Note7 = new Note();
        $Note7->setScore(7);
        $Note7->setUser($this->getReference('userr'));
        $manager->persist($Note7);

        $Note8 = new Note();
        $Note8->setScore(8);
        $Note8->setUser($this->getReference('userr'));
        $manager->persist($Note8);

        $Note9 = new Note();
        $Note9->setScore(9);
        $Note9->setUser($this->getReference('userr'));
        $manager->persist($Note9);

        $Note10 = new Note();
        $Note10->setScore(10);
        $Note10->setUser($this->getReference('userr'));
        $manager->persist($Note10);

        $Note11 = new Note();
        $Note11->setScore(9);
        $Note11->setUser($this->getReference('userr'));
        $manager->persist($Note11);

        $Note12 = new Note();
        $Note12->setScore(8);
        $Note12->setUser($this->getReference('userr'));
        $manager->persist($Note12);

        $Note13 = new Note();
        $Note13->setScore(7);
        $Note13->setUser($this->getReference('userr'));
        $manager->persist($Note13);

        $Note14 = new Note();
        $Note14->setScore(6);
        $Note14->setUser($this->getReference('userr'));
        $manager->persist($Note14);

        $Note15 = new Note();
        $Note15->setScore(5);
        $Note15->setUser($this->getReference('userr'));
        $manager->persist($Note15);

        $Note16 = new Note();
        $Note16->setScore(4);
        $Note16->setUser($this->getReference('userr'));
        $manager->persist($Note16);

        $Note17 = new Note();
        $Note17->setScore(3);
        $Note17->setUser($this->getReference('userr'));
        $manager->persist($Note17);

        $Note18 = new Note();
        $Note18->setScore(2);
        $Note18->setUser($this->getReference('userr'));
        $manager->persist($Note18);

        $Note19 = new Note();
        $Note19->setScore(1);
        $Note19->setUser($this->getReference('userr'));
        $manager->persist($Note19);

        $Note20 = new Note();
        $Note20->setScore(5);
        $Note20->setUser($this->getReference('userr'));
        $manager->persist($Note20);
        $manager->flush();

        $this->addReference('Note', $Note);
        $this->addReference('Note2', $Note2);
        $this->addReference('Note3', $Note3);
        $this->addReference('Note4', $Note4);
        $this->addReference('Note5', $Note5);
        $this->addReference('Note6', $Note6);
        $this->addReference('Note7', $Note7);
        $this->addReference('Note8', $Note8);
        $this->addReference('Note9', $Note9);
        $this->addReference('Note10', $Note10);
        $this->addReference('Note11', $Note11);
        $this->addReference('Note12', $Note12);
        $this->addReference('Note13', $Note13);
        $this->addReference('Note14', $Note14);
        $this->addReference('Note15', $Note15);
        $this->addReference('Note16', $Note16);
        $this->addReference('Note17', $Note17);
        $this->addReference('Note18', $Note18);
        $this->addReference('Note19', $Note19);
        $this->addReference('Note20', $Note20);
    }

}