<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Slider;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SliderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slider::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo')->setUploadDir('public/upload')->onlyOnForms(),
            ImageField::new('photo')->setBasePath('upload')->hideOnForm(),
            NumberField::new('ordre'),
            DateTimeField::new('dateEnregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $slider = new $entityFqcn;
        $slider->setDateEnregistrement(new \DateTime());
        return $slider;
    }
    
}
