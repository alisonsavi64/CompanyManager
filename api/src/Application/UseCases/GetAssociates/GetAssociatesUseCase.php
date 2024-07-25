<?php

namespace App\Application\UseCases\GetAssociates;

use App\Domain\Entity\Company;
use App\infra\Repository\database\AssociateRepositoryDatabase;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class GetAssociatesUseCase
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
        $associates = $this->associateRepository->getAll();
        $output = [];
        foreach($associates as $associate){
            $output[] = [
                'id' => $associate->getId(),
                'name' => $associate->getName(),
                'company' => [
                    'id' => $associate->getCompany()->getId(),
                    'name' => $associate->getCompany()->getName()
                ]
            ];
        }
        return $output;
    }
}
