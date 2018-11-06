<?php

/* @var $this yii\web\View */

$this->title = Yii::t('home','News List');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['news']];
$this->params['breadcrumbs'][] = $model['name'];
?>

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
