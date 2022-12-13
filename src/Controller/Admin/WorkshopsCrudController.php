<?php

namespace App\Controller\Admin;

use App\Entity\Workshops;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WorkshopsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workshops::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Atelier')
            ->setEntityLabelInPlural('Ateliers')

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig'); // Ajout du formulaire Wisiwig
    }


    // Configuration des champs pour les articles
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),           // Récuperation du champ title pour ajouter/éditer le titre des ateliers
            TextareaField::new('contents', 'Contenue')  // Récuperation du champ contents pour ajouter/éditer le contenue des ateliers
                ->setFormType(CKEditorType::class)      // Appelle du formulaire Wisiwig
                ->hideOnIndex(),
            DateField::new('date', 'Date'),             // Récuperation du chanp date pour ajouter/éditer la date de publication des ateliers
            SlugField::new('slug', 'Slug ?')            // Récuperation du chanp slug pour ajouter/éditer la date de publication des ateliers
                ->setTargetFieldName('title')           // Rattache le slug au titre
        ];
    }
   
}