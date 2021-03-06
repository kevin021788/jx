<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\alert\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$config = Yii::$app->cache->get('config_'.\app\components\message\Language::getLanguageNum());
if(empty($config))
{
    $config = getWebConfig();
    Yii::$app->cache->set('config_' . \app\components\message\Language::getLanguageNum(),$config);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="<?=Html::encode($config['WEB_SITE_KEYWORD'])?>">
    <meta name="description" content="<?=Html::encode($config['WEB_SITE_DESCRIPTION'])?>">
    <link href="/css/web.css" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">


    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/img/logo.png">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left nav'],
        'encodeLabels' => false,
        'items' => [
            ['label' => Yii::t('home','Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('home','About Us'), 'url' => ['/site/about']],
            ['label' => Yii::t('home','Shipping'), 'url' => ['/site/service']],
            ['label' => Yii::t('home','Service'), 'url' => ['/site/product']],
            ['label' => Yii::t('home','News'), 'url' => ['/site/news']],
            ['label' => Yii::t('home','Contact Us'), 'url' => ['/site/contact']],
            ['label' => '<i style="vertical-align: middle;" class="lang-flag flag-'.(\app\components\message\Language::getLanguageNum()==2 ? 'en-US' : 'fa') .'"></i>'.Yii::t('home',(\app\components\message\Language::getLanguageNum()==2) ? 'English' : 'Farsi' ),
                'items' => (\app\components\message\Language::getLanguageNum()==2)?[
                    ['label' => '<i style="vertical-align: middle;" class="lang-flag flag-fa"></i>'.Yii::t('home','Farsi'), 'url' => ['/lang/language?lang=fa'],'options' => ['class' =>'lang'],],
                ]:[
                    ['label' => '<i style="vertical-align: middle;" class="lang-flag flag-en-US"></i>'.Yii::t('home','English'), 'url' => ['/lang/language?lang=en-US'],'options' => ['class' =>'lang'],],
                ],
                'options' => ['class' =>'lang'],
            ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="page-top"></div>
<!--        --><?//= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="footer-nav">
        <ul class="tool container">
            <li class="col-xs-12 col-md-3"><i class="tel"></i><?= Html::encode($config['WEB_SITE_TEL'])?></li>
            <li class="col-xs-12 col-md-3"><i class="mail"></i><?= Html::encode($config['WEB_SITE_MAIL'])?></li>
            <li class="col-xs-12 col-md-6" style="overflow: hidden; height: 70px;"><i class="address"></i><?= Html::encode($config['WEB_SITE_ADDRESS'])?></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="footer-logo ol-xs-12 col-md-12">
        <div class="col-xs-12 col-md-4"></div>
        <div class="col-xs-12 col-md-4"><img src="/img/footer-logo.png"></div>
        <div class="col-xs-12 col-md-4"></div>
    </div>
    <div class="clear"></div>
    <div class="footer-copyright"><?= Html::encode($config['WEB_SITE_COPYRIGHT'])?></div>
</footer>
<?php $this->endBody() ?>
<script language="JavaScript" src="http://code.54kefu.net/kefu/js/b16/1063416.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
<?php $this->endPage() ?>
