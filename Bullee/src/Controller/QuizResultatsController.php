<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizResultatsController extends AbstractController
{
    #[Route('/quiz/resultats', name: 'app_quiz_resultats')]
    public function index(): Response
    {
        return $this->render('quiz_resultats/index.html.twig', [
            'controller_name' => 'QuizResultatsController',
        ]);
    }
}
