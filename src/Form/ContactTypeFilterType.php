<?php

namespace App\Form;

use App\Entity\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactTypeFilterType extends AbstractType
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
            ->add('contactGroup',null,[
                        'required'=>false
                    ]
                )
            ->add('fontAwesomeIcon',null,[
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
