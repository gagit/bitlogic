<?php

namespace App\Form;

use App\Entity\IdentificationClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentificationClientFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('identification',null,[
                        'required'=>false
                    ]
                )
            ->add('identificationType',null,[
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
