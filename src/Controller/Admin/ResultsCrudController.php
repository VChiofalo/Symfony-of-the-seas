<?php

namespace App\Controller\Admin;

use App\Entity\Results;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ResultsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Results::class;
    }


    // Configuration des champs pour les résultats
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label', 'Label'),               // Récuperation du champ label pour ajouter/éditer le label des résultats
            IntegerField::new('min', 'Minimum'),            // Récuperation du champ min pour ajouter/éditer la valeur minimum du résultats
            IntegerField::new('max', 'Maximum'),            // Récuperation du champ max pour ajouter/éditer la valeur maximum du résultats
            TextField::new('description', 'Description'),   // Récuperation du champ description pour ajouter/éditer le contenue des résultats 
            ImageField::new('img', 'Image')
                ->setUploadDir('public/assets/img/')        // Direction d'upload des images
                ->setBasePath('/assets/img/')               // Recherche la route de l'image pour l'afficher dans le backoffice
        ];
    }
   
}
