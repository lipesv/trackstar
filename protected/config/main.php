<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array (
		'basePath' => dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..',
		'name' => 'TrackStar',
		'id' => 'TrackStar',
		'homeUrl' => '/trackstar/project',
		
		// preloading 'log' component
		'preload' => array (
				'log' 
		),
		
		// autoloading model and component classes
		'import' => array (
				'application.models.*',
				'application.components.*' 
		),
		
		'modules' => array (
				
				// uncomment the following to enable the Gii tool
				
				'gii' => array (
						'class' => 'system.gii.GiiModule',
						'password' => false,
						
						// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters' => array (
								'127.0.0.1',
								'::1' 
						) 
				) 
		),
		
		// application components
		'components' => array (
				
				'user' => array (
						
						// enable cookie-based authentication
						'allowAutoLogin' => true 
				),
				
				// uncomment the following to enable URLs in path-format
				/*
				 * 'urlManager'=>array(
				 * 'urlFormat'=>'path',
				 * 'rules'=>array(
				 * '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				 * '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				 * '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				 * ),
				 * ),
				 */
				
				/*
				 * 'db'=>array(
				 * 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				 * ),
				 */
				
				// uncomment the following to use a MySQL database
				'db' => array (
						'connectionString' => 'mysql:host=localhost;dbname=trackstar',
						'emulatePrepare' => true,
						'username' => 'root',
						'password' => 'Tu_)(Le#123!',
						'charset' => 'utf8' 
				),
				'errorHandler' => array (
						
						// use 'site/error' action to display errors
						'errorAction' => 'site/error' 
				),
				'log' => array (
						'class' => 'CLogRouter',
						'routes' => array (
								array (
										'class' => 'CFileLogRoute',
										'levels' => 'error, warning' 
								) 
						) 
				),
				'authManager' => array (
						'class' => 'CDbAuthManager',
						'connectionID' => 'db',
						'itemTable' => 'tbl_auth_item',
						'itemChildTable' => 'tbl_auth_item_child',
						'assignmentTable' => 'tbl_auth_assignment' 
				),
				'urlManager' => array (
						'urlFormat' => 'path',
						'rules' => array (
								'project' => array (
										'project/index',
										'caseSensitive' => false 
								),
								'project/view/<id:\d+>' => array (
										'project/view',
										'caseSensitive' => false 
								),
								'project/update/<id:\d+>' => array (
										'project/update',
										'caseSensitive' => false 
								),
								'project/adduser/<id:\d+>' => array (
										'project/adduser',
										'caseSensitive' => false 
								),
								'issue/<pid:\d+>' => array (
										'issue/index',
										'caseSensitive' => false 
								),
								'issue/view/<id:\d+>' => array (
										'issue/view',
										'caseSensitive' => false 
								),
								'issue/update/<id:\d+>' => array (
										'issue/update',
										'caseSensitive' => false 
								),
								'user' => array (
										'user/index',
										'caseSensitive' => false 
								),
								'user/view/<id:\d+>' => array (
										'user/view',
										'caseSensitive' => false 
								),
								'user/update/<id:\d+>' => array (
										'user/update',
										'caseSensitive' => false 
								),
								'<pid:\d+>/commentfeed' => array (
										'comment/feed',
										'urlSuffix' => '.xml',
										'caseSensitive' => false 
								),
								'commentfeed' => array (
										'comment/feed',
										'urlSuffix' => '.xml',
										'caseSensitive' => false 
								) 
						),
						'showScriptName' => false 
				) 
		),
		
		// uncomment the following to show log messages on web pages
		/*
		 * array(
		 * 'class'=>'CWebLogRoute',
		 * ),
		 */
		
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params' => array (
				
				// this is used in contact page
				'adminEmail' => 'webmaster@example.com' 
		) 
);