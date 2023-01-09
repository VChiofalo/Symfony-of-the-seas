<?php

namespace App\Controller\Admin;

use App\Entity\Testimonials;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class TestimonialsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonials::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Témoignage')          // Définis le nom de la table au singulier
            ->setEntityLabelInPlural('Témoignages');          // Définis le nom de la table au pluriel
    }


    // Configuration des champs pour les résultats
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),                                  // Récuperation du champ label pour ajouter/éditer le label des témoignants
            IntegerField::new('age', 'Age'),                                // Récupération du chamge age pour ajouter/éditer l'âge des témoignants
            TextField::new('content', 'Témoignage'),                        // Récuperation du champ description pour ajouter/éditer le contenue des témoignages
            TextField::new('class_css', 'Class Css (exemple : facebook)'),  // Récuperation du champ description pour ajouter/éditer le contenue des class Css
            ImageField::new('logo', 'Logo')                                 // Récuperation du champ img pour ajouter/éditer les images
                ->setUploadDir('public/assets/img/')                        // Direction d'upload des logos
                ->setBasePath('/assets/img/'),                              // Recherche la route du logo pour l'afficher dans le backoffice
        ];
    }
   
}