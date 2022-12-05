<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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

    public function getClientFilter($filter)
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
