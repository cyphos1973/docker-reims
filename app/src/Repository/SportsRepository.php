<?php

namespace App\Repository;

use App\Entity\Sports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sports|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sports|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sports[]    findAll()
 * @method Sports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sports::class);
    }

    // /**
    //  * @return Sports[] Returns an array of Sports objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sports
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
