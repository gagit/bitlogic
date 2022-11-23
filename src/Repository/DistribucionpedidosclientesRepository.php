<?php

namespace App\Repository;

use App\Entity\Distribucionpedidosclientes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Distribucionpedidosclientes>
 *
 * @method Distribucionpedidosclientes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Distribucionpedidosclientes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Distribucionpedidosclientes[]    findAll()
 * @method Distribucionpedidosclientes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DistribucionpedidosclientesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Distribucionpedidosclientes::class);
    }

    public function add(Distribucionpedidosclientes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Distribucionpedidosclientes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getDistribucionpedidosclientesFilter($filter): QueryBuilder
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