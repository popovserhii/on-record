<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2017 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_<package>
 * @author Serhii Popov <popow.sergiy@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Popov\Student;

return [
    'controllers' => [
        'aliases' => [
            'student' => Controller\StudentController::class,
        ],
        'factories' => [
            Controller\StudentController::class => Controller\Factory\StudentControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'StudentService' => Service\StudentService::class
        ],
        'invokables' => [
            Service\StudentService::class => Service\StudentService::class,
            Service\GuardianService::class => Service\GuardianService::class,
        ],
        //'factories' => [],
        'shared' => [],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src//Model'],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
];