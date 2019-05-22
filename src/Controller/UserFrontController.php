<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFrontType;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function profil() : Response
    {
        
        return $this->render('user_front/profil.html.twig', [
                        
        ]);
    }

    /**
     * @Route("/edit", name="user_editprofil", methods={"GET","POST"})
     */
    public function edit(Request $request, UserPasswordEncoderInterface $passwordEncoder, UserRepository $user, FileUploader $fileUploader): Response
    {
        $user =$this->getUser();
        $form = $this->createForm(UserFrontType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user->setPassword(     
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
                
            );
          
            $file = $user->getAvatar();
            $fileName = $fileUploader->upload($file);

            $user->setAvatar($fileName);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_profil');
        }

        return $this->render('user_front/editprofil.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


}
