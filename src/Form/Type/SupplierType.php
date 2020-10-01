<?php

namespace App\Form\Type;

use App\Entity\Supplier;
use App\Form\Type\SupplierTranslationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;

class SupplierType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('translations', ResourceTranslationsType::class, [
            'entry_type' => SupplierTranslationType::class,
        ])
        ->add('enabled', CheckboxType::class, [
            'required' => false,
        ])
    ;
    }

    // public function configureOptions(OptionsResolver $resolver)
    // {
    //     $resolver->setDefaults([
    //         'data_class' => Supplier::class,
    //     ]);
    // }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_supplier';
    }
}
