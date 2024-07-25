<?php

namespace App\infra\Routes;

use App\infra\Controller\AssociateController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class AssociateRoutes
{
    private $routes;
    private $associateController;

    public function __construct(RoutingConfigurator $routes, string $associateController)
    {
        $this->routes = $routes;
        $this->associateController = $associateController;
    }

    public function init()
    {
        $this->routes->add('create_associate', '/api/associate')
            ->controller([$this->associateController, 'post'])
            ->methods(['POST']);

        $this->routes->add('get_all_associates', '/api/associate')
            ->controller([$this->associateController, 'getAll'])
            ->methods(['GET']);

        $this->routes->add('get_associate', '/api/associate/{id}')
            ->controller([$this->associateController, 'get'])
            ->methods(['GET'])
            ->requirements(['id' => '[a-fA-F0-9\-]{36}']);

        $this->routes->add('update_associate', '/api/associate/{id}')
            ->controller([$this->associateController, 'put'])
            ->methods(['PUT'])
            ->requirements(['id' => '[a-fA-F0-9\-]{36}']);

        $this->routes->add('delete_associate', '/api/associate/{id}')
            ->controller([$this->associateController, 'delete'])
            ->methods(['DELETE'])
            ->requirements(['id' => '[a-fA-F0-9\-]{36}']);
    }
}
