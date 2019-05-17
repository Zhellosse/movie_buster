<?php

namespace App\Controller;
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
    public function index(MovieRepository $movieRepository)
    {
        return $this->render('default/accueil.html.twig', [
            'movies' => $movieRepository->findAll(),
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