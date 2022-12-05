<?php

namespace App\Repository;

use App\Entity\IdentificactionClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdentificactionClient>
 *
 * @method IdentificactionClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdentificactionClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdentificactionClient[]    findAll()
 * @method IdentificactionClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdentificationClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdentificactionClient::class);
    }

    public function add(IdentificactionClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IdentificactionClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Identification[] Returns an array of Identification objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Identification
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
   
    public function getIdentificactionClientFilter($filter)
    {
        $qb = $this->createQueryBuilder('q')
                ->select('q');
                        
        if(array_key_exists('identification',$filter) && $filter['identification'] != null) {
                    $qb->andWhere($qb->expr()->eq('q.identification', ':identification'))
                        ->setParameter('identification', $filter['identification']);
        }

        return  $qb;
    }
}

