<?php

namespace App\Repository;

use App\Entity\Seasons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Seasons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seasons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seasons[]    findAll()
 * @method Seasons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeasonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seasons::class);
    }

    // /**
    //  * @return Seasons[] Returns an array of Seasons objects
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
    public function findOneBySomeField($value): ?Seasons
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
