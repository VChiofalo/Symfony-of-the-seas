<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

#[IsGranted('ROLE_ADMIN')]
class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Article')                           // Définis le nom de la table au pluriel
            ->setEntityLabelInPlural('Articles')                            // Définis le nom de la table au pluriel

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');  // Ajout du formulaire Wisiwig
    }


    // Configuration des champs pour les articles
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),                           // Récuperation du champ title pour ajouter/éditer le titre des articles
            TextareaField::new('contents', 'Contenue')                  // Récuperation du champ contents pour ajouter/éditer le contenue des articles
                ->setFormType(CKEditorType::class)                      // Appelle du formulaire Wisiwig
                ->hideOnIndex(),
            ImageField::new('thumbnail', 'Miniature')                   // Récuperation du champ img pour ajouter/éditer les images
                ->setUploadDir('public/assets/img/agis/articles/')      // Direction d'upload des images
                ->setBasePath('/assets/img/agis/articles/')             // Recherche la route de l'image pour l'afficher dans le backoffice
                ->setFormTypeOption('required', false),                 // Retire l'option require en édition
            TextField::new('description', 'Extrait'),                   // Récuperation du champ description pour ajouter/éditer les extraits
            SlugField::new('slug', 'Slug ?')                            // Récuperation du chanp slug pour ajouter/éditer la date de publication des articles
                ->setTargetFieldName('title')                           // Rattache le slug au titre
        ];
    }
   
}