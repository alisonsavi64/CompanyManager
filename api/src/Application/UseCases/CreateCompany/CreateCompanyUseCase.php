<?php

namespace App\Application\UseCases\CreateCompany;

use App\Domain\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;

class CreateCompanyUseCase
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute($input)
    {
        $company = new Company();
        $company->setName($input->name);

        $this->entityManager->persist($company);
        $this->entityManager->flush();

        return [
            'id' => $company->getId(),
            'name' => $company->getName(),
        ];
    }
}
