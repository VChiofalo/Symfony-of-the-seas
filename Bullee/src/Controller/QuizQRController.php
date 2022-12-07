<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizQRController extends AbstractController
{
    #[Route('/quiz/q/r', name: 'app_quiz_q_r')]
    public function index(): Response
    {
        return $this->render('quiz_qr/index.html.twig', [
            'controller_name' => 'QuizQRController',
        ]);
    }
}
