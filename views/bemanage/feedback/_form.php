<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */

$previmage = [];
$baseurl = Yii::$app->request->BaseUrl;
$imgUrl = $model->__get('imgUrl');
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL, 'options'=>['enctype'=>'multipart/form-data']]);
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,

        'attributes' => [

            'name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=> Yii::t('common','Please input name ...'), 'maxlength'=>255]],


            'tel'=>['type'=> Form::INPUT_TEXTAREA, 'options'=>['placeholder'=> Yii::t('common','Please input tel ...'), 'maxlength'=>255]],
            'phone'=>['type'=> Form::INPUT_TEXTAREA, 'options'=>['placeholder'=> Yii::t('common','Please input phone ...'), 'maxlength'=>255]],
            'email'=>['type'=> Form::INPUT_TEXTAREA, 'options'=>['placeholder'=> Yii::t('common','Please input email ...'), 'maxlength'=>255]],


            'content'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'kucha\ueditor\UEditor', 'options'=>[
                'clientOptions' => [
                ]
            ]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','style'=>'align:center']);
    ActiveForm::end(); ?>


</div>
