<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use kartik\touchspin\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <? if($model->isNewRecord) $model->sort = 0; ?>
    <?= $form->field($model, 'sort')->widget(TouchSpin::className(),[
        'pluginOptions' => [
            'verticalbuttons' => true,
        ]
    ]) ?>
    <? if($model->isNewRecord) $model->status = true; ?>
    <?= $form->field($model,'status')->widget(SwitchInput::className(),[
        'pluginOptions'=>[
            'handleWidth' => 60,
            'onText' => Yii::t('common','Activity'),
            'offText' => Yii::t('common','UnActivity'),
        ]
    ])?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Save') : Yii::t('common', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
    </div>

    <?php ActiveForm::end(); ?>

</div>