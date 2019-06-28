<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\UserRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class FavorisController extends AbstractController
{
    /**
     * @Route("user/profil/{id}/favoris", name="add_favoris_movie", methods={"GET"})
     */
    public function favoris($id, Movie $movie): Response
    {           
        //dd($id);
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        // die('BLOQUE');
        $user->addFavori($movie);        

        $entityManager->persist($user);
        $entityManager->flush();

        //dd('truc');
        // redirection 
        return $this->redirectToRoute('user_profil');

        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
            'user' => $user,
        ]);
    }

}