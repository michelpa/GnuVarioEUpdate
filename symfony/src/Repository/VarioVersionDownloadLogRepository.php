<?php

namespace App\Repository;

use App\Entity\VarioVersionDownloadLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VarioVersionDownloadLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method VarioVersionDownloadLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method VarioVersionDownloadLog[]    findAll()
 * @method VarioVersionDownloadLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VarioVersionDownloadLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VarioVersionDownloadLog::class);
    }

    // /**
    //  * @return VarioVersionDownloadLog[] Returns an array of VarioVersionDownloadLog objects
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
    public function findOneBySomeField($value): ?VarioVersionDownloadLog
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
