<?php

namespace App\Controller\Admin;

use App\Entity\Workshops;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class WorkshopsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workshops::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Atelier')                           // Définis le nom de la table au singulier
            ->setEntityLabelInPlural('Ateliers')                            // Définis le nom de la table au pluriel

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');  // Ajout du formulaire Wisiwig
    }


    // Configuration des champs pour les articles
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),                           // Récuperation du champ title pour ajouter/éditer le titre des ateliers
            TextareaField::new('contents', 'Contenue')                  // Récuperation du champ contents pour ajouter/éditer le contenue des ateliers
                ->setFormType(CKEditorType::class)                      // Appelle du formulaire Wisiwig
                ->hideOnIndex(),
            ImageField::new('thumbnail', 'Miniature')                   // Récuperation du champ img pour ajouter/éditer les images
                ->setUploadDir('public/assets/img/agis/ateliers/')      // Direction d'upload des images
                ->setBasePath('/assets/img/agis/ateliers/')             // Recherche la route de l'image pour l'afficher dans le backoffice
                ->setFormTypeOption('required', false),                 // Retire l'option require en édition
            TextField::new('description', 'Extrait'),                   // Récuperation du champ description pour ajouter/éditer les extraits
            SlugField::new('slug', 'Slug ?')                            // Récuperation du chanp slug pour ajouter/éditer la date de publication des ateliers
                ->setTargetFieldName('title'),                          // Rattache le slug au titre
            TextField::new('url', 'Url (optionnel)'),                   // Récuperation du champ url pour ajouter/éditer l'url des ateliers

        ];
    }
   
}