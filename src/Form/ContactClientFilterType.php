<?php

namespace App\Form;

use App\Entity\ContactClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactClientFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('value',null,[
                        'required'=>false
                    ]
                )
            ->add('contactType',null,[
                        'required'=>false
                    ]
                )
            ->add('client',null,[
                        'required'=>false
                    ]
                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
