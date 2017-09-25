<?php

namespace Popov\Student\Controller\Factory;

use Interop\Container\ContainerInterface;
use Popov\Student\Controller\StudentController;
use Popov\Student\Service\StudentService;

class StudentControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $sm = $container->getServiceLocator();

        $fm = $sm->get('FormElementManager');

        /** @var StudentService $studentService */
        $studentService = $sm->get(StudentService::class);

        $controller = new StudentController($fm, $studentService);

        return $controller;
    }
}