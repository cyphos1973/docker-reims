<?php

namespace App\Repository;

use App\Entity\Sexes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sexes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sexes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sexes[]    findAll()
 * @method Sexes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SexesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sexes::class);
    }

    // /**
    //  * @return Sexes[] Returns an array of Sexes objects
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
    public function findOneBySomeField($value): ?Sexes
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
