<?php

namespace App\Form;

use App\Entity\IdentificationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentificationTypeFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                        'required'=>false
                    ]
                )
            ->add('description',null,[
                        'required'=>false
                    ]
                )
            ->add('enabled',null,[
                        'required'=>false
                    ]
                )
            ->add('typeIdentification',null,[
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
