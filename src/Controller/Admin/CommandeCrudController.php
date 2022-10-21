<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('chambre'),
            DateField::new('date_arrivee', "Date d'arrivée")->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            DateField::new('date_depart', "Date de départ")->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('email'),
            TelephoneField::new('telephone'),
            MoneyField::new('prix total')->setCurrency('EUR')->hideOnForm()


        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $Commande = new $entityFqcn;
        $Commande->setDateEnregistrement(new \DateTime());
        return $Commande;
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }

}
