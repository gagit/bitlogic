<?php

namespace App\Repository;

use App\Entity\ContactClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactClient>
 *
 * @method ContactClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactClient[]    findAll()
 * @method ContactClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactClient::class);
    }

    public function add(ContactClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContactClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ContactClient[] Returns an array of ContactClient objects
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

//    public function findOneBySomeField($value): ?ContactClient
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
   
    public function getContactClientFilter($filter)
    {
        $qb = $this->createQueryBuilder('q')
                ->select('q');
                        
        if(array_key_exists('value',$filter) && $filter['value'] != null) {
                    $qb->andWhere($qb->expr()->eq('q.value', ':value'))
                        ->setParameter('value', $filter['value']);
        }

                    return  $qb;
    }   

}

