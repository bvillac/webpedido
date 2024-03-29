<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Utimpor S.A.',
    'language' => 'es',
    'charset' => 'utf-8', //'ISO-8859-1'
    'theme' => 'seablue', //tema comun
    //'theme' => 'classic',//tema comun
    // preloading 'log' component
    'preload' => array(
        'log',
        'bootstrap'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    //'application.commands.shell.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1234', //pass para generador
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii'
            )
        ),
    ),
    // application components
    'components' => array(
//        'xmlseclib' => array(
//            'class' => 'system.vendors.xmlseclib.*'
//        ),
        'phpseclib' => array(
            'class' => 'system.vendors.phpseclib.PhpSecLib'
            //'class' => 'system.phpseclib.PhpSecLib'
        ),
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'system.vendors.mpdf.*', //'application.vendors.mpdf.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                /* 'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                  'mode'              => '', //  This parameter specifies the mode of the new document.
                  'format'            => 'A4', // format A4, A5, ...
                  'default_font_size' => 0, // Sets the default document font size in points (pt)
                  'default_font'      => '', // Sets the default font-family for the new document.
                  'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                  'mgr'               => 15, // margin_right
                  'mgt'               => 16, // margin_top
                  'mgb'               => 16, // margin_bottom
                  'mgh'               => 9, // margin_header
                  'mgf'               => 9, // margin_footer
                  'orientation'       => 'P', // landscape or portrait orientation
                  ) */
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'system.vendors.html2pdf.*', //'application.vendors.html2pdf.*',
                    'classFile' => 'html2pdf.class.php', // For adding to Yii::$classMap
                /* 'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                  'orientation' => 'P', // landscape or portrait orientation
                  'format'      => 'A4', // format A4, A5, ...
                  'language'    => 'en', // language: fr, en, it ...
                  'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                  'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                  'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                  ) */
                )
            ),
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            //'loginUrl' => array('site/loginx'), //login page url
            //'recoveryUrl'=>'site/recovery', //Recovery or change password page url
        ),
        'format' => array(
            // number format
            //'numberFormat' => array('decimals' => 2, 'decimalSeparator' => '.', 'thousandSeparator' => ','),
            'numberFormat' => array('decimals' => 2, 'decimalSeparator' => '.', 'thousandSeparator' => false),
            // date time formats
            'datetimeFormat' => 'd.m.Y H:i:s',
            'dateFormat' => 'd.m.Y',
        ),
        /* 'bootstrap' => array(
          'class' => 'ext.bootstrap.components.Bootstrap'
          ), */
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.jsp',
            //'caseSensitive'=>true,//Si los controladores Tienen Mayusculas, Caso COntrario False
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<data:\d+>' => '<controller>/<action>',
                //'<controller:\w+>/<action:\w+>/<ids:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ), */
        // uncomment the following to use a MySQL database
        'db' => array(
            //'connectionString' => 'mysql:host=192.168.10.200;dbname=VSSEAPEDIDO',
            //'connectionString' => 'mysql:host=192.168.1.100;dbname=VSSEAPEDIDO',
            'connectionString' => 'mysql:host=localhost;dbname=VSSEAPEDIDO',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'Root$s34w3b',
            //'password' => 'root00',
            //'password' => 'Root$s34',
            'charset' => 'utf8',
            'dbname' => "VSSEAPEDIDO",
            'dbserver' => "192.168.10.101"
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@utimpor.com',
        'rutaIconos' => '/images/acciones/',
        'pageSize' => 20,
        'pageSizeMin' => 10,
        'limitRowSQL' => 100,
        'limitRow' => 10,
        'dateStart' => "01-12-2018",//Fecha de Inicio
        'dateStartFact' => "2014-11-15",//Fecha de Inicio Facturacaion
        'limitEnv' => 2,//Limite de Envio Documentos
        'datebydefault' => "d-m-Y",
        'dateXML' => "d/m/Y",
        'datepicker' => 'dd-mm-yy',
        'datebytime' => 'Y-m-d h:i:s',
        'rutaDoc' => '/opt/documentos/',
        'rutaFileComent' => '/opt/comentario/',
        //'rutapro' => '/opt/productos/',
        //'rutafilePro' => '/opt/productos/',
        'rutafilePro' => '/themes/seablue/images/productos/',
        'rutapro' => '/images/productos/',
        'logfile' => __DIR__ . '/../runtime/logs/webped.log',
        'consumidorfinal' => '9999999999',
    ),
);
