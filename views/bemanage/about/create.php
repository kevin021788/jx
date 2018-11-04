<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\About */

$this->title = Yii::t('common', 'Create About');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Abouts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
