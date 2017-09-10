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
namespace Popov\Hello;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'person' => [
        'types' => [
            'student' => 'Student',
            'mother' => 'Mother',
            'father' => 'Father'
        ],
    ],

    'controllers' => [
        'aliases' => [
            'hello' => Controller\HelloController::class,
        ],
        'factories' => [
            Controller\HelloController::class => Controller\Factory\HelloControllerFactory::class,
        ]
    ],

    'service_manager' => [
        'aliases' => [
            'FirstGrid' => Block\Grid\FirstGrid::class, // only for GridFactory
        ],
        'invokables' => [
            //Model\Card::class => Model\Card::class,
            Service\FirstService::class => Service\FirstService::class,
        ],
        //'factories' => [],
        'shared' => [
            //Model\Card::class => false,
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'widget/menu'	=> __DIR__ . '/../view/widget/menu.phtml',
        ],
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