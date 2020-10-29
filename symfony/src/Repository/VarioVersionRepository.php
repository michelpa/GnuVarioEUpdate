<?php

namespace App\Repository;

use App\Entity\VarioVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VarioVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method VarioVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method VarioVersion[]    findAll()
 * @method VarioVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VarioVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VarioVersion::class);
    }

    public function desactiveForType($firmwareType)
    {
        $vs = $this->findBy(['firmwareType' => $firmwareType, 'isActive' => true]);
        foreach ($vs as $v) {
            $v->setIsActive(false);
            $this->_em->persist($v);
        }
        $this->_em->flush();
    }

    // /**
    //  * @return VarioVersion[] Returns an array of VarioVersion objects
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
    public function findOneBySomeField($value): ?VarioVersion
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
