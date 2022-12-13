<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
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
            ->setEntityLabelInSingular('Article')
            ->setEntityLabelInPlural('Articles')

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig'); // Ajout du formulaire Wisiwig
    }


    // Configuration des champs pour les articles
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),           // Récuperation du champ title pour ajouter/éditer le titre des articles
            TextareaField::new('contents', 'Contenue')  // Récuperation du champ contents pour ajouter/éditer le contenue des articles
                ->setFormType(CKEditorType::class)      // Appelle du formulaire Wisiwig
                ->hideOnIndex(),
            /* DateField::new('date', 'Date'),             // Récuperation du chanp date pour ajouter/éditer la date de publication des articles */
            SlugField::new('slug', 'Slug ?')            // Récuperation du chanp slug pour ajouter/éditer la date de publication des articles
                ->setTargetFieldName('title')           // Rattache le slug au titre
        ];
    }
   
}