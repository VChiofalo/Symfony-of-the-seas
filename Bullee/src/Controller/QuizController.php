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

   
       return $this->render('quiz/index.html.twig', [
            'question' => $question
        ]);

    }

    //define Route for saving answers
    #[Route('/quizsave', name: 'app_quiz_save')]

    //iniate storage in session
    public function saveQuestion(RequestStack $requestStack, Request $request): Response
    {
        //retry the result of the previous page
        $session = $requestStack->getSession();

        dd($session);
        $tab = $session->get('question');
        /// create tab to store question and answers values
        if($tab == null){
            $tab = [];
        }
        //push new values in the array
        array_push($tab, [$request['id_question'], $request['id_answer']]);

        dd($tab);
        $session->set('question', $tab);

        // allow to return to next question of id isn't 10, otherwise, go next 
        $question = $questionsRepository -> findOneById($questions_id); 

        //if there is less than 10 questions, return to the next question

        if(count($tab <10)){
            $this->redirect('quiz/save', [
                'question' => (($questions_id)+1)
            ]);
            }
            //otherwise got to the result
            else {
                $this->redirect('quiz/result');
            }  

    }

     //define Route for results
     #[Route('/quizresult', name: 'app_quiz_result')]

     //unicorn because this is the "touchiest" function
     public function licorneGetResult (RequestStack $requestStack, Request $request): Response
     {
    
    // retry tab result
    //proceed to calculation
    //if to show relevant profile
    //push profile
     }
}

