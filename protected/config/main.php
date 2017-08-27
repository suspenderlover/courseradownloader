<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
//Yii::app()->onEndRequest= array('RequestHandler', 'endSession');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Coursera',
    'timeZone' => 'Asia/Karachi',
    'defaultController' => 'Coursera',
    // preloading 'log' component
    'preload' => array('log'),
    'aliases' => array(
    //'RestfullYii' =>realpath(__DIR__ . '/../extensions/starship/RestfullYii'),
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.businessmodels.*',
        'application.extensions.widgets.*',
        'application.viewmodels.*',
        'application.Utility.*'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => false,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', 'localhost'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
//			'rules'=>require(
//                //dirname(__FILE__).'/../extensions/starship/restfullyii/config/routes.php'
//            ),
        ),
//            'db'=>array(
//			'connectionString' => 'mysql:host=77.92.84.157;dbname=totalsof_cine',
//			'emulatePrepare' => true,
//			'username' => 'totalsof_cinesta',
//			'password' => 'Password',
//			'charset' => 'utf8',
//		),	
//		'db'=>array(
//			'connectionString' => 'mysql:host=localhost;dbname=opera',
//			'emulatePrepare' => true,
//			'username' => 'root',
//			'password' => '',
//			'charset' => 'utf8',
//		),
// 		
        'routes' => array(
            // Configures Yii to email all errors and warnings to an email address
            array(
                'class' => 'CEmailLogRoute',
                'levels' => 'error, warning',
                'emails' => ''
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
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                // Configures Yii to email all errors and warnings to an email address
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning,notice',
                    'emails' => array('')
                ),
                // Configures Yii to email all errors and warnings to an email address
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'info',
                    'emails' => array('')
                ),
            ),
        ),
        'curl' => array(
            'class' => 'application.extensions.curl.Curl',
            'options' => array(
               
               
              
              
                
             
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => '',
        "timeZoneDB" => "UTC",
    ),
);

