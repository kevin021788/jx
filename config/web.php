<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Radio International.CRI.',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'q-6A6cSmnHlhEo-TziyVjjVTz3rxyJ3Sddd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'common' => 'common.php', //后台文件语言包
                        'home' => 'home.php', //前台文件语言包
                    ],
                    'basePath' => '@webroot/components/message', //配置语言文件路径，现在采用默认的，就可以不配置这个
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'authManager' => [
          'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ],
        'user' => [
          'identityClass' => 'mdm\admin\models\User',
          'loginUrl' => ['admin/user/login'],
        ],
		'assetManager'=>[
		 // 设置存放assets的文件目录位置
		 'basePath'=>'public',
		 // 设置访问assets目录的url地址
		 'baseUrl'=>'/public',
		 ],
    ],
    'modules' => [
      'gridview' => [
        'class' => 'kartik\grid\Module',
      ],
      'datecontrol' =>  [
        'class' => 'kartik\datecontrol\Module',
        // format settings for displaying each date attribute
        'displaySettings' => [
          'date' => 'd-m-Y',
          'time' => 'H:i:s A',
          'datetime' => 'd-m-Y H:i:s A',
        ],
        // format settings for saving each date attribute
        'saveSettings' => [
          'date' => 'Y-m-d',
          'time' => 'H:i:s',
          'datetime' => 'Y-m-d H:i:s',
        ],
        // automatically use kartik\widgets for each of the above formats
        'autoWidget' => true,
      ],
      'admin' => [
        'class' => 'mdm\admin\Module',
        'layout' => 'left-menu', // it can be '@path/to/your/layout'.
        'controllerMap' => [
          'assignment' => [
            'class' => 'mdm\admin\controllers\AssignmentController',
            'userClassName' => 'mdm\admin\models\User',
            'idField' => 'id'
          ],
        ],
        //需要更改后台权限组时，注释掉menu以查看菜单
        'menus' => [
          'route' => null,
          'rule' => null,
          'permission' => null,
          'role' => null,
          'assignment' => null,
          'user' => null,
        ],
      ],
    ],
    'as access' => [
      'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'lang/*',
            'index/*',
            'admin/user/*',
//         'gii/*',
//            'admin/*',
        ],

    ],
    'params' => $params,
];

return $config;