<?php

namespace App\Form;

use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('codBarra',null,[
                        'required'=>false
                    ]
                )
            ->add('nombre',null,[
                        'required'=>false
                    ]
                )
            ->add('descripcion',null,[
                        'required'=>false
                    ]
                )
            ->add('valor_umed',null,[
                        'required'=>false
                    ]
                )
            ->add('marca',null,[
                        'required'=>false
                    ]
                )
            ->add('unidad_medida',null,[
                        'required'=>false
                    ]
                )
            ->add('categorias_producto',null,[
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
