<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//Yii::app()->onEndRequest= array('RequestHandler', 'endSession');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Quartz',

	// preloading 'log' component
	'preload'=>array('log'),
		'aliases' => array(
				
				'RestfullYii' =>realpath(__DIR__ . '/../extensions/starship/RestfullYii'),
				
		),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.businessmodels.*',
		'application.extensions.widgets.*',
			'application.viewmodels.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
				
			'password'=>false,
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','localhost'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
//			'rules'=>require(
//                dirname(__FILE__).'/../extensions/starship/restfullyii/config/routes.php'
//            ),
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=tks_test',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
 		'db2'=>array(
 				// DB configurations for SQL Server data acquision.
 				'class'=>'CDbConnection',
 				'connectionString' => 'sqlsrv:Server=10.111.5.159;Database=trgPayroll',
 				'username' => 'dev',
 				'password' => 'dev',
		
	),

// 		'db2'=>array(
// 				// DB configurations for SQL Server data acquision.
// 				'class'=>'CDbConnection',
// 				'connectionString' => 'sqlsrv:Server=10.80.15.45;Database=trgPayroll',
// 				'username' => 'washfaq',
// 				'password' => 'wa$iq#',
		
// 		),
		
		'db3'=>array(
				// DB configurations for SQL Server data acquision.
				'class'=>'CDbConnection',
				'connectionString' => 'sqlsrv:Server=Analyticsdb01.trgworld.com;Database=ibexForce',
				'username' => 'quartz',
				'password' => '#qu@rtz#1',
		
		),
            'routes' => array(
		// Configures Yii to email all errors and warnings to an email address
		array(
		'class' => 'CEmailLogRoute',
		'levels' => 'error, warning',
		'emails' => 'asim.riaz@ibexglobal.com'
		),
	),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes' => array(
				// Configures Yii to email all errors and warnings to an email address
				array(
				'class' => 'CEmailLogRoute',
				'levels' => 'error, warning,notice',
				'emails' => array('asim.riaz@ibexglobal.com')
				),
				// Configures Yii to email all errors and warnings to an email address
				array(
						'class' => 'CEmailLogRoute',
						'levels' => 'info',
						'emails' => array('asim.riaz@ibexglobal.com')
				),
			),
		),
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		"timeZoneDB"=>"UTC",
	
	),
);

