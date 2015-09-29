<?php
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'language'=>'zh_cn',
	'name'=>'索菲雅婚纱影楼',
	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
	),
	'components'=>array(
		/*'bootstrap'=>array(
		            'class'=>'bootstrap.components.Bootstrap',
		        ),*/
		'user'=>array(
			'allowAutoLogin'=>true,
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
		
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),


		'db'=> ENV=='online'?require(dirname(__FILE__).'/db.php'):require(dirname(__FILE__).'/db_local.php'),



		'errorHandler'=>array(
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

	'params'=> ENV=='online'?require(dirname(__FILE__).'/params.php'):require(dirname(__FILE__).'/params_local.php'),

);