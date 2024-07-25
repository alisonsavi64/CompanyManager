<?php

namespace App\Application\UseCases\UpdateCompany;

use App\Domain\Entity\Company;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class UpdateCompanyUseCase
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
        $oldCompany = $this->companyRepository->findById($input['id']);
        $company = $this->companyRepository->update($oldCompany, $input['data']->name);
        return [
            'id' => $company->getId(),
            'name' => $company->getName(),
        ];
    }
}
