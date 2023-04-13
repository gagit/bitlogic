<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientTramasicaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                        'required'=>false
                    ]
                )
            ->add('lastName',null,[
                        'required'=>false
                    ]
                )
            ->add('address',null,[
                        'required'=>false
                    ]
                )
            ->add('dateCreation',null,[
                        'required'=>false
                    ]
                )
            ->add('enabled',null,[
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
