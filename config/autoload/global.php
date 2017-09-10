<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'doctrine_type_mappings' => [
                    'enum' => 'string',
                    'tinyint' => 'integer',
                ],
            ],
        ],
        // @link https://goo.gl/sBkdqp
        'configuration' => [
            'orm_default' => [
                'string_functions' => [
                    //'group_concat' => \DoctrineExtensions\Query\Mysql\GroupConcat::class,
                    'group_concat' => Oro\ORM\Query\AST\Functions\String\GroupConcat::class,
                ],
            ],
        ],
    ],

    'service_manager' => [
        'aliases' => [
            //'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\Adapter',
        ],
        'factories' => [
            //'doctrine.cache.memcache' => Agere\Core\Service\Factory\DoctrineCacheFactory::class,
            'Navigation' => Zend\Navigation\Service\DefaultNavigationFactory::class,
            //'Zend\Db\Adapter\Adapter' => Popov\ZfcCore\Service\Factory\ZendDbAdapterFactory::class,
            ]
    ]
];
