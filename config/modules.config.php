<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Zend\Cache',
    'Zend\Db',
    'Zend\Mail',
    'Zend\Navigation',
    'Zend\Paginator',
    'Zend\Session',
    'Zend\Form',
    'Zend\InputFilter',
    'Zend\Filter',
    'Zend\Serializer',
    'Zend\I18n',
    'Zend\Log',
    'Zend\Validator',
    'DoctrineModule',
    'DoctrineORMModule',
    //'ZendDeveloperTools',

    'DoctrineModule',
    'DoctrineORMModule',

    'ZfcDatagrid',
    'AsseticBundle',


    //'Application',
    'Popov\ZfcLayout',
    'Agere\Translator',
    'Agere\ZfcDataGridPlugin',
    'Agere\ZfcDataGrid',
    'Agere\Block', // rename to Popov\ZfcBlock
    'Agere\Simpler', // rename to Popov\ZfcSimpler
    'Popov\ZfcCore',
    'Popov\ZfcCurrent',

    'Popov\ZfcEntity',
    'Popov\ZfcForm',
    'Popov\ZfcFile',
    'Popov\ZfcFileUpload',
    'Popov\ZfcTab',


    'Popov\ZfcRole',
    'Popov\ZfcUser',

    'Popov\ZfcMail',

    'Popov\Hello',
    'Popov\Inquiry',
    'Popov\Student',
];
