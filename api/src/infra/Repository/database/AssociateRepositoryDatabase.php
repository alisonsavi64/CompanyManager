<?php

namespace App\infra\Repository\database;

use App\Domain\Entity\Company;
use App\Domain\Entity\Associate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Associate>
 */
class AssociateRepositoryDatabase extends ServiceEntityRepository
{
    private $entityManager;
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, Associate::class);
    }

    public function createAssociate(Associate $associate): Associate 
    {
        $this->entityManager->persist($associate);
        $this->entityManager->flush();

        return $associate;
    }

    public function findById(string $id): ?Associate
    {
        return $this->entityManager->find(Associate::class, $id);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }

    public function update(Associate $associate, string $name, Company $company): Associate
    {
        $associate->setName($name);
        $associate->setCompany($company);

        $this->entityManager->persist($associate);
        $this->entityManager->flush();

        return $associate;
    }

    public function delete(Associate $associate): bool
    {
        $this->entityManager->remove($associate);
        $this->entityManager->flush();
        return true;
    }
    
}
