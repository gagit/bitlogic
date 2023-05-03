<?php

namespace App\Form;


use App\Entity\ClientTramasica;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientTramasicaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('client',ClientType::class,[
                'label' => 'Datos Personales'
            ])

            ->add('timeOfBird',null,[
                'label' => 'Hora Nac.'
            ])
            ->add('addressOfBird',null,[
                'label' => 'Lugar de Nacimiento'
            ])
            ->add('latAddressOfBird',null,[
                'label' => 'Latitud'
            ])
            ->add('lngAddressOfBird',null,[
                'label' => 'Longitud'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClientTramasica::class,
        ]);
    }
}
