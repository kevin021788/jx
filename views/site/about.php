<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('home','About Us');
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="site-about">
    <?= $this->render('banner',['banner'=>$banner])?>
    <h1 class="title"><span><?= Html::encode($this->title) ?></span></h1>

    <?=$model['content']?>
</div>
