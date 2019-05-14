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
    {$movie1 = new Movie();
        $movie1->setTitle('qu\'est ce qu\'on a fait au bon dieu');
        $movie1->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1937-04-22'));
        $movie1->setClassification('tout public');
        $movie1->setSynopsis('blblbl');
        $movie1->setAffiche('url');
        $movie1->setTrailer('yenapas');
        $movie1->setDirector('jean-mi français');
        $movie1->setDuree(120);
        $movie1->setCountry('France');
        

        $movie1->addActors($this->getReference(ActorFixtures::ACTOR_REFERENCE));
        $movie1->addGenre($this->getReference(GenreFixtures::GENRE_REFERENCE));
        $movie1->setUser($this->getReference('userr'));
        $manager->persist($movie1);



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