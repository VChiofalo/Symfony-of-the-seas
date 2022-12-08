<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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

    
    public function configureFields(string $pageName): iterable
    {
        return [
            'email',
            Field::new('password', 'mot de passe')
                ->setColumns(5)
                ->onlyOnForms()
                ->setFormType(PasswordType::class),
            ChoiceField::new('roles')
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN'
                ])
                ->renderExpanded()
                ->allowMultipleChoices()
        ];
    }
   
}
