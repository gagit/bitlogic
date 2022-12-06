<?php

namespace App\Service;

use App\Entity\Client;
use App\Entity\Clientesnew;
use App\Entity\ContactClient;
use App\Entity\ContactType;
use App\Entity\IdentificationClient;
use App\Entity\IdentificationType;
use Doctrine\ORM\EntityManagerInterface;

class ClientHelper
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function convertClientenewToClient(Clientesnew $clientesnew) : Client
    {
        $client = new Client();

        $client->setName($clientesnew->getNombres()) ;
        $client->setLastName($clientesnew->getApellidos()) ;
        $client->setDateCreation($clientesnew->getFechanacimiento()) ;
        $client->setEnabled(true) ;
        //---
        $emailClient = new ContactClient();
        $emailClient->setValue($clientesnew->getEmail());
        $emailClient->setContactType($this->entityManager->getRepository(ContactType::class)
                                                        ->find(\App\Model\ContactType::EMAIL));
        $client->addContact($emailClient);

        $cellphoneClient = new ContactClient();
        $cellphoneClient->setValue($clientesnew->getCelular());
        $cellphoneClient->setContactType($this->entityManager->getRepository(ContactType::class)
                                                        ->find(\App\Model\ContactType::CELLPHONE));
        $client->addContact($cellphoneClient);
        //------
        $idClientesnew = new IdentificationClient();
        $idClientesnew->setIdentificationType($this->entityManager->getRepository(IdentificationType::class)
                                                            ->find(\App\Model\IdentificationType::ID_CLIENTESNEW));
        $idClientesnew->setIdentification($clientesnew->getId());
        $client->addIdentification($idClientesnew);

        $dniClientesnew = new IdentificationClient();
        $dniClientesnew->setIdentificationType($this->entityManager->getRepository(IdentificationType::class)
                                                            ->find(\App\Model\IdentificationType::DNI));
        $dniClientesnew->setIdentification($clientesnew->getNrodoc());
        $client->addIdentification($dniClientesnew);


        $this->entityManager->persist($client);
        $this->entityManager->flush();

        return $client;

    }

}