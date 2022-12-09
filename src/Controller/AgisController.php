<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgisController extends AbstractController
{
    //display ateliers by id 
    #[Route('/agis', name: 'app_agis')]
    public function index(): Response
    {
        return $this->render('agis/index.html.twig', [
            'controller_name' => 'AgisController',
        ]);
    }

    //display articles by id
}
