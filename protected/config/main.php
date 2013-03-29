<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Darussalam Publishers',
    'theme' => 'default',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.email.debug.*',
        'application.extensions.KEmail.KEmail',
        'application.modules.yiiauth.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'yiiauth' => array(
            'userClass' => 'User', //the name of your Userclass
            'config' => array(
                "base_url" => "http://localhost/darussalam/hybridauth/",
                "providers" => array(
                    // openid providers
                    "OpenID" => array(
                        "enabled" => true
                    ),
                    "Yahoo" => array(
                        "enabled" => true
                    ),
                    "AOL" => array(
                        "enabled" => true
                    ),
                    "Google" => array(
                        "enabled" => true,
                        "keys" => array("id" => "", "secret" => ""),
                        "scope" => ""
                    ),
                    "Facebook" => array(
                        "enabled" => true,
                        "keys" => array("id" => "284640041668425", "secret" => "b6c7909c508a01a6e2c70347edc6fc1a"),
// A comma-separated list of permissions you want to request from the user. See the Facebook docs for a full list of available permissions: http://developers.facebook.com/docs/reference/api/permissions.
                        "scope" => "",
// The display context to show the authentication page. Options are: page, popup, iframe, touch and wap. Read the Facebook docs for more details: http://developers.facebook.com/docs/reference/dialogs#display. Default: page
                        "display" => "page"
                    ),
                    "Twitter" => array(
                        "enabled" => true,
                        "keys" => array("key" => "rPmGEE1Wvsf56BSyQaWXw", "secret" => "V4SK09O0cPOgkabsxR5AruBSNrc0b1tzoBeWkL7ew0")
                    ),
                    // windows live
                    "Live" => array(
                        "enabled" => true,
                        "keys" => array("id" => "", "secret" => "")
                    ),
                    "MySpace" => array(
                        "enabled" => false,
                        "keys" => array("key" => "", "secret" => "")
                    ),
                    "LinkedIn" => array(
                        "enabled" => true,
                        "keys" => array("key" => "", "secret" => "")
                    ),
                    "Foursquare" => array(
                        "enabled" => false,
                        "keys" => array("id" => "", "secret" => "")
                    ),
                ),
                // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
                "debug_mode" => false,
                "debug_file" => "",
            ),
        )
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            //'allowAutoLogin'=>true,
            'class' => 'WebUser',
        ),
        'email' => array(
            'class' => 'application.extensions.KEmail.KEmail',
            'host_name' => 'smtp.gmail.com',
            'user' => 'ubaidullah@darussalampk.com',
            'password' => 'my gmail password here',
            'host_port' => 465,
            'ssl' => 'true',
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            //'showScriptName' => false,
            'rules' => array(
                '<country:[\w-\.]+>/<city:[\w-\.]+>/<id:[\w-\.]+>' => '/site/storehome',
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ), */
        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=darussalam',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
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
        'adminEmail' => 'zahid.nadeem@darussalampk.com.com',
    ),
);