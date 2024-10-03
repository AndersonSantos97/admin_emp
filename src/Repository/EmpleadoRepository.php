<?php

namespace App\Repository;

use App\Entity\Empleado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Empleado>
 */
class EmpleadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empleado::class);
    }

    public function findAllWithRelations(){
        return $this->createQueryBuilder('e')
        ->leftJoin('App\Entity\DeptoEmpleado','d','WITH','e.depto = d.id')
        ->leftJoin('App\Entity\CargoEmpleado','c','WITH','e.cargo = c.id')
        ->addSelect('e.names','e.id','e.dni','e.sexo','d.depto_desc', 'c.cargo_desc')
        ->getQuery()
        ->getResult();
    }

//    /**
//     * @return Empleado[] Returns an array of Empleado objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Empleado
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
