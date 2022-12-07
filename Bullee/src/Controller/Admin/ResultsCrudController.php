<?php

namespace App\Controller\Admin;

use App\Entity\Results;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ResultsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Results::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
