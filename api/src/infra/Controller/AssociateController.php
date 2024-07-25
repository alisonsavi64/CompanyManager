<?php

namespace App\infra\Controller;

use App\Application\UseCases\CreateAssociate\CreateAssociateUseCase;
use App\Application\UseCases\DeleteAssociate\DeleteAssociateUseCase;
use App\Application\UseCases\GetAssociate\GetAssociateUseCase;
use App\Application\UseCases\GetAssociates\GetAssociatesUseCase;
use App\Application\UseCases\UpdateAssociate\UpdateAssociateUseCase;
use App\infra\Repository\database\AssociateRepositoryDatabase;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class AssociateController
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

    public function post(Request $request)
    {
        $createAssociateUseCase = new CreateAssociateUseCase($this->entityManager, $this->companyRepository, $this->associateRepository);
        return new Response(json_encode($createAssociateUseCase->execute(json_decode($request->getContent()))), 200, ['Content-Type' => 'application/json']);
    }

    public function getAll(Request $request)
    {
        $getAllAssociatesUseCase = new GetAssociatesUseCase($this->entityManager, $this->companyRepository, $this->associateRepository);
        return new Response(json_encode($getAllAssociatesUseCase->execute(json_decode($request->getContent()))), 200, ['Content-Type' => 'application/json']);
    }

    public function get(Request $request)
    {
        $getAssociateUseCase = new GetAssociateUseCase($this->entityManager, $this->companyRepository, $this->associateRepository);
        return new Response(json_encode($getAssociateUseCase->execute($request->attributes->get('id'))), 200, ['Content-Type' => 'application/json']);
    }

    public function put(Request $request)
    {
        $updateCompanyUseCase = new UpdateAssociateUseCase($this->entityManager, $this->companyRepository, $this->associateRepository);
        return new Response(json_encode($updateCompanyUseCase->execute(['id' => $request->attributes->get('id'), 'data' => json_decode($request->getContent())])), 200, ['Content-Type' => 'application/json']);
    }

    public function delete(Request $request)
    {
        $deleteAssociateUseCase = new DeleteAssociateUseCase($this->entityManager, $this->companyRepository, $this->associateRepository);
        return new Response(json_encode($deleteAssociateUseCase->execute($request->attributes->get('id'))), 200, ['Content-Type' => 'application/json']);
    }
}
