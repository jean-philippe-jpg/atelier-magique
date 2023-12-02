<?php

namespace App\Repository;

use App\Entity\PereNoel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PereNoel>
 *
 * @method PereNoel|null find($id, $lockMode = null, $lockVersion = null)
 * @method PereNoel|null findOneBy(array $criteria, array $orderBy = null)
 * @method PereNoel[]    findAll()
 * @method PereNoel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PereNoelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PereNoel::class);
    }

//    /**
//     * @return PereNoel[] Returns an array of PereNoel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PereNoel
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
