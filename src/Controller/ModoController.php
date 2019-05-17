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

class ModoController extends AbstractController
{
    
/**
 * @Route("/modo/newmovie", name="movie_add", methods={"GET"})
 */

    public function new(Request $request ,FileUploaderMovie $fileUploader): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $file = $form->get('affiche')->getData();
           
            $fileName = $fileUploader->upload($file);
         

            $movie->setAffiche($fileName);
            $user = $this->getUser();
            $movie->setUser($user);

            $entityManager->persist($movie);
            $entityManager->flush();

            return $this->redirectToRoute('movie_index');
        }

        return $this->render('modo/new_movie.html.twig', [
            'movie' => $movie,
            'form' => $form->createView(),
        ]);
    }

    
    /**
     * @Route("/{id}/edit", name="movie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Movie $movie): Response
    {
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($movie);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('movie_index', [
                'id' => $movie->getId(),
            ]);
        }

        return $this->render('movie/edit.html.twig', [
            'movie' => $movie,
            'form' => $form->createView(),
        ]);
    }


}
