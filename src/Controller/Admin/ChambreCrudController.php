<?php

namespace App\Controller\Admin;

use App\Entity\Chambre;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChambreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chambre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            ChoiceField::new('titre')->setChoices(["Chambre Classique" => "Chambre Classique", "Chambre Confort" => "Chambre Confort", "Chambre Suite" => "Chambre Suite"])->onlyOnForms(),
            TextEditorField::new('description_courte', "Description courte")->onlyOnForms(),
            TextEditorField::new('description_longue', "Description longue")->onlyOnForms(),
            TextField::new('description_courte', "Description courte")->renderAsHtml(),
            TextField::new('description_longue', "Description longue")->renderAsHtml(),
            ImageField::new('photo')->setUploadDir('public/upload')->onlyOnForms(),
            ImageField::new('photo')->setBasePath('upload')->hideOnForm(),
            MoneyField::new('prix_journalier')->setCurrency('EUR'),
            DateTimeField::new('dateEnregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm()

        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $chambre = new $entityFqcn;
        $chambre->setDateEnregistrement(new \DateTime());
        return $chambre;
    }
    
}
