<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('home','About Us');
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('banner',['banner'=>$banner])?>

<div class="site-about">
    <h1 class="title"><span><?= Html::encode($this->title) ?></span></h1>
    <div class="clear"></div>

    <?=$model['content']?>
</div>
