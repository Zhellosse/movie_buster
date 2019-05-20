<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFrontType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserFrontController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/profil", name="user_profil")
     */
    public function profil(UserRepository $users) : Response
    {
        $users =$this->getUser();
        return $this->render('user_front/profil.html.twig', [
            'users'=> $users,            
        ]);
    }

    /**
     * @Route("/edit", name="user_editprofil", methods={"GET","POST"})
     */
    public function edit(Request $request, UserRepository $user): Response
    {
        $user =$this->getUser();
        $form = $this->createForm(UserFrontType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            // return $this->redirectToRoute('user_index', [
            //     'id' => $user->getId(),
            // ]);
        }

        return $this->render('user_front/editprofil.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


}
