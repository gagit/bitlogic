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
            $client->setLegalPerson(false) ;
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
            $client = new Client();
            $client->setName($distribucionpedidosclientes->getNombre());
            $client->setLastName($distribucionpedidosclientes->getApellido());
//        $client->setDateCreation($distribucionpedidosclientes->get()) ;
            $client->setAddress($distribucionpedidosclientes->getDireccion1()) ;
            $client->setLegalPerson(false) ;
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
                ->find(\App\Model\IdentificationType::ID_DISTRIBUCIONPEDIDOSCLIENTES));
            $idClientesnew->setIdentification($distribucionpedidosclientes->getId());
            $client->addIdentification($idClientesnew);

            $dniClientesnew = new IdentificationClient();
            $dniClientesnew->setIdentificationType(
                $this->entityManager->
                getRepository(IdentificationType::class)
                    ->find(\App\Model\IdentificationType::DNI));
            $dniClientesnew->setIdentification(
                $distribucionpedidosclientes->getNrodocumento());
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

            $client->setName($vtmclh->getVtmclhNombre());
            $client->setLastName(trim($vtmclh->getVtmclhApell1().' '.$vtmclh->getVtmclhApell2()));
//        $client->setDateCreation($distribucionpedidosclientes->get()) ;
            $client->setAddress(trim($vtmclh->getVtmclhDirecc().' '.$vtmclh->getVtmclhNumero())) ;
            $client->setLegalPerson(true) ;
            $client->setEnabled(true);
            //---
            $emailClient = new ContactClient();
            $emailClient->setValue($vtmclh->getVtmclhDireml());
            $emailClient->setContactType($this->entityManager->getRepository(ContactType::class)
                ->find(\App\Model\ContactType::EMAIL));
            $client->addContact($emailClient);

            $cellphoneClient = new ContactClient();
            $cellphoneClient->setValue($vtmclh->getVtmclhTelefn());
            $cellphoneClient->setContactType($this->entityManager->getRepository(ContactType::class)
                ->find(\App\Model\ContactType::TELEFONO_FIJO));
            $client->addContact($cellphoneClient);
            //------------------------
            //------IDENTIFICACIONES--
            //------------------------
            $idClientesnew = new IdentificationClient();
            $idClientesnew->setIdentificationType($this->entityManager->getRepository(IdentificationType::class)
                ->find(\App\Model\IdentificationType::ID_VTMCLH));
            $idClientesnew->setIdentification($vtmclh->getId());
            $client->addIdentification($idClientesnew);

            $dniClientesnew = new IdentificationClient();
            switch($vtmclh->getVtmclhTipdoc()){
                case 80:
                    $dniClientesnew->setIdentificationType(
                        $this->entityManager->
                        getRepository(IdentificationType::class)
                            ->find(\App\Model\IdentificationType::CUIT));
                    break;
                case 86:
                    $dniClientesnew->setIdentificationType(
                        $this->entityManager->
                        getRepository(IdentificationType::class)
                            ->find(\App\Model\IdentificationType::CUIL));
                    break;
            }

            $dniClientesnew->setIdentification(
                $vtmclh->getVtmclhNrodoc());
            $client->addIdentification($dniClientesnew);


            $this->entityManager->persist($client);
            $this->entityManager->flush();
        }
        return $client;

    }

}