<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/termes", name="mentionsleg")
     */
    public function mentionLeg()
    {
        return $this->render('default/mentionleg.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
