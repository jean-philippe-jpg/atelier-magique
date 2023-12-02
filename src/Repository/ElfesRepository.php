<?php

namespace App\Repository;

use App\Entity\Elfes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Elfes>
 *
 * @method Elfes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Elfes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Elfes[]    findAll()
 * @method Elfes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElfesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Elfes::class);
    }

//    /**
//     * @return Elfes[] Returns an array of Elfes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Elfes
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
