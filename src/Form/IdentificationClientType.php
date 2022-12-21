<?php

namespace App\Form;

use App\Entity\IdentificationClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentificationClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('identificationType',null,[
                'label'=> 'Tipo'
            ])
            ->add('identification',null,[
                'label'=> 'Valor'
            ])
            ->add('client',HiddenType::class,[
                'property_path' => 'client.id',
                'attr'=>[
                    'class'=>'hidden'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IdentificationClient::class,
        ]);
    }
}
