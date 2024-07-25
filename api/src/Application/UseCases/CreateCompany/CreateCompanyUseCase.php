<?php

namespace App\Application\UseCases\CreateCompany;

use App\Domain\Entity\Company;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class CreateCompanyUseCase
{
    private $entityManager;

    private $companyRepository;


    public function __construct(EntityManagerInterface $entityManager, CompanyRepositoryDatabase $companyRepository)
    {
        $this->entityManager = $entityManager;
        $this->companyRepository = $companyRepository;
    }

    public function execute($input)
    {
        $newCompany = new Company();
        $newCompany->setName($input->name);
        $company = $this->companyRepository->createCompany($newCompany);
        return [
            'id' => $company->getId(),
            'name' => $company->getName(),
        ];
    }
}
