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
        //pour vider le tableau et recommencer le test
        //$session = $requestStack->getSession();
        //$session->set('question', []);

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

        //dd($session);
        $tab = $session->get('question');
        /// create tab to store question and answers values
        if($tab == null){
            $tab = [];
        }

        //dd();
        //push new values in the array
        array_push($tab, [$request -> request->get('id_question'), $request -> request->get('id_answer')]);

        //dd($tab);
        $session->set('question', $tab);

        // allow to return to next question of id isn't 10, otherwise, go next 
        //$question = $questionsRepository -> findOneById($questions_id); 

        //if there is less than 10 questions, return to the next question
        //dd($tab);
        if(count($tab) <10){

            //to show next question if it is under 10
            $q = count($tab)+1;
        
            //to show next question if it is under 10
            return $this->redirectToRoute('app_quiz_question', [
                'questions_id' => $q
            ]);
            }
            //otherwise got to the result
            else {
                return $this->redirectToRoute('app_quiz_result', [
                    
                ]);
            }  
            
    }

     //define Route for results
     #[Route('/quizresult', name: 'app_quiz_result')]

     //unicorn because this is the "touchiest" function
     public function licorneGetResult (AnswersRepository $answersRepository,RequestStack $requestStack, Request $request): Response
     {
        // retry final tab result 
        $session = $requestStack->getSession();
        $tab = $session->get('question');
        $resultFinal=0;
        $question='';
        //dd($tab);

        //retry value per answer id

        foreach ($tab as $row) {

            $row[1];
            $result = $answersRepository -> findOneById($row[1]);
            $resultFinal += $result -> getValue();
        };
        
        //dd($resultFinal);

        //if($resultFinal > )
        
        
        
     
        //if to show relevant profile
        //push profile
     }
}