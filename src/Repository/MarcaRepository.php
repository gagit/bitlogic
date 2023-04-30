<?php

namespace App\Repository;

use App\Entity\Marca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Marca>
 *
 * @method Marca|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marca|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marca[]    findAll()
 * @method Marca[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarcaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marca::class);
    }

    public function getQueryMarca($filtro) {

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


}
