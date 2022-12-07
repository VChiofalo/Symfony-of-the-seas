<?php

namespace App\Controller;

use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(): Response
    {
        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizQRController',
        ]);
    }

    #[Route('/quiz/situation/{id}', name: 'app_quiz_situation')]
    public function situation($id, QuestionsRepository $questionsRepository): Response
    {
        $question = $questionsRepository->findOneById($id);
        /* dd($question); */

        return $this->render('quiz/situation.html.twig', [
            'controller_name' => 'QuizQRController',
            'question' => $question
        ]);
    }


}
