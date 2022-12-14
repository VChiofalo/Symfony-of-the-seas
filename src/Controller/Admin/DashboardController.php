<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use App\Entity\User;
use App\Entity\Answers;
use App\Entity\Questions;
use App\Entity\Results;
use App\Entity\Workshops;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ArticlesCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bullee');                                                               // Définis le titre du backoffice
    }

    // Section du back-office
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');                             // Affichage du Dashboard
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);                 // Backoffice de la table utilisateurs
        yield MenuItem::linkToCrud('Articles', 'fas fa-newspaper', Articles::class);            // Backoffice de la table articles
        yield MenuItem::linkToCrud('Questions', 'fas fa-circle-question', Questions::class);    // Backoffice de la table questions
        yield MenuItem::linkToCrud('Réponses', 'fas fa-file-circle-question', Answers::class);  // Backoffice de la table réponses
        yield MenuItem::linkToCrud('Résultats', 'fas fa-circle-check', Results::class);         // Backoffice de la table résultats
        yield MenuItem::linkToCrud('Ateliers', 'fas fa-handshake', Workshops::class);           // Backoffice de la table ateliers
    }
}