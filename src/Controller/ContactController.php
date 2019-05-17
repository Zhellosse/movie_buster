<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
      
        //////////Creation du formulaire de contact\\\\\\\\\\
        $form = $this->createFormBuilder($contact)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('content', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => 'Envoyer'])
            ->getForm();
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
               
            $html ="Message de : ".$contact->getName()."\n";
            $html .="Adresse mail : ".$contact->getEmail()."\n";
            $html .= "Message : ".$contact->getContent();

            $message = (new \Swift_Message('Bonjour'))
                ->setFrom('dede@example.com')
                ->setTo('recipient@example.com')
                ->setBody($html);
        
            $mailer->send($message);
           // $contact = $form->getData();
        
        
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView()
        ]);  

    }
   
}