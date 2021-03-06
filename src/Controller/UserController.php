<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use JasonGrimes\Paginator;


/**
 * @Route("/admin/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="admin_index", methods={"GET"})
     */
    public function index(UserRepository $users): Response
    {   
        //Pagination (ne fonctionne pas)
        
        $repository = $this->getDoctrine()->getManager()->getRepository(User::class);

        //$repository->count() 
        $totalItems = 4 ;
        $itemsPerPage = 2;
        $currentPage =  1;
        $urlPattern = "?page=(:num)";

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        return $this->render('user/index.html.twig', [
            'users' => $users->findAll(),
            'paginator' => $paginator,
        ]);
    }
   

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder, FileUploader $fileUploader): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $user->setPassword(     
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
                
            );
            // ajout de l'input pour l'image
            // $file = $user->getAvatar();

            // $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // // Move the file to the directory where images are stored
            // try {
            //     $file->move(
            //         $this->getParameter('avatars_directory'),
            //         $fileName
            //     );
            // } catch (FileException $e) {
            //     // ... handle exception if something happens during file upload
            // }

            // // updates the 'image' property to store the image file name
            // // instead of its contents
            // $user->setAvatar($fileName);

            $file = $user->getAvatar();
            $fileName = $fileUploader->upload($file);

            $user->setAvatar($fileName);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserPasswordEncoderInterface $passwordEncoder, User $user, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(UserType::class, $user);
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

            return $this->redirectToRoute('user_index', [
                'id' => $user->getId(),
            ]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }


    
}
