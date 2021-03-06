<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $release_date;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     * )
     */
    private $classification;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     * )
     */
    private $synopsis;

  
    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Image(
     * maxSize = "4M",
     * maxSizeMessage = "Images supérieurs à 4Mo interdit",
     * mimeTypes = { "image/jpeg", "image/png" }
     * )
     */
    private $affiche;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=150)
     */
    private $trailer;
    
    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=150)
     */
    private $director;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     * )
     */
    private $country;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string")
     *  * @Assert\Length(
     *      min = 1,
     *      max = 250,
     * )
     */
    private $title;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToMany(targetEntity="App\Entity\Actors", inversedBy="movies",cascade={"persist"})
     */
    private $actors;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToMany(targetEntity="App\Entity\Genre", inversedBy="movies",cascade={"persist"})
     */
    private $genre;

   

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="movies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="favoris")
     */
    private $users;


    

    public function __construct()
    {
        $this->actors = new ArrayCollection();
        $this->genre = new ArrayCollection();
        $this->note = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getAffiche(): ?string
    {
        return $this->affiche;
    }

    public function setAffiche(string $affiche): self
    {
        $this->affiche = $affiche;

        return $this;
    }

    public function getTrailer(): ?string
    {
        return $this->trailer;
    }

    public function setTrailer(string $trailer): self
    {
        $this->trailer = $trailer;

        return $this;
    }


    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Actors[]
     */
    public function getActors(): Collection
    {
        return $this->actors;
    }

    public function addActors(Actors $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors[] = $actor;
        }

        return $this;
    }

    public function removeActor(Actors $actor): self
    {
        if ($this->actors->contains($actor)) {
            $this->actors->removeElement($actor);
        }

        return $this;
    }
     /**
     * @return Collection|Genre[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genre->contains($genre)) {
            $this->genre->removeElement($genre);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addFavori($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeFavori($this);
        }

        return $this;
    }
}
