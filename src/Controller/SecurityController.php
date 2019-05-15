<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\User;

/**
     * @Route("/login")
     */
class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        return $this->redirectToRoute('homepage');
    }
    
    /**
     * @Route("/forgottenpassword", name="app_forgotten_password", methods={"GET","POST"})
     */
    public function forgottenPassword(Request $request, \Swift_Mailer $mailer, TokenGeneratorInterface $tokenGenerator)
    {
        if($request->ismethod('POST')){
            $email = $request->request->get('email');
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::Class)->findOneByEmail($email);
            if($user === null){
                $this->addflash('danger','Email Inconnu');
                return $this->redirectToRoute('homepage');
            }
            $token = $tokenGenerator->generateToken();
            $user->setToken($token);
            $entityManager->flush();

            //url
            $url = $this->generateUrl(
                'app_reset_password',
                array('token' => $token,'email'=> $email),
                UrlGeneratorInterface::ABSOLUTE_URL
            );
            // envoie message
            $message = (new \Swift_Message())
                ->setSubject('Forget Password')
                ->setFrom('moviebuster@hotmail.fr')
                ->setTo($user->getEmail())
                ->setBody(
                    "blablabla voici le lien pour reseter votre mot de passe : <a href='" . $url."'>Cliquez ici</a>",
                    'text/html'
                );
            $mailer->send($message);

            //message flash
            $this->addFlash('success','Veuillez verifier votre messagerie, un email vous a été envoyé');
            //redirection
            //return $this->redirectToRoute('homepage');
           
        }
        return $this->render('security/forgotten_password.html.twig');
    }

     /**
     * @Route("/reset_password/{token}/{email}", name="app_reset_password", methods={"GET","POST"})
     */
    public function reset_password(Request $request,$token,$email,UserPasswordEncoderInterface $passwordEncoder)
    {
        
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::Class)->findOneByEmail($email);
      
            //if user is null
        if ($user === null)
        {
            // empecher utilisateur d'aller sur la page
            $this->addflash('danger','Email inconnu');
            return $this->redirectToRoute('home');
        }

        if ($user->getToken() != $token)
        {
            $this->addflash('danger','Erreur');
            return $this->redirectToRoute('home');
        }
        //request=> user {$email,$token}
        if ($request->isMethod('POST')) {
            $password1 = $request->request->get('password');
            $password2 = $request->request->get('password2');
            if(!empty($password1) && !empty($password2)){
                if($password1 == $password2){
                    $user->setPassword($passwordEncoder->encodePassword($user,$password1));
                    $user->setToken('');
                    $entityManager->flush();

                    return $this->redirectToRoute('app_login');
                }else
                {
                    die('stop1');
                }
            } else
            {
                die ('stop2');
            }
            
           
        }

        return $this->render('security/reset_password.html.twig');

    }
}
