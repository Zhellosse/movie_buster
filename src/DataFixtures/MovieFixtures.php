<?php

namespace App\DataFixtures;
use App\DataFixtures\ActorFixtures;
use App\DataFixtures\GenreFixtures;
use App\DataFixtures\UserFixtures;
use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Actors;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $movie1 = new Movie();
        $movie1->setTitle('qu\'est ce qu\'on a fait au bon dieu');
        $movie1->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1937-04-22'));
        $movie1->setClassification('tout public');
        $movie1->setSynopsis('blblbl');
        $movie1->setAffiche('url');
        $movie1->setTrailer('yenapas');
        $movie1->setDirector('jean-mi français');
        $movie1->setDuree(120);
        $movie1->setCountry('France');
        $movie1->setUser($this->getReference('userr')); 
        $movie1->addActors($this->getReference('actor'));
        $movie1->addGenre($this->getReference('genre'));


        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('hitman');
        $movie2->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2007-04-22'));
        $movie2->setClassification('tout public');
        $movie2->setSynopsis('A gun-for-hire known only as Agent 47 hired by a group known only as The Organization is ensnared in a political conspiracy, which finds him pursued by both Interpol and the Russian military as he treks across Russia and Eastern Europe.');
        $movie2->setAffiche('public\asset\img\movieaffiche\hitman_.jpg');
        $movie2->setTrailer('https://www.youtube.com/watch?v=ECvtE3JURTg');
        $movie2->setDirector('Xavier Gens');
        $movie2->setDuree(120);
        $movie2->setCountry('US');
        $movie2->setUser($this->getReference('userr')); 
        $movie2->addActors($this->getReference('actor2'));
        $movie2->addGenre($this->getReference('genre'));
        $manager->persist($movie2);



        $manager->flush();
    }

    public function getDependencies()
    {
        return array(

            GenreFixtures::class,
            ActorFixtures::class,
            UserFixtures::class
        );
    }
}