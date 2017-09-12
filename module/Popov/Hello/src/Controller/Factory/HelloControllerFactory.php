<?php

namespace Popov\Hello\Controller\Factory;

use Interop\Container\ContainerInterface;
use Popov\Hello\Controller\HelloController;
use Popov\Hello\Service\FirstService;

class HelloControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $sm = $container->getServiceLocator();

        $fm = $sm->get('FormElementManager');

        /** @var FirstService $firstService */
        $firstService = $sm->get(FirstService::class);
        $firstGridCallback = function() use ($sm) {
            return $sm->get('FirstGrid');
        };

        $controller = new HelloController($fm, $firstService, $firstGridCallback);

        return $controller;
    }
}