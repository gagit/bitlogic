<?php

namespace App\Form;

use App\Entity\ContactClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contactType',null,[
                'label'=> 'Tipo Contacto'
            ])
            ->add('value',null,[
                'label'=> 'Valor'
            ])
            ->add('client',HiddenType::class,[
                    'property_path' => 'client.id',
                    'attr'=>[
                        'class'=>'hidden'
                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactClient::class,
        ]);
    }
}
