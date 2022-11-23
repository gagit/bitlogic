<?php

namespace App\Repository;

use App\Entity\Vtmclh;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vtmclh>
 *
 * @method Vtmclh|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vtmclh|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vtmclh[]    findAll()
 * @method Vtmclh[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VtmclhRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vtmclh::class);
    }

    public function add(Vtmclh $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vtmclh $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getVtmclhFilter($filter): QueryBuilder
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