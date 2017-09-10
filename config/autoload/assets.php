<?php
return [
    // в цьому файлі я підключив те, що на перший погляд знав. Якщо потрібно підключити, щось нове, скажете
    //'assetic_configuration' => [
        // Use on production environment
        // 'debug'              => false,
        // 'buildOnRequest'     => false,
        // Use on development environment
        'debug' => true,
        'buildOnRequest' => true,

        'default' => [
            'assets' => [
                '@jquery_js',

                '@jqueryui_css',
                '@jqueryui_js',

                //'@jqueryLibs_css',
                //'@jqueryLibs_js',

                '@twbs_css',
                '@twbs_js',

                //'@jquery_fileUpload_js',

                //'@agere_js',

                //'@jqGrid_css',
                //'@jqGrid_js',
            ],
            'options' => [
                'mixin' => true,
            ],
        ],

        // temporary code
        /*'controllers' => [
            'staff' => [
                '@staff_css',
                '@staff_js',
            ],
        ],*/
        // end temporary code

        'modules' => [
            'jquery' => [
                // vendor\components\jquery\jquery.min.js
                'root_path' => realpath('vendor/components/jquery'),
                'collections' => [
                    'jquery_js' => [
                        'assets' => [
                            // vendor\twbs\bootstrap-sass\assets\javascripts\bootstrap.min.js
                            'jquery.min.js',
                        ],
                    ],
                ],
            ],
            'jqueryui' => [
                'root_path' => realpath('vendor/components/jqueryui'),
                'collections' => [
                    // vendor\components\jqueryui\themes\base\jquery-ui.min.css
                    'jqueryui_css' => [
                        'assets' => [
                            'themes/base/jquery-ui.min.css'
                        ],
                        //'filters' => ['scss' => ['name' => \Assetic\Filter\ScssphpFilter::class]],
                        //'options' => ['output' => 'twbs_css.css'],
                    ],
                    'jqueryui_js' => [
                        'assets' => [
                            // vendor\components\jqueryui\jquery-ui.min.js
                            'jquery-ui.min.js',
                            //'ui/core.js',
                        ],
                    ],
                    'jqueryui_images' => [
                        'assets' => [
                            // \vendor\components\jqueryui\themes\base\images\ui-icons_444444_256x240.png
                            'themes/base/images/*.png',
                            'themes/base/images/*.jpg',
                        ],
                        'options' => [
                            //'move_raw' => true,
                            //'targetPath' => 'jquery-ui/images',
                            'disable_source_path' => true,
                            'move_raw' => true,
                            'targetPath' => 'images',
                        ]
                    ],
                ],
            ],
            /*'jqueryLibs' => [
                'root_path' => realpath('public/media'),
                'collections' => [
                    'jqueryLibs_css' => [
                        'assets' => [
                            // <link rel="stylesheet" href="/media/js/jquery/jquery-loadmask-0.4/jquery.loadmask.css">
                            'js/jquery/jquery-loadmask-0.4/jquery.loadmask.css'
                        ],
                    ],
                    'jqueryLibs_js' => [
                        'assets' => [
                            // <script src="/media/js/jquery/jquery-loadmask-0.4/jquery.loadmask.min.js?40"></script>
                            'js/jquery/jquery-loadmask-0.4/jquery.loadmask.min.js',
                            'js/validate/jquery.validate.js',
                        ],
                    ],
                ],
            ],*/
            'twbs' => [
                // vendor\twbs\bootstrap-sass\assets\stylesheets\_bootstrap.scss
                'root_path' => realpath('vendor/twbs/bootstrap-sass'),
                'collections' => [
                    'twbs_css' => [
                        'assets' => [
                            'assets/stylesheets/_bootstrap.scss',
                            
                        ],
                        'filters' => ['scss' => ['name' => \Assetic\Filter\ScssphpFilter::class]],
                        'options' => ['output' => 'css/twbs_css.css'],
                    ],
                    'twbs_js' => [
                        'assets' => [
                            // vendor\twbs\bootstrap-sass\assets\javascripts\bootstrap.min.js
                            'assets/javascripts/bootstrap.min.js',
                        ],
                    ],
                    'twbs_fonts' => [
                        'assets' => [
                            'assets/fonts/bootstrap/*',
                        ],
                        'options' => [
                            'disable_source_path' => true,
                            'move_raw' => true,
                            'targetPath' => 'fonts/bootstrap',
                        ],
                    ],
                ],
            ],

            /*'fileUpload' => [
                'root_path' => realpath('public'),
                'collections' => [
                    'jquery_fileUpload_js' => [
                        'assets' => [
                            'media/js/jquery/jquery-file-upload-9.5.7/js/vendor/jquery.ui.widget.js',
                            'media/js/jquery/jquery-file-upload-9.5.7/js/vendor/tmpl.min.js',
                            'media/js/jquery/jquery-file-upload-9.5.7/js/jquery.iframe-transport.js',
                            'media/js/jquery/jquery-file-upload-9.5.7/js/jquery.fileupload.js',
                            'media/js/jquery/jquery-file-upload-9.5.7/js/jquery.fileupload-process.js',
                            'media/js/jquery/jquery-file-upload-9.5.7/js/jquery.fileupload-ui.js',
                            //'media/js/jquery/jquery-file-upload-9.5.7/js/main.js'
                        ],
                    ],
                ],
            ],*/

            /*'jqGrid' => [
                // <link rel="stylesheet" href="/media/js/jquery/jquery-ui-1.10.1.custom/css/custom-theme/jquery-ui-1.10.1.custom.min.css">
	            // <link rel="stylesheet" href="/media/js/jquery/jqGrid/css/ui.jqgrid.css">

                //<script src="/media/js/jquery/jqGrid/js/i18n/grid.locale-ru.js"></script>
                //<script src="/media/js/jquery/jqGrid/jquery.jqGrid-4.6.0.js"></script>
                // vendor\twbs\bootstrap-sass\assets\stylesheets\_bootstrap.scss
                'root_path' => realpath('public/media/js/jquery/jqGrid'),
                'collections' => [
                    'jqGrid_css' => [
                        'assets' => [
                            'css/ui.jqgrid.css'
                        ],
                    ],
                    'jqGrid_js' => [
                        'assets' => [
                            // vendor\twbs\bootstrap-sass\assets\javascripts\bootstrap.min.js
                            'js/i18n/grid.locale-ru.js',
                            'jquery.jqGrid-4.6.0.js',
                        ],
                    ],
                ],
            ],*/

            /*'agere' => [
                // vendor\twbs\bootstrap-sass\assets\stylesheets\_bootstrap.scss
                'root_path' => realpath('public/media'),
                'collections' => [
                    'agere_js' => [
                        'assets' => [
                            'js/agere/agere.datepicker.js',
                            'js/agere/agere.preloader.js',
                            'js/agere/agere.ajax.js',
                            'js/drop-down.js',
                        ],
                    ],
                ],
            ],*/

            // temporary code
            /*'temporary' => [
                'root_path' => realpath('public/media'),
                'collections' => [
                    'staff_css' => [
                        'assets' => [
                            'css/custom-imageupload.css',
                            'js/upload/css/html5imageupload.css',
                        ],
                        //'filters' => ['scss' => ['name' => \Assetic\Filter\ScssphpFilter::class]],
                        'options' => ['output' => 'staff_css.css'],
                    ],
                    'staff_js' => [
                        'assets' => [
                            'js/upload/js/html5imageupload.min.js',
                        ],
                    ],
                ],
            ],*/
            // end temporary code
        ],
    //],
];