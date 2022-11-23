<?php

namespace App\Form;

use App\Entity\Clientesnew;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesnewFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('apellidos',null,[
                        'required'=>false
                    ]
                )
            ->add('nombres',null,[
                        'required'=>false
                    ]
                )
//            ->add('idpais',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('idprovincia',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('idlocalidad',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('direccion',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('altura',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('codigopostal',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('sexo',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('telefono',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('celular',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('email',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('nacionalidad',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('fechanacimiento',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('tipoiva',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('nrodoc',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('tipodoc',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('habilitado',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('activo',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('idsucursalalta',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('idsucursalmodificacion',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('usuarioalta',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('fechaalta',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('fechabaja',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('usuarioultimamodificacion',null,[
//                        'required'=>false
//                    ]
//                )
//            ->add('fechaultimamodificacion',null,[
//                        'required'=>false
//                    ]
//                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
