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
        $movie1->setTitle('qu\'est ce qu\'on a fait au bon dieu ');
        $movie1->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1937-04-22'));
        $movie1->setClassification('tout public');
        $movie1->setSynopsis('blblbl');
        $movie1->setAffiche('bon_dieu.jpg');
        $movie1->setTrailer('yenapas');
        $movie1->setDirector('jean-mi français');
        $movie1->setDuree(120);
        $movie1->setCountry('France');
        $movie1->setUser($this->getReference('user1')); 
        $movie1->addActors($this->getReference('actor'));
        $movie1->addGenre($this->getReference('genre'));



        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('hitman');
        $movie2->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2007-04-22'));
        $movie2->setClassification('tout public');
        $movie2->setSynopsis('A gun-for-hire known only as Agent 47 hired by a group known only as The Organization is ensnared in a political conspiracy, which finds him pursued by both Interpol and the Russian military as he treks across Russia and Eastern Europe.');
        $movie2->setAffiche('hitman_.jpg');
        $movie2->setTrailer('ECvtE3JURTg');
        $movie2->setDirector('Xavier Gens');
        $movie2->setDuree(120);
        $movie2->setCountry('US');
        $movie2->setUser($this->getReference('user2')); 
        $movie2->addActors($this->getReference('actor2'));
        $movie2->addGenre($this->getReference('genre'));
        $manager->persist($movie2);

       

        $movie3 = new Movie();
        $movie3->setTitle('gran torino');
        $movie3->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2008-05-06'));
        $movie3->setClassification('tout public');
        $movie3->setSynopsis('Disgruntled Korean War veteran Walt Kowalski sets out to reform his neighbor, a Hmong teenager who tried to steal Kowalski\'s prized possession: a 1972 Gran Torino.');
        $movie3->setAffiche('grantorino_.jpg');
        $movie3->setTrailer('RMhbr2XQblk');
        $movie3->setDirector('clint eastwood');
        $movie3->setDuree(140);
        $movie3->setCountry('US');
        $movie3->setUser($this->getReference('user2')); 
        $movie3->addActors($this->getReference('actor3'));
        $movie3->addGenre($this->getReference('genre3'));
        $manager->persist($movie3);

        $movie4 = new Movie();
        $movie4->setTitle('v pour vandetta');
        $movie4->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2005-05-06'));
        $movie4->setClassification('tout public');
        $movie4->setSynopsis('In a future British tyranny, a shadowy freedom fighter, known only by the alias of "V", plots to overthrow it with the help of a young woman.');
        $movie4->setAffiche('vpourvandetta_.jpg');
        $movie4->setTrailer('bS2ca-vWLSg');
        $movie4->setDirector('James McTeigue');
        $movie4->setDuree(80);
        $movie4->setCountry('US');
        $movie4->setUser($this->getReference('user1')); 
        $movie4->addActors($this->getReference('actor4'));
        $movie4->addGenre($this->getReference('genre4'));

        $manager->persist($movie4);

        $movie5 = new Movie();
        $movie5->setTitle('The Dark Knight: Le chevalier noir');
        $movie5->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2008-05-06'));
        $movie5->setClassification('tout public');
        $movie5->setSynopsis('When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.');
        $movie5->setAffiche('tdn_.jpg');
        $movie5->setTrailer('EXeTwQWrcwY');
        $movie5->setDirector('christopher nolan');
        $movie5->setDuree(80);
        $movie5->setCountry('US');
        $movie5->setUser($this->getReference('user1')); 
        $movie5->addActors($this->getReference('actor5'));
        $movie5->addGenre($this->getReference('genre5'));

        $manager->persist($movie5);

        $movie6 = new Movie();
        $movie6->setTitle(' Fast & Furious: Tokyo Drift');
        $movie6->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2006-05-06'));
        $movie6->setClassification('tout public');
        $movie6->setSynopsis('A teenager becomes a major competitor in the world of drift racing after moving in with his father in Tokyo to avoid a jail sentence in America');
        $movie6->setAffiche('tokyodrift_.jpg');
        $movie6->setTrailer('p8HQ2JLlc4E');
        $movie6->setDirector('justin lin');
        $movie6->setDuree(80);
        $movie6->setCountry('US');
        $movie6->setUser($this->getReference('user1')); 
        $movie6->addActors($this->getReference('actor6'));
        $movie6->addGenre($this->getReference('genre6'));

        $manager->persist($movie6);

        $movie7 = new Movie();
        $movie7->setTitle('Sherlock Holmes');
        $movie7->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2007-05-06'));
        $movie7->setClassification('tout public');
        $movie7->setSynopsis('Detective Sherlock Holmes and his stalwart partner Watson engage in a battle of wits and brawn with a nemesis whose plot is a threat to all of England.');
        $movie7->setAffiche('sherlock_.jpg');
        $movie7->setTrailer('J7nJksXDBWc');
        $movie7->setDirector('guy ritchie');
        $movie7->setDuree(80);
        $movie7->setCountry('US');
        $movie7->setUser($this->getReference('user1')); 
        $movie7->addActors($this->getReference('actor7'));
        $movie7->addGenre($this->getReference('genre7'));

        $manager->persist($movie7);

        $movie8 = new Movie();
        $movie8->setTitle('Sacré Robin des Bois');
        $movie8->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1993-05-06'));
        $movie8->setClassification('tout public');
        $movie8->setSynopsis(' A spoof of Robin Hood in general, and Robin des bois: Prince des voleurs (1991) in particular.');
        $movie8->setAffiche('robinhood_.jpg');
        $movie8->setTrailer('LLjGFECRkFg');
        $movie8->setDirector('mel brooks');
        $movie8->setDuree(80);
        $movie8->setCountry('US');
        $movie8->setUser($this->getReference('user1')); 
        $movie8->addActors($this->getReference('actor8'));
        $movie8->addGenre($this->getReference('genre8'));

        $manager->persist($movie8);

        $movie9 = new Movie();
        $movie9->setTitle('le roi lion');
        $movie9->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1994-05-06'));
        $movie9->setClassification('tout public');
        $movie9->setSynopsis(' A Lion cub crown prince is tricked by a treacherous uncle into thinking he caused his father\'s death and flees into exile in despair, only to learn in adulthood his identity and his responsibilities.');
        $movie9->setAffiche('leroilion_.jpg');
        $movie9->setTrailer('_ujGv5dhGfk');
        $movie9->setDirector('roger allers');
        $movie9->setDuree(80);
        $movie9->setCountry('US');
        $movie9->setUser($this->getReference('user1')); 
        $movie9->addActors($this->getReference('actor9'));
        $movie9->addGenre($this->getReference('genre9'));

        $manager->persist($movie9);

        $movie10 = new Movie();
        $movie10->setTitle('Rat Race');
        $movie10->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2001-05-06'));
        $movie10->setClassification('tout public');
        $movie10->setSynopsis('A Las Vegas casino magnate, determined to find a new avenue for wagering, sets up a race for money.');
        $movie10->setAffiche('ratrace_.jpg');
        $movie10->setTrailer('9bRUdtiXxKM');
        $movie10->setDirector('Jerry Zucker');
        $movie10->setDuree(80);
        $movie10->setCountry('US');
        $movie10->setUser($this->getReference('user1')); 
        $movie10->addActors($this->getReference('actor10'));
        $movie10->addGenre($this->getReference('genre10'));

        $manager->persist($movie10);

        $movie11 = new Movie();
        $movie11->setTitle('Forrest Gump');
        $movie11->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1994-05-06'));
        $movie11->setClassification('tout public');
        $movie11->setSynopsis('The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.');
        $movie11->setAffiche('forrestgump_.jpg');
        $movie11->setTrailer('bLvqoHBptjg');
        $movie11->setDirector('Robert Zemeckis');
        $movie11->setDuree(80);
        $movie11->setCountry('US');
        $movie11->setUser($this->getReference('user1')); 
        $movie11->addActors($this->getReference('actor'));
        $movie11->addGenre($this->getReference('genre11'));

        $manager->persist($movie11);

        $movie12 = new Movie();
        $movie12->setTitle('Fight club');
        $movie12->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1994-05-06'));
        $movie12->setClassification('tout public');
        $movie12->setSynopsis('An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.');
        $movie12->setAffiche('fightclub_.jpg');
        $movie12->setTrailer('SUXWAEX2jlg');
        $movie12->setDirector('David Fincher ');
        $movie12->setDuree(80);
        $movie12->setCountry('US');
        $movie12->setUser($this->getReference('user1')); 
        $movie12->addActors($this->getReference('actor2'));
        $movie12->addGenre($this->getReference('genre12'));

        $manager->persist($movie12);

        $movie13 = new Movie();
        $movie13->setTitle('Ocean\'s eleven - Faites vos jeux!');
        $movie13->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2001-05-06'));
        $movie13->setClassification('tout public');
        $movie13->setSynopsis('Danny Ocean and his eleven accomplices plan to rob three Las Vegas casinos simultaneously.');
        $movie13->setAffiche('ocean11_.jpg');
        $movie13->setTrailer('imm6OR605UI');
        $movie13->setDirector('Steven Soderbergh ');
        $movie13->setDuree(80);
        $movie13->setCountry('US');
        $movie13->setUser($this->getReference('user1')); 
        $movie13->addActors($this->getReference('actor3'));
        $movie13->addGenre($this->getReference('genre13'));

        $manager->persist($movie13);

        $movie14 = new Movie();
        $movie14->setTitle('Le parrain ');
        $movie14->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1972-05-06'));
        $movie14->setClassification('tout public');
        $movie14->setSynopsis(' The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.');
        $movie14->setAffiche('leparrain_.jpg');
        $movie14->setTrailer('sY1S34973zA');
        $movie14->setDirector('Francis Ford Coppola ');
        $movie14->setDuree(80);
        $movie14->setCountry('US');
        $movie14->setUser($this->getReference('user1')); 
        $movie14->addActors($this->getReference('actor4'));
        $movie14->addGenre($this->getReference('genre14'));

        $manager->persist($movie14);

        
        $movie15 = new Movie();
        $movie15->setTitle('Vol au-dessus d\'un nid de coucou ');
        $movie15->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1975-05-06'));
        $movie15->setClassification('tout public');
        $movie15->setSynopsis(' A criminal pleads insanity after getting into trouble again and once in the mental institution rebels against the oppressive nurse and rallies up the scared patients.');
        $movie15->setAffiche('vol_.jpg');
        $movie15->setTrailer('bmDPW_bKpcU');
        $movie15->setDirector('Milos Forman ');
        $movie15->setDuree(80);
        $movie15->setCountry('US');
        $movie15->setUser($this->getReference('user1')); 
        $movie15->addActors($this->getReference('actor5'));
        $movie15->addGenre($this->getReference('genre15'));


        $manager->persist($movie15);

        $movie16 = new Movie();
        $movie16->setTitle('Taxi Driver');
        $movie16->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1976-05-06'));
        $movie16->setClassification('tout public');
        $movie16->setSynopsis('A mentally unstable veteran works as a nighttime taxi driver in New York City, where the perceived decadence and sleaze fuels his urge for violent action by attempting to liberate a presidential campaign worker and an underage prostitute.');
        $movie16->setAffiche('taxidriver_.jpg');
        $movie16->setTrailer('sLpMx8_TYOo');
        $movie16->setDirector('Martin Scorsese ');
        $movie16->setDuree(80);
        $movie16->setCountry('US');
        $movie16->setUser($this->getReference('user1')); 
        $movie16->addActors($this->getReference('actor6'));
        $movie16->addGenre($this->getReference('genre16'));

        $manager->persist($movie16);

        
        $movie17 = new Movie();
        $movie17->setTitle('Babe, le cochon devenu berger');
        $movie17->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '1995-05-06'));
        $movie17->setClassification('tout public');
        $movie17->setSynopsis('Babe, a pig raised by sheepdogs, learns to herd sheep with a little help from Farmer Hoggett.');
        $movie17->setAffiche('babe_.jpg');
        $movie17->setTrailer('Cd1xKIU4PI4');
        $movie17->setDirector('Chris Noonan ');
        $movie17->setDuree(80);
        $movie17->setCountry('US');
        $movie17->setUser($this->getReference('user2')); 
        $movie17->addActors($this->getReference('actor7'));
        $movie17->addGenre($this->getReference('genre17'));

        $manager->persist($movie17);

        
        $movie18 = new Movie();
        $movie18->setTitle('Les désastreuses aventures des orphelins Baudelaire ');
        $movie18->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2004-05-06'));
        $movie18->setClassification('tout public');
        $movie18->setSynopsis('When a massive fire kills their parents, three children are delivered to the custody of cousin and stage actor Count Olaf, who is secretly plotting to steal their parents\' vast fortune.');
        $movie18->setAffiche('ldadob_.jpg');
        $movie18->setTrailer('xcxsTkuVMQE');
        $movie18->setDirector('Brad Silberling');
        $movie18->setDuree(80);
        $movie18->setCountry('US');
        $movie18->setUser($this->getReference('user1')); 
        $movie18->addActors($this->getReference('actor8'));
        $movie18->addGenre($this->getReference('genre18'));

        $manager->persist($movie18);

        
        $movie19 = new Movie();
        $movie19->setTitle('Le Grinch');
        $movie19->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2000-05-06'));
        $movie19->setClassification('tout public');
        $movie19->setSynopsis('On the outskirts of Whoville, there lives a green, revenge-seeking Grinch (Jim Carrey), who plans on ruining Christmas for all of the citizens of the town.');
        $movie19->setAffiche('grinch_.jpg');
        $movie19->setTrailer('DD0m9t4WHEQ');
        $movie19->setDirector('Ron Howard ');
        $movie19->setDuree(80);
        $movie19->setCountry('US');
        $movie19->setUser($this->getReference('user2')); 
        $movie19->addActors($this->getReference('actor9'));
        $movie19->addGenre($this->getReference('genre19'));

        $manager->persist($movie19);

        
        $movie20 = new Movie();
        $movie20->setTitle(' Troie');
        $movie20->setReleaseDate(\DateTime::createFromFormat('Y-m-d', '2004-05-06'));
        $movie20->setClassification('tout public');
        $movie20->setSynopsis('An adaptation of Homer\'s great epic, the film follows the assault on Troy by the united Greek forces and chronicles the fates of the men involved');
        $movie20->setAffiche('troie_.jpg');
        $movie20->setTrailer('znTLzRJimeY');
        $movie20->setDirector('Wolfgang Petersen');
        $movie20->setDuree(80);
        $movie20->setCountry('US');
        $movie20->setUser($this->getReference('user1')); 
        $movie20->addActors($this->getReference('actor10'));
        $movie20->addGenre($this->getReference('genre20'));

        $manager->persist($movie20);

       
       

        



        $manager->flush();
        $this->addReference('movie1', $movie1);
    }

        public function getDependencies()
        {
            return array(
                GenreFixtures::class,
                ActorFixtures::class,
                UserFixtures::class,
            );
        }
   
}