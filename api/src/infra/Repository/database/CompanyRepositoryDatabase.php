<?php

namespace App\infra\Repository\database;

use App\Domain\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Company>
 */
class CompanyRepositoryDatabase extends ServiceEntityRepository
{
    private $entityManager;
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, Company::class);
    }

    //    /**
//     * @return Company2[] Returns an array of Company2 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    //    public function findOneBySomeField($value): ?Company2
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function createCompany(Company $company): Company 
    {
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        return $company;
    }

    public function findById(string $id): ?Company
    {
        return $this->entityManager->find(Company::class, $id);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }

    public function update(Company $company, string $name): Company
    {
        $company->setName($name);

        $this->persist($company);
        $this->flush();

        return $company;
    }

    public function delete(Company $company): void
    {
        $this->remove($company);
        $this->flush();
    }
    
}
