<?php

namespace App\Repository;

use App\Entity\Client;
use App\Entity\Clientesnew;
use App\Entity\Distribucionpedidosclientes;
use App\Entity\Vtmclh;
use App\Model\ClientesDikterInterface;
use App\Model\IdentificationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Client>
 *
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function add(Client $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Client $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getClientByIdEntity(ClientesDikterInterface $clienteDikter) : ?Client
    {
        $qb = $this->createQueryBuilder('q')
            ->select('q');
        $qb->leftJoin('q.identifications','identifications');
        if ($clienteDikter instanceof Clientesnew) {
            $qb->andWhere($qb->expr()->eq('identifications.identificationType', ':identificationType'))
                ->setParameter('identificationType', IdentificationType::ID_CLIENTESNEW);
        }elseif($clienteDikter instanceof Vtmclh) {
            $qb->andWhere($qb->expr()->eq('identifications.identificationType', ':identificationType'))
                ->setParameter('identificationType', IdentificationType::ID_VTMCLH);
        }elseif($clienteDikter instanceof Distribucionpedidosclientes) {
            $qb->andWhere($qb->expr()->eq('identifications.identificationType', ':identificationType'))
                ->setParameter('identificationType', IdentificationType::ID_DISTRIBUCIONPEDIDOSCLIENTES);
        }

        $qb->andWhere($qb->expr()->eq('identifications.identification', ':identification'))
            ->setParameter('identification', $clienteDikter->getId());
        try {
            return $qb->getQuery()->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    public function getClientFilter($filter) : QueryBuilder
    {
        $qb = $this->createQueryBuilder('q')
            ->select('q');

        if (array_key_exists('name', $filter) && $filter['name'] != null) {
            $qb->andWhere($qb->expr()->eq('q.name', ':name'))
                ->setParameter('name', $filter['name']);
        }

        if (array_key_exists('lastName', $filter) && $filter['lastName'] != null) {
            $qb->andWhere($qb->expr()->eq('q.lastName', ':lastName'))
                ->setParameter('lastName', $filter['lastName']);
        }

        if (array_key_exists('address', $filter) && $filter['address'] != null) {
            $qb->andWhere($qb->expr()->eq('q.address', ':address'))
                ->setParameter('address', $filter['address']);
        }

        if (array_key_exists('dateCreation', $filter) && $filter['dateCreation'] != null) {
            $qb->andWhere($qb->expr()->eq('q.dateCreation', ':dateCreation'))
                ->setParameter('dateCreation', $filter['dateCreation']);
        }

        if (array_key_exists('enabled', $filter) && $filter['enabled'] != null) {
            $qb->andWhere($qb->expr()->eq('q.enabled', ':enabled'))
                ->setParameter('enabled', $filter['enabled']);
        }

        return $qb;
    }
}
