<?php

/* @var $this yii\web\View */

$this->title = Yii::t('home','Service List');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['service']];
$this->params['breadcrumbs'][] = $model['name'];
?>
<div class="page-top"></div>
<div class="news-info w1180">
    <div class="news-info-title">
        <h2><?=$model['name']?></h2>
        <div class="box f-cb">
            <a href="javascript:;" class="data fl"><?= empty($model['created_at'])?'':date('Y-m-d H:i:s', $model['created_at'])?></a>
        </div>
    </div>
    <div class="news-info-con">
        <?=$model['content']?>

    </div>

</div>
