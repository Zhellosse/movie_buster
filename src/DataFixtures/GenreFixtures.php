<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Actors;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class GenreFixtures extends Fixture
{
    public const GENRE_REFERENCE = 'GENRE';

    public function load(ObjectManager $manager)
    {
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

        $this->addReference('genre', $genre);
        $this->addReference('genre2', $genre2);
        $this->addReference('genre3', $genre3);
        $this->addReference('genre4', $genre4);
        $this->addReference('genre5', $genre5);
        $this->addReference('genre6', $genre6);
        $this->addReference('genre7', $genre7);
        $this->addReference('genre8', $genre8);
        $this->addReference('genre9', $genre9);
        $this->addReference('genre10', $genre10);
        $this->addReference('genre11', $genre11);
        $this->addReference('genre12', $genre12);
        $this->addReference('genre13', $genre13);
        $this->addReference('genre14', $genre14);
        $this->addReference('genre15', $genre15);
        $this->addReference('genre16', $genre16);
        $this->addReference('genre17', $genre17);
        $this->addReference('genre18', $genre18);
        $this->addReference('genre19', $genre19);
        $this->addReference('genre20', $genre20);
    }

}