<?php

namespace App\Repository;

use App\Entity\UnidadMedida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UnidadMedida>
 *
 * @method UnidadMedida|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnidadMedida|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnidadMedida[]    findAll()
 * @method UnidadMedida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnidadMedidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnidadMedida::class);
    }
   
    public function getQueryUnidadMedida($filtro) {

        $qb = $this->createQueryBuilder('q')
                ->select('q');
                if($filtro->nombre) {
            $qb->andWhere($qb->expr()->eq('q.nombre', ':nombre'))
                ->setParameter('nombre', $filtro->nombre);
        }
                if($filtro->nombre_corto) {
            $qb->andWhere($qb->expr()->eq('q.nombre_corto', ':nombre_corto'))
                ->setParameter('nombre_corto', $filtro->nombre_corto);
        }
                if($filtro->dimension) {
            $qb->andWhere($qb->expr()->eq('q.dimension', ':dimension'))
                ->setParameter('dimension', $filtro->dimension);
        }
            
        return  $qb;
    }


   
    public function getUnidadMedidaFilter($filter)
    {
        $qb = $this->createQueryBuilder('q')
                ->select('q');
                        
if(array_key_exists('nombre',$filter) && $filter['nombre'] != null) {
            $qb->andWhere($qb->expr()->eq('q.nombre', ':nombre'))
                ->setParameter('nombre', $filter['nombre']);
        }

                    
if(array_key_exists('nombre_corto',$filter) && $filter['nombre_corto'] != null) {
            $qb->andWhere($qb->expr()->eq('q.nombre_corto', ':nombre_corto'))
                ->setParameter('nombre_corto', $filter['nombre_corto']);
        }

                    
if(array_key_exists('dimension',$filter) && $filter['dimension'] != null) {
            $qb->andWhere($qb->expr()->eq('q.dimension', ':dimension'))
                ->setParameter('dimension', $filter['dimension']);
        }

                    return  $qb;
    }
}