<?php

namespace App\Form;

use App\Entity\Clientesnew;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesnewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('apellidos')
            ->add('nombres')
            ->add('idpais')
            ->add('idprovincia')
            ->add('idlocalidad')
            ->add('direccion')
            ->add('altura')
            ->add('codigopostal')
            ->add('sexo')
            ->add('telefono')
            ->add('celular')
            ->add('email')
            ->add('nacionalidad')
            ->add('fechanacimiento')
            ->add('tipoiva')
            ->add('nrodoc')
            ->add('tipodoc')
            ->add('habilitado')
            ->add('activo')
            ->add('idsucursalalta')
            ->add('idsucursalmodificacion')
            ->add('usuarioalta')
            ->add('fechaalta')
            ->add('fechabaja')
            ->add('usuarioultimamodificacion')
            ->add('fechaultimamodificacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clientesnew::class,
        ]);
    }
}
