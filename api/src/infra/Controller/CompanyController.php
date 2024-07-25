<?php

namespace App\infra\Controller;

use App\Application\UseCases\CreateCompany\CreateCompanyUseCase;
use App\Application\UseCases\GetCompany\GetCompanyUseCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class CompanyController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function post(Request $request)
    {
        $createCompanyUseCase = new CreateCompanyUseCase($this->entityManager);
        return new Response(json_encode($createCompanyUseCase->execute(json_decode($request->getContent()))), 200, ['Content-Type' => 'application/json']);
    }

    public function getAll(Request $request)
    {
        $getCompanyUseCase = new GetCompanyUseCase();
        return new Response(json_encode(['data' => 'asfasf']), 200, ['Content-Type' => 'application/json']);
    }
}
