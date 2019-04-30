<?php

namespace App\Repository;

use App\Entity\SolicitacaoProduto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SolicitacaoProduto|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolicitacaoProduto|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolicitacaoProduto[]    findAll()
 * @method SolicitacaoProduto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitacaoProdutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SolicitacaoProduto::class);
    }

    // /**
    //  * @return SolicitacaoProduto[] Returns an array of SolicitacaoProduto objects
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
    public function findOneBySomeField($value): ?SolicitacaoProduto
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
