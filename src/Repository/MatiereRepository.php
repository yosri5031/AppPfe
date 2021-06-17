<?php

namespace App\Repository;

use App\Entity\Matiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Matiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matiere[]    findAll()
 * @method Matiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matiere::class);
    }
    
    public function findByClasse():array
    {
      return $this-> findVisibleQueryClasse()
      ->GetQuery()
      ->getResult(); 
    }
    public function findVisibleQueryClasse(Request $request): QueryBuilder
    {
        $id = $request->get('studientId');
        return $this ->createQueryBuilder('m')
        -> where ('m.classe_id = $id');
    }
    
    //  /**
    //  * @return Matiere[] Returns an array of Matiere objects
    //  */
    /*
    *** check 1 (findByExampleField) *** 
    *** check 2: https://symfony.com/doc/current/form/direct_submit.html ***
    *** check3: " page login for student (just id) "+ utilisation des methodes find.. dans le twig
    
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
    public function findOneBySomeField($value): ?Matiere
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
