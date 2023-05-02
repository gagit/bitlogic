<?php

namespace App\Form;

use App\Entity\Sucursal;
use App\Entity\User;
use App\EntityHelpers\EmpresaHelper;
use App\Model\Roles;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class,[])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'first_name'  => 'password1',
                'second_name' => 'password2',
                'type'        => PasswordType::class,
                'options'=>[
                  'trim'=>true
                ],
                'first_options'  => ['label' => 'Password'],
                'second_options'  => ['label' => 'Confirme Password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])

            ->add('roles',ChoiceType::class,[
                'mapped' => true,
                'required' => true,
                'expanded' => false,
                'multiple' => true,
                'choices'=>[
                    'ADMIN'=>'ROLE_ADMIN',
//                    'DATAENTRY'=>'DATAENTRY',
//                    'MAYORISTA'=>'MAYORISTA',
//                    'CLIENTE'=>'CLIENTE',
                ]
            ]);
//            ->add('nombre',TextType::class,[
//                'label' => 'Nombre',
//                'required' => false
//            ])
//            ->add('apellido',TextType::class,[
//                'label' => 'Apellido',
//                'required' => false
//            ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
    }

    function onPreSetData(FormEvent $event) {
        $form = $event->getForm();
        $this->addElements($form);
    }

    protected function addElements($form)
    {

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
