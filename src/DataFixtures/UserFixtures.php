<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures implements DataFixtureInterface
{
    private $passwordEncoder;
    private $entityManager;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder,
                                EntityManagerInterface $entityManager
                                )
     {
         $this->passwordEncoder = $passwordEncoder;
         $this->entityManager = $entityManager;
     }
    public function load() : void
    {
        $manager = $this->entityManager;
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $rol=['ROLE_USER','ROLE_ADMIN'];
        $user->setRoles($rol);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456Adm'
            ));
        $user->setEnabled(true);
        $manager->persist($user);
        //-----------
        $userPropPlaya = new User();
        $userPropPlaya->setEmail('propieatario@gmail.com');
        $rolPropPlaya=['ROLE_USER','ROLE_PROPIETARIO'];
        $userPropPlaya->setRoles($rolPropPlaya);
        $userPropPlaya->setPassword($this->passwordEncoder->encodePassword(
            $userPropPlaya,
            '123456Prop'
        ));
        $userPropPlaya->setEnabled(true);
        $manager->persist($userPropPlaya);
        //----------
        $userEncargado = new User();
        $userEncargado->setEmail('profesional@gmail.com');
        $rolUserEncargado=['ROLE_USER','ROLE_PROFESIONAL'];
        $userEncargado->setRoles($rolUserEncargado);
        $userEncargado->setPassword($this->passwordEncoder->encodePassword(
            $userEncargado,
            '123456Prof'
        ));
        $userEncargado->setEnabled(true);
        $manager->persist($userEncargado);
        //----------
        $userTrabajador = new User();
        $userTrabajador->setEmail('adminBarrio@gmail.com');
        $rolUserTrabajador=['ROLE_USER','ROLE_ADMIN_BARRIO'];
        $userTrabajador->setRoles($rolUserTrabajador);
        $userTrabajador->setPassword($this->passwordEncoder->encodePassword(
            $userTrabajador,
            '123456ABarrio'
        ));
        $userTrabajador->setEnabled(true);
        $manager->persist($userTrabajador);
        //-----------
        $manager->flush();
    }
    public function getGroups(): array
    {
        return ['users'=>'users'];
    }
}
