<?php

namespace App\Repository;

use App\Entity\Categoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categoria>
 *
 * @method Categoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categoria[]    findAll()
 * @method Categoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categoria::class);
    }

    public function getQueryCategoria($filtro) {

        $qb = $this->createQueryBuilder('q')
                ->select('q');
                if($filtro->nombre) {
            $qb->andWhere($qb->expr()->eq('q.nombre', ':nombre'))
                ->setParameter('nombre', $filtro->nombre);
        }
                if($filtro->descripcion) {
            $qb->andWhere($qb->expr()->eq('q.descripcion', ':descripcion'))
                ->setParameter('descripcion', $filtro->descripcion);
        }
            
        return  $qb;
    }
   
    public function getCategoriaFilter($filter)
    {
        $qb = $this->createQueryBuilder('q')
                ->select('q');
                        
        if(array_key_exists('nombre',$filter) && $filter['nombre'] != null) {
            $qb->andWhere($qb->expr()->eq('q.nombre', ':nombre'))
                ->setParameter('nombre', $filter['nombre']);
        }

        if(array_key_exists('descripcion',$filter) && $filter['descripcion'] != null) {
            $qb->andWhere($qb->expr()->eq('q.descripcion', ':descripcion'))
                    ->setParameter('descripcion', $filter['descripcion']);
        }

        return  $qb;
    }
}