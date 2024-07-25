<?php

namespace App\Application\UseCases\DeleteCompany;

use App\Domain\Entity\Company;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class DeleteCompanyUseCase
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
        $company = $this->companyRepository->findById($input);
        $companys = $this->companyRepository->delete($company);
        return [];
    }
}
