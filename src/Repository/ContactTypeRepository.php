<?php

namespace App\Repository;

use App\Entity\ContactType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactType>
 *
 * @method ContactType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactType[]    findAll()
 * @method ContactType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactType::class);
    }

    public function add(ContactType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContactType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ContactType[] Returns an array of ContactType objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContactType
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }


    public function getContactTypeFilter($filter)
    {
        $qb = $this->createQueryBuilder('q')
            ->select('q');

        if (array_key_exists('name', $filter) && $filter['name'] != null) {
            $qb->andWhere($qb->expr()->eq('q.name', ':name'))
                ->setParameter('name', $filter['name']);
        }


        if (array_key_exists('description', $filter) && $filter['description'] != null) {
            $qb->andWhere($qb->expr()->eq('q.description', ':description'))
                ->setParameter('description', $filter['description']);
        }


        if (array_key_exists('contactGroup', $filter) && $filter['contactGroup'] != null) {
            $qb->andWhere($qb->expr()->eq('q.contactGroup', ':contactGroup'))
                ->setParameter('contactGroup', $filter['contactGroup']);
        }


        if (array_key_exists('fontAwesomeIcon', $filter) && $filter['fontAwesomeIcon'] != null) {
            $qb->andWhere($qb->expr()->eq('q.fontAwesomeIcon', ':fontAwesomeIcon'))
                ->setParameter('fontAwesomeIcon', $filter['fontAwesomeIcon']);
        }


        if (array_key_exists('enabled', $filter) && $filter['enabled'] != null) {
            $qb->andWhere($qb->expr()->eq('q.enabled', ':enabled'))
                ->setParameter('enabled', $filter['enabled']);
        }

        return $qb;
    }

}

