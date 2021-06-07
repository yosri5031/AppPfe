<?php

namespace App\Repository;

use App\Entity\Periodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Periodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Periodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Periodes[]    findAll()
 * @method Periodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Periodes::class);
    }

    // /**
    //  * @return Periodes[] Returns an array of Periodes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Periodes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
