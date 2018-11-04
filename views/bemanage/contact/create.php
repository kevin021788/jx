<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = Yii::t('common', 'Create Contact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
