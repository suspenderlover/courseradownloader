<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of console
 *
 * @author ssaeed7
 */


// This is the configuration for yiic console application.
return array(
 'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
 'name'=>'My Console Application',

     // autoloading model and component classes
 'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.businessmodels.*',
		'application.extensions.widgets.*',
		'application.viewmodels.*'
	),

     // application components
 'components'=>array(

'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=tks',
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
 			

 ),
);