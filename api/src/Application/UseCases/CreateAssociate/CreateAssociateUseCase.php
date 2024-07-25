<?php

namespace App\Application\UseCases\CreateAssociate;

use App\Domain\Entity\Associate;
use App\Domain\Entity\Company;
use App\infra\Repository\database\AssociateRepositoryDatabase;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class CreateAssociateUseCase
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
        try{
            $company = $this->companyRepository->findById($input->company_id);
        }
        catch(\Exception $e){
            return ['message' => "Company dosen't exists"];    
        }
        $newAssociate = new Associate();
        $newAssociate->setName($input->name);
        $newAssociate->setCompany($company);

        $associate = $this->associateRepository->createAssociate($newAssociate);
        return [
            'id' => $associate->getId(),
            'name' => $associate->getName(),
            'company' => [
                'id' => $company->getId(),
                'name' => $company->getName()
            ]
        ];
    }
}
