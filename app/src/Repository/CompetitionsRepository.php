<?php

namespace App\Repository;

use App\Entity\Competitions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Competitions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competitions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competitions[]    findAll()
 * @method Competitions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetitionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competitions::class);
    }

    // /**
    //  * @return Competitions[] Returns an array of Competitions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Competitions
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
