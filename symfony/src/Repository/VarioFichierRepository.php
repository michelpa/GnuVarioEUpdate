<?php

namespace App\Repository;

use App\Entity\VarioFichier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @method VarioFichier|null find($id, $lockMode = null, $lockVersion = null)
 * @method VarioFichier|null findOneBy(array $criteria, array $orderBy = null)
 * @method VarioFichier[]    findAll()
 * @method VarioFichier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VarioFichierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VarioFichier::class);
    }

    // /**
    //  * @return VarioFichier[] Returns an array of VarioFichier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VarioFichier
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
