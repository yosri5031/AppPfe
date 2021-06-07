<?php

namespace App\Repository;

use App\Entity\Matiers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Matiers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matiers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matiers[]    findAll()
 * @method Matiers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatiersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matiers::class);
    }

    // /**
    //  * @return Matiers[] Returns an array of Matiers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Matiers
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
