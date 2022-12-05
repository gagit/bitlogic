<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                'label' => 'Nombre'
            ])
            ->add('lastName',null,[
                'label' => 'Apellido'
            ])
            ->add('address',null,[
                'label' => 'Domicilio'
            ])
            ->add('dateCreation',null,[
                'label' => 'Fecha Nac.'
            ])
            ->add('enabled',null,[
                'label' => 'Activo'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
