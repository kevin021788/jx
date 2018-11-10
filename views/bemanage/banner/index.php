<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\editable\Editable;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('common', 'Banners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <!--        --><?//= Html::a(Yii::t('app', 'Create Project'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">

        <?php
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\CheckboxColumn',
                'name' => 'id',
            ],
            [
                'attribute' => 'name',
                'class' => 'kartik\grid\EditableColumn',
                'editableOptions'=>[
                    'asPopover' => false,
                    'inputType'=> Editable::INPUT_TEXTAREA,//只需添加如下代码
                    'options' => [
                        'rows' => 4,
                    ],
                ],
            ],
            [
                'attribute' => 'categoryId',
                'value' => 'category.name',
                'filter' => \app\models\Category::getCategory($this->context->id),
            ],
            [
                'attribute' => 'url',
                'class' => 'kartik\grid\EditableColumn',
                'editableOptions'=>[
                    'asPopover' => false,
                    'inputType'=> Editable::INPUT_TEXTAREA,//只需添加如下代码
                    'options' => [
                        'rows' => 4,
                    ],
                ],
            ],
            [
                'attribute' => 'imgUrl',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => 'imgUrl',
                'format' => [
                    'image',
                    [
                        'width' => '30;',
                        'height' => '30'
                    ]
                ],
            ],
            [
                'attribute' => 'sort',
                'class' => 'kartik\grid\EditableColumn',
                'editableOptions'=>[
                    'asPopover' => false,
                    'inputType'=> Editable::INPUT_TEXTAREA,//只需添加如下代码
                    'options' => [
                        'rows' => 4,
                    ],
                ],
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'attribute' => 'created_at',
                    'options' => ['class' => 'input-sm'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]),
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute'=>'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'headerOptions' => ['class' => 'col-md-1'],
            ],
            [
                'attribute' => 'status',
                'class'=>'kartik\grid\EditableColumn',
                'headerOptions' => ['class' => 'col-md-1'],
                'editableOptions'=>[
                    'inputType'=> Editable::INPUT_DROPDOWN_LIST,
                    'asPopover' => false,
                    'data' => dropDown('status'),
                ],
                'value' => function ($model) {
                    return dropDown('status', $model->status);
                },
                'filter' => dropDown('status'),
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
            ]
        ];
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
//            'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
            'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
            'toolbar' =>  [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>',['create'],['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=> Yii::t('common','Create')]). ' '.
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'],[ 'class' => 'btn btn-info','title'=>Yii::t('common','Refresh')]). ' '.
                    Html::a('<i class="glyphicon glyphicon-open"></i> ', "javascript:void(0);", ["class" => "btn btn-primary batchActivity", 'title'=> Yii::t('common','Batch Activity')]). ' '.
                    Html::a('<i class="glyphicon glyphicon-ban-circle"></i> ', "javascript:void(0);", ["class" => "btn btn-default batchUnActivity", 'title'=> Yii::t('common','Batch Disable')]). ' '.
                    Html::a('<i class="glyphicon glyphicon-trash"></i> ', "javascript:void(0);", ["class" => "btn btn-danger batchDelete", 'title'=> Yii::t('common','Batch Delete')])
                ],
                '{export}',
                '{toggleData}'
            ],
            'pjax' => true,
            'bordered' => true,
            'striped' => false,
            'condensed' => false,
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
                'type'=>'info',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('common','Create'), ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success']),
                'after' => Html::beginTag('div',['class'=>'pull-right form-group']).
                    Html::a('<i class="glyphicon glyphicon-open"></i> '.Yii::t('common','Batch Activity'), "javascript:void(0);", ["class" => "btn btn-primary batchActivity"]).
                    Html::a('<i class="glyphicon glyphicon-ban-circle"></i> '.Yii::t('common','Batch Disable'), "javascript:void(0);", ["class" => "btn btn-default batchUnActivity"]).
                    Html::a('<i class="glyphicon glyphicon-trash"></i> '.Yii::t('common','Batch Delete'), "javascript:void(0);", ["class" => "btn btn-danger batchDelete"]).
                    Html::endTag('div').
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> '.Yii::t('common','Refresh'), ['index'], ['class' => 'btn btn-info']),
                'showFooter'=>false
            ],
        ]);

        ?>
    </div>
    <?php Pjax::end(); ?>
</div>
<?php

//注册JS
$this->registerJs('
//批量删除
$(".batchDelete").on("click", function () {
var keys = $("#grid").yiiGridView("getSelectedRows");
var data = {"ids":keys};
var url = "/'.$this->context->id.'/delete-all";
if(keys.length>0)
{
    requestP(url,data);
}
});
//批量启用
$(".batchActivity").on("click", function () {
var keys = $("#grid").yiiGridView("getSelectedRows");
var data = {"ids":keys,"status":1};
var url = "/'.$this->context->id.'/change-status";
if(keys.length>0)
{
    requestP(url,data);
}
});
//批量禁用
$(".batchUnActivity").on("click", function () {
var keys = $("#grid").yiiGridView("getSelectedRows");
var data = {"ids":keys,"status":0};
var url = "/'.$this->context->id.'/change-status";
if(keys.length>0)
{
    requestP(url,data);
}
});
function requestP(url,data)
{
    request(url,data,function(json){
        if(json.code==200)
        {
            krajeeDialog.alert(json.msg);
            window.location.reload();
        }
        else
        {
            krajeeDialog.alert(json.msg);
        }
    });
}

window.request = function(url, data, callback) {
    $.ajax({
        type: "post",
        async: false,
        url: url,
        dataType: "jsonp",
        // jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(一般默认为:callback)
        jsonCallback: \'data.toString()\',
        data: data,
        // jsonpCallback:"?",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名，也可以写"?"，jQuery会自动为你处理数据
        success: function(json) {
            callback(json);
        },
        error: function(err) {
            callback(false)
        }
    });
}
');
?>

