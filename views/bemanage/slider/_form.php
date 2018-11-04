<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\slider $model
 * @var yii\widgets\ActiveForm $form
 */
 $previmage = [];
 $baseurl = Yii::$app->request->BaseUrl;
 $imgurl = $model->__get('imgurl');
 if(!empty($imgurl)) {
   $image_url = $baseurl.$imgurl;
   $previmage[] = Html::img("$image_url",  ['class'=>'file-preview-image', 'width'=>300]);
   $config = [
     'caption' => $imgurl,
     'width' => '300px',
     'url' => '/bemanage/upload/delete-pic',
     'key' => $image_url,
     'extra' => ['imgurl' => $imgurl]
   ];
 }
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL, 'options'=>['enctype'=>'multipart/form-data']]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'imgurl' => ['type'=> Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\file\FileInput', 'options'=>[
              'name' => 'imgurl',
              'options' => ['accept' => 'image/*'],
              'pluginOptions' => [
                'allowedFileExtensions'=>['jpg','jpeg','gif','png'],
                'initialPreview'=>$previmage,
                'overwriteInitial'=>false,
                'showUpload' => false,
              ]
              ]],

            'adurl'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'跳转网址', 'maxlength'=>255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? '保存' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
