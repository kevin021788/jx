<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\slider $model
 */

$this->title = '添加轮播图组';
$this->params['breadcrumbs'][] = ['label' => '轮播图组', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
