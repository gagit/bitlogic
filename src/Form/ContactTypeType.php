<?php

namespace App\Form;

use App\Entity\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                'label' => 'Nombre'
            ])
            ->add('description',null,[
                'label' => 'Descripción'
            ])
            ->add('contactGroup',null,[
                'label' => 'Grupo'
            ])
//            ->add('fontAwesomeIcon',null,[
//                'label' => 'Nombre'
//            ])
            ->add('enabled',null,[
                'label' => 'Activo'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactType::class,
        ]);
    }
}
