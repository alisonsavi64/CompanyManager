<?php

namespace App\infra\Routes;

use App\infra\Controller\CompanyController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class CompanyRoutes
{
    private $routes;
    private $companyController;

    public function __construct(RoutingConfigurator $routes, string $companyController)
    {
        $this->routes = $routes;
        $this->companyController = $companyController;
    }

    public function init()
    {
        $this->routes->add('create_company', '/api/company')
            ->controller([$this->companyController, 'post'])
            ->methods(['POST']);

        $this->routes->add('get_all_companies', '/api/company')
            ->controller([$this->companyController, 'getAll'])
            ->methods(['GET']);

        $this->routes->add('get_company', '/api/company/{id}')
            ->controller([$this->companyController, 'get'])
            ->methods(['GET'])
            ->requirements(['id' => '[a-fA-F0-9\-]{36}']);

        $this->routes->add('update_company', '/api/company/{id}')
            ->controller([$this->companyController, 'put'])
            ->methods(['PUT'])
            ->requirements(['id' => '[a-fA-F0-9\-]{36}']);

        $this->routes->add('delete_company', '/api/company/{id}')
            ->controller([$this->companyController, 'delete'])
            ->methods(['DELETE'])
            ->requirements(['id' => '[a-fA-F0-9\-]{36}']);
    }
}
