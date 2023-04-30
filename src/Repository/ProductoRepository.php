<?php

namespace App\Repository;


use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Producto>
 *
 * @method Producto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Producto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Producto[]    findAll()
 * @method Producto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }

    public function getQueryProducto($filtro) {

        $qb = $this->createQueryBuilder('q')
                ->select('q');
                if($filtro->cod_barra) {
            $qb->andWhere($qb->expr()->eq('q.cod_barra', ':cod_barra'))
                ->setParameter('cod_barra', $filtro->cod_barra);
        }
                if($filtro->nombre) {
            $qb->andWhere($qb->expr()->eq('q.nombre', ':nombre'))
                ->setParameter('nombre', $filtro->nombre);
        }
                if($filtro->descripcion) {
            $qb->andWhere($qb->expr()->eq('q.descripcion', ':descripcion'))
                ->setParameter('descripcion', $filtro->descripcion);
        }
                if($filtro->valor_umed) {
            $qb->andWhere($qb->expr()->eq('q.valor_umed', ':valor_umed'))
                ->setParameter('valor_umed', $filtro->valor_umed);
        }
            
        return  $qb;
    }

   
    public function getProductoFilter($filter)
    {
        $qb = $this->createQueryBuilder('q')
                ->select('q');
                        
if(array_key_exists('codBarra',$filter) && $filter['codBarra'] != null) {
            $qb->andWhere($qb->expr()->eq('q.codBarra', ':codBarra'))
                ->setParameter('codBarra', $filter['codBarra']);
        }

                    
if(array_key_exists('nombre',$filter) && $filter['nombre'] != null) {
            $qb->andWhere($qb->expr()->eq('q.nombre', ':nombre'))
                ->setParameter('nombre', $filter['nombre']);
        }

                    
if(array_key_exists('descripcion',$filter) && $filter['descripcion'] != null) {
            $qb->andWhere($qb->expr()->eq('q.descripcion', ':descripcion'))
                ->setParameter('descripcion', $filter['descripcion']);
        }

                    
if(array_key_exists('valor_umed',$filter) && $filter['valor_umed'] != null) {
            $qb->andWhere($qb->expr()->eq('q.valor_umed', ':valor_umed'))
                ->setParameter('valor_umed', $filter['valor_umed']);
        }

                    return  $qb;
    }
}