<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

#[IsGranted('ROLE_ADMIN')]
class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs');
    }

    // Configuration des champs de gestion des Utilisateurs/Admins
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email', 'Mail'),           // Récuperation du champ email pour ajouter/éditer les adresses mails
            Field::new('password', 'Mot de passe')      // Récuperation du champ password pour ajouter/éditer les mots de passes
                ->setColumns(5)                         // Configuration de la taille du champ
                ->onlyOnForms()                         // Cache le champs en dehors de l'ajout/l'édition
                ->setFormType(PasswordType::class),     // Défini le type de champ en tant que champ de mot de passe
            ChoiceField::new('roles', 'Role')           // Récuperation du champ roles pour ajouter/éditer le role Admin
                ->setChoices([                          // Défini le role disponible
                    'Administrateur' => 'ROLE_ADMIN' 
                ])
                ->renderExpanded()                      // Affiche les choix possible (ici un seul)
                ->allowMultipleChoices()           // Rend possible ou non la possibilité de choisir plusieur role (ici non)
        ];
    }
}
