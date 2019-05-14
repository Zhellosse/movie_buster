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

class MovieFixtures extends Fixture
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
        $movie1->setUser($this->getReference(UserFixtures::USER_REFERENCE));
        
        $manager->persist($movie1);



        $manager->flush();
    }
}