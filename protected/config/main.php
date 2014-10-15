<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Utimpor S.A.',
        'language' => 'es',
        'charset' => 'utf-8', //'ISO-8859-1'
        'theme' => 'seablue',//tema comun
        //'theme' => 'classic',//tema comun
	// preloading 'log' component
	'preload'=>array(
            'log',
            'bootstrap'
        ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                //'application.commands.shell.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',//pass para generador
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths' => array(
                            'bootstrap.gii'
                        )
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                /*'bootstrap' => array(
                    'class' => 'ext.bootstrap.components.Bootstrap'
                ),*/
		// uncomment the following to enable URLs in path-format
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
                        'urlSuffix'=>'.jsp',
                        //'caseSensitive'=>true,//Si los controladores Tienen Mayusculas, Caso COntrario False
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			//'connectionString' => 'mysql:host=localhost;dbname=sea2010_sisweb',
                        //'connectionString' => 'mysql:host=192.168.10.101;dbname=appweb_2014',
                        'connectionString' => 'mysql:host=localhost;dbname=appweb_2014',
                        //'connectionString' => 'mysql:host=localhost;dbname=VSSEA',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root00',
			'charset' => 'utf8',
                        'dbname' => "appweb_2014",
                        'dbserver' => "192.168.10.101"
		),
                'dbcont' => array(//Contribuyente
                    'class' => 'CDbConnection',
                    'connectionString' => 'mysql:host=localhost;dbname=utimpor2014',
                    //'connectionString' => 'mysql:host=192.168.10.101;dbname=utimpor2014',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'root00',
                    'charset' => 'utf8',
                    'dbname' => 'utimpor2014',
                    'dbserver' => "192.168.10.101"
                ),
                'dbvssea' => array(
                    'class' => 'CDbConnection',
                    'connectionString' => 'mysql:host=localhost;dbname=VSSEA',
                    //'connectionString' => 'mysql:host=192.168.10.101;dbname=VSSEA',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'root00',
                    'charset' => 'utf8',
                    'dbname' => 'VSSEA',
                    'dbserver' => "192.168.10.101"
                ),
                'dbvsseaint' => array(
                    'class' => 'CDbConnection',
                    'connectionString' => 'mysql:host=localhost;dbname=VSSEAINTERMEDIA',
                    //'connectionString' => 'mysql:host=192.168.10.101;dbname=VSSEAINTERMEDIA',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'root00',
                    'charset' => 'utf8',
                    'dbname' => 'VSSEAINTERMEDIA',
                    //'dbserver' => "localhost"
                    'dbserver' => "192.168.10.101"
                ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@utimpor.com',
                'rutaIconos' => '/images/acciones/',
                'pageSize' => 20,
                'pageSizeMin' => 10,
                'datebydefaultJS' => "yyyy-MM-dd",
                'formaStringDate' => "Y, m, d",
                'datepicker' => 'yy-mm-dd',
                'datebytime' => 'Y-m-d h:i:s',
                'seaFirma' => '/opt/SEAF/',
                'seaFirext' => 'asc',//Extension de Firma Electronica
                'seaDocFact' => '/opt/SEADOC/FACTURAS/',
                'seaDocRete' => '/opt/SEADOC/RETENCIONES/',
                'seaDocNc' => '/opt/SEADOC/NC/',
                'seaDocNd' => '/opt/SEADOC/ND/',
                'seaDocGuia' => '/opt/SEADOC/GUIAS/',
                'consumidorfinal' => '9999999999',
	),
);