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
        'application.modules.admin.components.*'
	),

	'modules'=>array(
        'admin'=>array(
            'class' => 'application.modules.admin.AdminModule',
            'layout' => 'admin.views.layouts',
            'defaultController'=>'Site',
            // application components
            'components'=>array(
                'errorHandler'=>array(
                    // use 'site/error' action to display errors
                    'errorAction'=>'site/error',
                ),
            ),
        ),
    ),
	'components'=>array(
		/*'bootstrap'=>array(
		            'class'=>'bootstrap.components.Bootstrap',
		        ),*/

		'user'=>array(
			'allowAutoLogin'=>true,
		),
        'adminUser'=>array(
            // MyWebUser has member and role as Properties
            'autoUpdateFlash' => FALSE, //设置为false
            'class' => 'MyAdminUser',
            //'class' => 'CWebUser',
            // enable cookie-based authentication
            'allowAutoLogin'    => true,
            'loginUrl'          => array('/admin/site/login'),
            //'stateKeyPrefix'    => '91qiqi',
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
			'routes'=>ENV=='online'?
            array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            )
            :
            array(
                array(
                    'class'=>'CWebLogRoute',
                    'levels'=>'error, warning',
                ),
            )
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']

	'params'=> ENV=='online'?require(dirname(__FILE__).'/params.php'):require(dirname(__FILE__).'/params_local.php'),

);