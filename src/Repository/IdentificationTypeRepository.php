<?php

namespace App\Repository;

use App\Entity\IdentificationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdentificationType>
 *
 * @method IdentificationType|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdentificationType|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdentificationType[]    findAll()
 * @method IdentificationType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdentificationTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdentificationType::class);
    }

    public function add(IdentificationType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IdentificationType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
//    /**
//     * @return KindOfIdentification[] Returns an array of KindOfIdentification objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?KindOfIdentification
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function getIdentificationTypeFilter($filter)
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


        if (array_key_exists('enabled', $filter) && $filter['enabled'] != null) {
            $qb->andWhere($qb->expr()->eq('q.enabled', ':enabled'))
                ->setParameter('enabled', $filter['enabled']);
        }


        if (array_key_exists('typeIdentification', $filter) && $filter['typeIdentification'] != null) {
            $qb->andWhere($qb->expr()->eq('q.typeIdentification', ':typeIdentification'))
                ->setParameter('typeIdentification', $filter['typeIdentification']);
        }

        return $qb;
    }
}
