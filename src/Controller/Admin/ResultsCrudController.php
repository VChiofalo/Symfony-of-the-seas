<?php

namespace App\Controller\Admin;

use App\Entity\Results;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ResultsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Results::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Résultat')          // Définis le nom de la table au singulier
            ->setEntityLabelInPlural('Résultats');          // Définis le nom de la table au pluriel
    }


    // Configuration des champs pour les résultats
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label', 'Label'),                   // Récuperation du champ label pour ajouter/éditer le label des résultats
            IntegerField::new('min', 'Minimum'),                // Récuperation du champ min pour ajouter/éditer la valeur minimum du résultats
            IntegerField::new('max', 'Maximum'),                // Récuperation du champ max pour ajouter/éditer la valeur maximum du résultats
            TextareaField::new('description', 'Descriptions'),  // Récuperation du champ description pour ajouter/éditer le contenue des résultats 
            ImageField::new('img', 'images')
                ->setUploadDir('public/assets/img/')            // Direction d'upload des images
        ];
    }
   
}
