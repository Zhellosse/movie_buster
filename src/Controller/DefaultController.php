<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(MovieRepository $movieRepository, UserRepository $userRepository)
    {
        return $this->render('default/accueil.html.twig', [
            'movies' => $movieRepository->findAll(),
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/termes", name="mentionleg")
     */
    public function mentionLeg()
    {
        return $this->render('default/mentionleg.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

}