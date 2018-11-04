<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\slider $model
 */

$this->title = '编辑轮播图组: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '轮播图组', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
