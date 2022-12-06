<?php

namespace App\DataFixtures;

use App\Entity\Estado;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class EstadoFixtures implements DataFixtureInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
     {
         $this->entityManager = $entityManager;
     }

    public function load() : void
    {
        $manager = $this->entityManager;
        $estado1 = new Estado();
        $estado1->setId(Uuid::fromString(\App\Model\Estado::APROBADO));
        $estado1->setNombre('Aprobado');
        $estado1->setDescription('Aprobado');
        $manager->persist($estado1);
        //-----------
        $estado2 = new Estado();
        $estado2->setId(Uuid::fromString(\App\Model\Estado::OBSERVADO));
        $estado2->setNombre('Observado');
        $estado2->setDescription('Observado');
        $manager->persist($estado2);
        //-----------
        $manager->flush();
    }

    public function getGroups(): array
    {
        return ['estados'=>'estados'];
    }

}
