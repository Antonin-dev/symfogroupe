<?php

namespace App\Controller\Admin;

use App\Entity\Attraction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AttractionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attraction::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('soustitre'),
            TextareaField::new('description'),
            ImageField::new('image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            SlugField::new('slug')
                ->setTargetFieldName('nom')
    
        ];
    }
    
}
