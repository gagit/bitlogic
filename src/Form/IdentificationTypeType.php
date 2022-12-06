<?php

namespace App\Form;

use App\Entity\IdentificationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentificationTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                'label' => 'Nombre'
            ])
            ->add('description',null,[
                'label' => 'Descripcion'
            ])
            ->add('enabled',null,[
                'label' => 'Activo'
            ])
            ->add('typeIdentification',null,[
                'label' => 'Grupo'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IdentificationType::class,
        ]);
    }
}
