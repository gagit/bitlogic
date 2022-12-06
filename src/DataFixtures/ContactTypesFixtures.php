<?php

namespace App\DataFixtures;

use App\Entity\ContactType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class ContactTypesFixtures implements DataFixtureInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
     {
         $this->entityManager = $entityManager;
     }

    public function load() : void
    {
        $manager = $this->entityManager;
        $contactType1 = new ContactType();
        $contactType1->setId(Uuid::fromString(\App\Model\ContactType::EMAIL));
        $contactType1->setName('Email');
        $contactType1->setDescription('Email');
        $contactType1->setContactGroup('email');
        $contactType1->setEnabled(true);
        $manager->persist($contactType1);
        //-----------
        $contactType2 = new ContactType();
        $contactType2->setId(Uuid::fromString(\App\Model\ContactType::CELLPHONE));
        $contactType2->setName('Móvil');
        $contactType2->setDescription('Teléfono Celular');
        $contactType2->setContactGroup('cellphone');
        $contactType2->setEnabled(true);
        $manager->persist($contactType2);
        //-----------
        $manager->flush();
    }

    public function getGroups(): array
    {
        return ['contacts'=>'contacts'];
    }

}
