<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Tests\Functional\Apps\CustomizationApp\Controller\Crud\Formatting;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;
use EasyCorp\Bundle\EasyAdminBundle\Tests\Functional\Apps\CustomizationApp\Entity\DemoEntity;

/**
 * CRUD controller for testing Crud::setTimezone().
 */
class TimezoneTestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DemoEntity::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setTimezone('America/New_York');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield DateTimeField::new('createdAt');
        yield DateField::new('dateField');
        yield TimeField::new('timeField');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(DateTimeFilter::new('createdAt'))
            ->add(DateTimeFilter::new('dateField'))
            ->add(DateTimeFilter::new('timeField'));
    }
}
