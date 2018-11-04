<?php

// comment out the following two lines when deployed to production
if ($_SERVER ['HTTP_HOST'] == 'gdpub.justgolf.cn' || $_SERVER ['HTTP_HOST'] == 'gdpub.justgolf.cn') {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/config/function.php');
require(__DIR__ . '/components/helpers/helper.php');
$config = require(__DIR__ . '/config/web.php');

$application = new yii\web\Application($config);
$application -> language = isset(\Yii::$app->session['lang']) ? \Yii::$app->session['lang'] : 'en-US';
$application->run();