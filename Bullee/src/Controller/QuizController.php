<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Entity\Answers;
use App\Repository\QuestionsRepository;
use App\Repository\AnswersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    //define Route
    #[Route('/quiz/{questions_id}', name: 'app_quiz_question')]
    public function question($questions_id, QuestionsRepository $questionsRepository , RequestStack $requestStack): Response
    {
        // get answers by question ID
       $question = $questionsRepository -> findOneById($questions_id);

       //initiate the session for each question 
       return $this->render('quiz/index.html.twig', [
            'question' => $question
        ]);

    }
}
