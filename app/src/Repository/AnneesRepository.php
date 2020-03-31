<?php

namespace App\Repository;

use App\Entity\Annees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Annees|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annees|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annees[]    findAll()
 * @method Annees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnneesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annees::class);
    }

    // /**
    //  * @return Annees[] Returns an array of Annees objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Annees
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
