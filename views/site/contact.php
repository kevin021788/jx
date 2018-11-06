<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('home','Contact Us');
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="site-contact">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=$model['content']?>
</div>
