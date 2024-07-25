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

        $this->entityManager->persist($company);
        $this->entityManager->flush();

        return $company;
    }

    public function delete(Company $company): bool
    {
        $this->entityManager->remove($company);
        $this->entityManager->flush();
        return true;
    }
    
}
