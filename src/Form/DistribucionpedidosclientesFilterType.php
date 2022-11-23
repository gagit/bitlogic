<?php

namespace App\Form;

use App\Entity\Distribucionpedidosclientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DistribucionpedidosclientesFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre',null,[
                        'required'=>false
                    ]
                )
            ->add('apellido',null,[
                        'required'=>false
                    ]
                )
            ->add('direccion1',null,[
                        'required'=>false
                    ]
                )
            ->add('direccion2',null,[
                        'required'=>false
                    ]
                )
            ->add('ciudad',null,[
                        'required'=>false
                    ]
                )
            ->add('region',null,[
                        'required'=>false
                    ]
                )
            ->add('cp',null,[
                        'required'=>false
                    ]
                )
            ->add('telefono',null,[
                        'required'=>false
                    ]
                )
            ->add('nrocuenta',null,[
                        'required'=>false
                    ]
                )
            ->add('tipocuenta',null,[
                        'required'=>false
                    ]
                )
            ->add('razonsocial',null,[
                        'required'=>false
                    ]
                )
            ->add('nrodocumento',null,[
                        'required'=>false
                    ]
                )
            ->add('email',null,[
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
