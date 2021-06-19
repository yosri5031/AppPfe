<?php

namespace App\Repository;

use App\Entity\EnseignantMatiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnseignantMatiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnseignantMatiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnseignantMatiere[]    findAll()
 * @method EnseignantMatiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnseignantMatiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnseignantMatiere::class);
    }

    // /**
    //  * @return EnseignantMatiere[] Returns an array of EnseignantMatiere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnseignantMatiere
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
