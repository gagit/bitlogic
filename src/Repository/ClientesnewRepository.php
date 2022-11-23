<?php

namespace App\Repository;

use App\Entity\Clientesnew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clientesnew>
 *
 * @method Clientesnew|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clientesnew|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clientesnew[]    findAll()
 * @method Clientesnew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientesnewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clientesnew::class);
    }

    public function add(Clientesnew $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Clientesnew $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getClientesnewFilter($filter): QueryBuilder
    {
        $qb = $this->createQueryBuilder('q')
            ->select('q');
        if(array_key_exists('apellidos',$filter) && $filter['apellidos'] != null) {
            $qb->andWhere($qb->expr()->eq('q.apellidos', ':apellidos'))
                ->setParameter('apellidos', $filter['apellidos']);
        }
        return  $qb;
    }


}