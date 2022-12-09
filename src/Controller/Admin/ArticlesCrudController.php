<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    // Configuration des champs pour les articles
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),           // Récuperation du champ title pour ajouter/éditer le titre des articles
            TextField::new('contents', 'Contenue'),     // Récuperation du champ contents pour ajouter/éditer le contenue des articles
            DateField::new('date', 'Date'),             // Récuperation du chanp date pour ajouter/éditer la date de publication des articles
            SlugField::new('slug', 'Slug ?')            // Récuperation du chanp slug pour ajouter/éditer la date de publication des articles
                ->setTargetFieldName('title')           // Rattache le slug au titre
        ];
    }
   
}
