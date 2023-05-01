<?php

namespace App\Form;

use App\Entity\Categoria;
use App\Entity\Producto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nombre')
            ->add('descripcion',TextareaType::class,[
                'label'=>'Descripción',
                'required'=> false
            ])
//            ->add('valor_umed')
            ->add('marca')
            ->add('unidad_medida')
            ->add('categorias_producto',EntityType::class,[
                'label' => 'Categorías',
                'required' => false,
                'mapped' => true,
                'expanded' => false,
                'multiple' => true,
                'class' => Categoria::class,
                'attr'=>[
                    'class'=>'select2'
                ]
            ])
            ->add('codBarra')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
