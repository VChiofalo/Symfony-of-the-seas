<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgisController extends AbstractController
{
    //display ateliers by id 
    #[Route('/agis', name: 'app_agis')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        // Récupère les articles depuis la Db
        $articles = $articlesRepository -> findAll();

        return $this->render('agis/index.html.twig', [
            'controller_name' => 'AgisController',
            'articles' => $articles
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
}
