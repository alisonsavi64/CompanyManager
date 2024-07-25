<?php

namespace App\Application\UseCases\UpdateAssociate;

use App\Domain\Entity\Associate;
use App\Domain\Entity\Company;
use App\infra\Repository\database\AssociateRepositoryDatabase;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Doctrine\ORM\EntityManagerInterface;

class UpdateAssociateUseCase
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
        $oldAssociate = $this->associateRepository->findById($input['id']);
        $company = $this->companyRepository->findById($input['data']->company_id);

        $associate = $this->associateRepository->update($oldAssociate, $input['data']->name, $company);
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
