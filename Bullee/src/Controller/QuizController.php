<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Entity\Answers;
use App\Repository\QuestionsRepository;
use App\Repository\AnswersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class QuizController extends AbstractController
{
    #[Route('/quiz/{questions_id}', name: 'app_quiz_question')]
    public function question($questions_id, QuestionsRepository $questionsRepository ): Response
    {
        // get answers by question ID
       $question = $questionsRepository -> findOneById($questions_id);
       return $this->render('quiz/index.html.twig', [
        'question' => $question
    ]);


    }
    
}




