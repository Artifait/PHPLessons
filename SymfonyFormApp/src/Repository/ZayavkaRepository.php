<?php

namespace App\Repository;

use App\Entity\Zayavka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Zayavka>
 */
class ZayavkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zayavka::class);
    }

    //    /**
    //     * @return Zayavka[] Returns an array of Zayavka objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('z')
    //            ->andWhere('z.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('z.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Zayavka
    //    {
    //        return $this->createQueryBuilder('z')
    //            ->andWhere('z.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
