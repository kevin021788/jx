<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */

$previmage = [];
$baseurl = Yii::$app->request->BaseUrl;
$imgUrl = $model->__get('imgUrl');
if(!empty($imgUrl)) {
    $image_url = $baseurl.$imgUrl;
    $previmage[] = Html::img("$image_url",  ['class'=>'file-preview-image', 'width'=>300]);
    $config = [
        'caption' => $imgUrl,
        'width' => '300px',
        'url' => '/bemanage/upload/delete-pic',
        'key' => $image_url,
        'extra' => ['imgurl' => $imgUrl]
    ];
}
$category = isset($related['category'])?ArrayHelper::getValue($related['category'],'id'):'';//单选时用字符值
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL, 'options'=>['enctype'=>'multipart/form-data']]);
    $mo = \app\models\Config::findOne(['name'=>'WEB_SITE_ALLOW_UPLOAD_TYPE','language'=>\app\components\message\Language::getLanguageNum()]);
    $allow_type = explode(',', $mo->value);
    echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,

        'attributes' => [

            'name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=> Yii::t('common','Please input name ...'), 'maxlength'=>255]],

            'cat_id' => ['type'=> Form::INPUT_WIDGET, 'widgetClass'=> Select2::className(), 'options'=>[
                'name' => 'cat_id',
                'value' => $category,
                'data' => \app\models\Category::getCategory($this->context->id),
                'options' => ['placeholder' => Yii::t('common','Select a Category ...')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false,//多选时为TRUE，单选时为FALSE
                ]
            ]],

            'desc'=>['type'=> Form::INPUT_TEXTAREA, 'options'=>['placeholder'=> Yii::t('common','Please input describe ...'), 'maxlength'=>255]],


            'content'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'kucha\ueditor\UEditor', 'options'=>[
                'clientOptions' => [
                ]
            ]],



            'imgUrl' => ['type'=> Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\file\FileInput', 'options'=>[
                'name' => 'imgUrl',
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => $allow_type,
                    'initialPreview'=>$previmage,
                    'overwriteInitial'=>false,
                    'showUpload' => false,
                ]
            ]],
        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','style'=>'align:center']);
    ActiveForm::end(); ?>


</div>
