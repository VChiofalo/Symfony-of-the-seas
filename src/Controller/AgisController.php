<?php

namespace App\Controller;

use App\Repository\WorkshopsRepository;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgisController extends AbstractController
{

    //ARTICLES and WORKSHOP

    //display ateliers by id 
    #[Route('/agis', name: 'app_agis')]
    public function index(ArticlesRepository $articlesRepository, WorkshopsRepository $workshopsRepository): Response
    {
        // Récupère les articles depuis la Db
        $articles = $articlesRepository -> findAll();
        
        // get all workshop by id from
        $workshops = $workshopsRepository -> findAll();

        return $this->render('agis/index.html.twig', [
            'controller_name' => 'AgisController',
            'articles' => $articles,
            'workshops' => $workshops
        ]);
    }

    #[Route('/article/{slug}', name: 'app_article')]
    public function articles($slug, ArticlesRepository $articlesRepository): Response
    {
        // Récupère les articles un par un depuis la db via son slug
        $article = $articlesRepository -> findOneBySlug($slug);

        return $this->render('agis/articles.html.twig', [
            'article' => $article
        ]);
    }

    #[Route('/workshop/{slug}', name: 'app_workshop')]
    public function getOneWorkshop($slug, WorkshopsRepository $workshopsRepository): Response
    {
        // get workshop by its slug
        $workshop = $workshopsRepository -> findOneBySlug($slug);
        //send it to a new twig to dispaly the workshop's details
        return $this->render('agis/workshop.html.twig', [
            'workshop' => $workshop
        ]);
    }
}
