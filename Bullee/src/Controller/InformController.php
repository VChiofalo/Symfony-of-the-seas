<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformController extends AbstractController
{
    #[Route('/inform', name: 'app_inform')]
    public function index(): Response
    {
        return $this->render('inform/index.html.twig', [
            'controller_name' => 'InformController',
        ]);
    }
}
