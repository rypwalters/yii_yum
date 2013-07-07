<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
    'runtimePath'=>$_SERVER[ 'yii_logger_logPath' ],

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
        'user' => array(
            'debug' => false, // This need to be true during installation of the yii-user-management system
            'userTable' => 'gb_user',
            'translationTable' => 'gb_translation',
            'loginType' => 5,   // LOGIN_BY_USERNAME (1) and LOGIN_BY_HYBRIDAUTH (4), not LOGIN_BY_EMAIL (2)
            'hybridAuthProviders' => array( 'Facebook', 'Google', 'LinkedIn' ),
        ),
        
        'usergroup' => array(
            'usergroupTable' => 'gb_usergroup',
            'usergroupMessageTable' => 'gb_user_group_message',
        ),
        'membership' => array(
            'membershipTable' => 'gb_membership',
            'paymentTable' => 'gb_payment',
        ),
        'friendship' => array(
            'friendshipTable' => 'gb_friendship',
        ),
        'profile' => array(
            'privacySettingTable' => 'gb_privacysetting',
            'profileTable' => 'gb_profile',
            'profileCommentTable' => 'gb_profile_comment',
            'profileVisitTable' => 'gb_profile_visit',
            'requiredProfileFields' => array(
                'firstname',
                'lastname',
                'email' ),
        ),
        'role' => array(
            'roleTable' => 'gb_role',
            'userRoleTable' => 'gb_user_role',
            'actionTable' => 'gb_action',
            'permissionTable' => 'gb_permission',
        ),
        'message' => array(
            'messageTable' => 'gb_message',
        ),
		'avatar'=>array(
            'avatarPath' => 'avatar_images',
		),
		'registration'=>array(
		),
	),

	// application components
	'components'=>array(
        'cache' => array('class' => 'system.caching.CDummyCache'),
        'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'application.modules.user.components.YumWebUser',
            'loginUrl' => array('//user/user/login'),
		),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'mysql:host=208.93.216.107;dbname=' . $_SERVER[ 'yii_database' ],
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '0hmygolly',
			'charset' => 'utf8',
			'tablePrefix' => 'gb_',
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
					'levels'=>'error, warning, trace, info',
                    'logPath'=>$_SERVER[ 'yii_logger_logPath' ],
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
		'adminEmail'=>'webmaster@example.com',
	),
);