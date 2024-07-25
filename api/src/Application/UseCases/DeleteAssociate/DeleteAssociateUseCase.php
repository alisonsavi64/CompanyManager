<?php

namespace App\Application\UseCases\DeleteAssociate;

use App\Domain\Entity\Company;
use App\infra\Repository\database\AssociateRepositoryDatabase;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class DeleteAssociateUseCase
{
    private $entityManager;

    private $companyRepository;
    private $associateRepository;


    public function __construct(EntityManagerInterface $entityManager, CompanyRepositoryDatabase $companyRepository, AssociateRepositoryDatabase $associateRepository)
    {
        $this->entityManager = $entityManager;
        $this->companyRepository = $companyRepository;
        $this->associateRepository = $associateRepository;
    }

    public function execute($input)
    {
        $associate = $this->associateRepository->findById($input);
        $this->associateRepository->delete($associate);
        return ['message' => 'Associate deleted'];
    }
}
