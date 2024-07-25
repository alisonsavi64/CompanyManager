<?php

namespace App;

use App\infra\Controller\ControllerFactory;
use App\infra\Routes\Router;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\HttpKernel\KernelInterface;

class Kernel extends BaseKernel implements KernelInterface
{
    use MicroKernelTrait;

    private const CONFIG_EXTS = '.{php,xml,yaml,yml}';

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $loader->load($this->getConfigDir() . '/services.yaml');
        $loader->load($this->getConfigDir() . '/{packages}/*' . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getConfigDir() . '/{packages}/' . $this->environment . '/**/*' . self::CONFIG_EXTS, 'glob');
    }

    protected function configureRoutes(RoutingConfigurator $routes)
    {
        $router = new Router($routes, new ControllerFactory());
        $router->init();
    }

    private function getConfigDir()
    {
        return $this->getProjectDir() . '/config';
    }
}
