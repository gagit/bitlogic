<?php

namespace App\Service;

use App\Entity\Client;
use App\Entity\Clientesnew;
use App\Entity\ContactClient;
use App\Entity\ContactType;
use App\Entity\Distribucionpedidosclientes;
use App\Entity\IdentificationClient;
use App\Entity\IdentificationType;
use App\Entity\Vtmclh;
use App\Model\ClientesDikterInterface;
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
        $client=$this->entityManager->getRepository(Client::class)->getClientByIdEntity($clientesnew);
        if(is_null($client)){
            $client = new Client();

            $client->setName($clientesnew->getNombres()) ;
            $client->setLastName($clientesnew->getApellidos()) ;
            $client->setDateCreation($clientesnew->getFechanacimiento()) ;
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
        }
        return $client;
    }

    public function convertDistribucionpedidosclientesToClient(Distribucionpedidosclientes $distribucionpedidosclientes): Client
    {
        $client = $this->entityManager->getRepository(Client::class)->getClientByIdEntity($distribucionpedidosclientes);
        if (is_null($client)) {
            die("nada!!!");
            $client = new Client();

            $client->setName($distribucionpedidosclientes->getNombre());
            $client->setLastName($distribucionpedidosclientes->getApellido());
//        $client->setDateCreation($distribucionpedidosclientes->get()) ;
            $client->setEnabled(true);
            //---
            $emailClient = new ContactClient();
            $emailClient->setValue($distribucionpedidosclientes->getEmail());
            $emailClient->setContactType($this->entityManager->getRepository(ContactType::class)
                ->find(\App\Model\ContactType::EMAIL));
            $client->addContact($emailClient);

            $cellphoneClient = new ContactClient();
            $cellphoneClient->setValue($distribucionpedidosclientes->getTelefono());
            $cellphoneClient->setContactType($this->entityManager->getRepository(ContactType::class)
                ->find(\App\Model\ContactType::CELLPHONE));
            $client->addContact($cellphoneClient);
            //------
            $idClientesnew = new IdentificationClient();
            $idClientesnew->setIdentificationType($this->entityManager->getRepository(IdentificationType::class)
                ->find(\App\Model\IdentificationType::ID_CLIENTESNEW));
            $idClientesnew->setIdentification($distribucionpedidosclientes->getId());
            $client->addIdentification($idClientesnew);

            $dniClientesnew = new IdentificationClient();
            $dniClientesnew->setIdentificationType(
                $this->entityManager->
                getRepository(IdentificationType::class)
                    ->find(\App\Model\IdentificationType::DNI));
            $dniClientesnew->setIdentification(
                $distribucionpedidosclientes->getNrodoc());
            $client->addIdentification($dniClientesnew);


            $this->entityManager->persist($client);
            $this->entityManager->flush();

        }
        return $client;

    }

    public function convertVtlmclhToClient(Vtmclh $vtmclh): Client
    {
        $client = $this->entityManager->getRepository(Client::class)->getClientByIdEntity($vtmclh);
        if (is_null($client)) {
            $client = new Client();

            $client->setName($vtmclh->getNombre());
            $client->setLastName($vtmclh->getApellido());
//        $client->setDateCreation($distribucionpedidosclientes->get()) ;
            $client->setEnabled(true);
            //---
            $emailClient = new ContactClient();
            $emailClient->setValue($vtmclh->getEmail());
            $emailClient->setContactType($this->entityManager->getRepository(ContactType::class)
                ->find(\App\Model\ContactType::EMAIL));
            $client->addContact($emailClient);

            $cellphoneClient = new ContactClient();
            $cellphoneClient->setValue($vtmclh->getTelefono());
            $cellphoneClient->setContactType($this->entityManager->getRepository(ContactType::class)
                ->find(\App\Model\ContactType::CELLPHONE));
            $client->addContact($cellphoneClient);
            //------
            $idClientesnew = new IdentificationClient();
            $idClientesnew->setIdentificationType($this->entityManager->getRepository(IdentificationType::class)
                ->find(\App\Model\IdentificationType::ID_CLIENTESNEW));
            $idClientesnew->setIdentification($vtmclh->getId());
            $client->addIdentification($idClientesnew);

            $dniClientesnew = new IdentificationClient();
            $dniClientesnew->setIdentificationType(
                $this->entityManager->
                getRepository(IdentificationType::class)
                    ->find(\App\Model\IdentificationType::DNI));
            $dniClientesnew->setIdentification(
                $vtmclh->getNrodoc());
            $client->addIdentification($dniClientesnew);


            $this->entityManager->persist($client);
            $this->entityManager->flush();
        }
        return $client;

    }

}