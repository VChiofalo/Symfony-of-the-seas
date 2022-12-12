<?php

namespace App\Controller\Admin;

use App\Entity\Questions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class QuestionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Questions::class;
    }

    // Configuration des champs pour les Questions
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Label', 'Questions'),       // Récuperation du champ label pour ajouter/éditer les questions
            ImageField::new('img', 'Image')             // Récuperation du champ img pour ajouter/éditer les images
                ->setUploadDir('public/assets/img/')    // Direction d'upload des images
                ->setBasePath('/assets/img/')           // Recherche la route de l'image pour l'afficher dans le backoffice
        ];
    }
}