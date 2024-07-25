<?php

namespace App\infra\Controller;

use App\Application\UseCases\CreateCompany\CreateCompanyUseCase;
use App\Application\UseCases\GetCompanys\GetCompanysUseCase;
use App\Application\UseCases\GetCompany\GetCompanyUseCase;
use App\infra\Repository\database\CompanyRepositoryDatabase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class CompanyController
{
    private $entityManager;
    private $companyRepository;


    public function __construct(EntityManagerInterface $entityManager, CompanyRepositoryDatabase $companyRepository)
    {
        $this->entityManager = $entityManager;
        $this->companyRepository = $companyRepository;
    }

    public function post(Request $request)
    {
        $createCompanyUseCase = new CreateCompanyUseCase($this->entityManager, $this->companyRepository);
        return new Response(json_encode($createCompanyUseCase->execute(json_decode($request->getContent()))), 200, ['Content-Type' => 'application/json']);
    }

    public function getAll(Request $request)
    {
        $getCompanyUseCase = new GetCompanysUseCase($this->entityManager, $this->companyRepository);
        return new Response(json_encode($getCompanyUseCase->execute(json_decode($request->getContent()))), 200, ['Content-Type' => 'application/json']);
    }

    public function get(Request $request)
    {
        $getCompanyUseCase = new GetCompanyUseCase($this->entityManager, $this->companyRepository);
        return new Response(json_encode($getCompanyUseCase->execute($request->attributes->get('id'))), 200, ['Content-Type' => 'application/json']);
    }

    public function update(Request $request)
    {
        $getCompanyUseCase = new GetCompanyUseCase($this->entityManager, $this->companyRepository);
        return new Response(json_encode($getCompanyUseCase->execute($request->attributes->get('id'))), 200, ['Content-Type' => 'application/json']);
    }

    public function delete(Request $request)
    {
        $getCompanyUseCase = new GetCompanyUseCase($this->entityManager, $this->companyRepository);
        return new Response(json_encode($getCompanyUseCase->execute($request->attributes->get('id'))), 200, ['Content-Type' => 'application/json']);
    }
}
