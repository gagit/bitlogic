<?php

namespace App\Form;

use App\Entity\Distribucionpedidosclientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DistribucionpedidosclientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('direccion1')
            ->add('direccion2')
            ->add('ciudad')
            ->add('region')
            ->add('cp')
            ->add('telefono')
            ->add('nrocuenta')
            ->add('tipocuenta')
            ->add('razonsocial')
            ->add('nrodocumento')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Distribucionpedidosclientes::class,
        ]);
    }
}
