<?php

namespace App\Controller;

use App\Entity\Actors;
use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use App\Service\FileUploaderMovie;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieFrontController extends AbstractController
{
     /**
     * @Route("/movie/show/{id}", name="movie_show_front", methods={"GET"})
     */
    public function showFront(Movie $movie): Response
    {
        
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
           
        ]);
    }
}