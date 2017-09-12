<?php

namespace Popov\Student\Controller\Factory;

use Interop\Container\ContainerInterface;
use Popov\Student\Controller\StudentController;
use Popov\Student\Service\GuardianService;

class StudentControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $sm = $container->getServiceLocator();

        $fm = $sm->get('FormElementManager');

        /** @var GuardianService $firstService */
        $firstService = $sm->get(GuardianService::class);

        $controller = new StudentController($fm, $firstService);

        return $controller;
    }
}