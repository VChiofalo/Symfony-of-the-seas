<?php

namespace App\Controller\Admin;

use App\Entity\Answers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Validator\Constraints\Choice;

#[IsGranted('ROLE_ADMIN')]
class AnswersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Answers::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Réponse')               // Définis le nom de la table au singulier
            ->setEntityLabelInPlural('Réponses');               // Définis le nom de la table au pluriel
    }

    // Configuration des champs pour les réponses
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label', 'Réponse'),                 // Récuperation du champ label pour ajouter/éditer les réponses
            ChoiceField::new('value', 'Valeur')                 // Récuperation du champ value pour ajouter/éditer la valeur de la réponse
            ->setChoices([                                      // Défini les valeurs de réponse disponible
                '0' => '0',
                '1' => '1',
                '2' => '2'
            ])
            ->renderExpanded()                                  // Affiche les choix possible
            ->allowMultipleChoices(false),                      // Rend possible ou non la possibilité de choisir plusieur role (ici non)
            AssociationField::new('questions', 'Questions')     // Récuperation du champ questions pour ajouter/éditer l'association des réponses à sa question

        ];
    }
   
}
