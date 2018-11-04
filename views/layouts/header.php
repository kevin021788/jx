<?php
use yii\helpers\Html;
use app\components\message\Language;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">管理</span><span class="logo-lg">后台管理</span>', '/bemanage/index', ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <?php
            $menuItems[] = Language::getLanguageItems();
            echo \yii\bootstrap\Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            ?>
            <ul class="nav navbar-nav">
              <?php if(!Yii::$app->user->isGuest): ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/img/user.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?=Yii::$app->user->identity->username?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/admin/user/change-password" class="btn btn-default btn-flat">修改密码</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '注销登录',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
              <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
