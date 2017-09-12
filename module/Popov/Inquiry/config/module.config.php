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
 * @package Popov_Inquiry
 * @author Serhii Popov <popow.sergiy@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Popov\Inquiry;

return [

    'controllers' => [
        'aliases' => [
            'inquiry' => Controller\InquiryController::class,
        ],
        'factories' => [
            Controller\InquiryController::class => Controller\Factory\InquiryControllerFactory::class,
        ]
    ],

    'service_manager' => [
        'aliases' => [
            'InquiryService' => Service\InquiryService::class, // only for GridFactory
            'InquiryGrid' => Block\Grid\InquiryGrid::class, // only for GridFactory
        ],
        'invokables' => [
            Service\InquiryService::class => Service\InquiryService::class,
        ],
        //'factories' => [],
        //'shared' => [],
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