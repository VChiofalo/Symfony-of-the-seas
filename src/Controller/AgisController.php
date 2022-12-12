<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgisController extends AbstractController
{
    #[Route('/agis', name: 'app_agis')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        
        $articles = $articlesRepository -> findAll();

        return $this->render('agis/index.html.twig', [
            'controller_name' => 'AgisController',
            'articles' => $articles
        ]);
    }

    #[Route('/article/{slug}', name: 'app_agis_article')]
    public function articles($slug, ArticlesRepository $articlesRepository): Response
    {
        
        $article = $articlesRepository -> findOneBySlug($slug);

        return $this->render('agis/index.html.twig', [
            'article' => $article
        ]);
    }
}