<?php

namespace App\infra\Routes;

use App\infra\Controller\ControllerFactory;
use App\infra\Routes\CompanyRoutes;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Router
{
    private $companyRoutes;
    private $associateRoutes;

    public function __construct(RoutingConfigurator $routes, ControllerFactory $controllerFactory)
    {
        $this->companyRoutes = new CompanyRoutes($routes, $controllerFactory->getCompanyController());
        $this->associateRoutes = new AssociateRoutes($routes, $controllerFactory->getAssociateController());
    }

    public function init()
    {
        $this->companyRoutes->init();
        $this->associateRoutes->init();
    }
}
