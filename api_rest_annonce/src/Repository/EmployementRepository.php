<?php

namespace App\Repository;

use App\Entity\Employement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Employement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employement[]    findAll()
 * @method Employement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employement::class);
    }

    // /**
    //  * @return Employement[] Returns an array of Employement objects
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
    public function findOneBySomeField($value): ?Employement
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
