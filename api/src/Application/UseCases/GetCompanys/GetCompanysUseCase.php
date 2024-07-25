<?php

namespace App\Application\UseCases\GetCompanys;

use App\Domain\Entity\Company;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class GetCompanysUseCase
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
        $companys = $this->companyRepository->getAll();
        $output = [];
        foreach($companys as $company){
            $output[] = [
                'id' => $company->getId(),
                'name' => $company->getName(),
            ];
        }
        return $output;
    }
}
