<?php

/* @var $this yii\web\View */

$this->title = $model['name'].' | '.Yii::t('home','Product List').' | '.$this->params['config']['WEB_SITE_TITLE'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['product']];
$this->params['breadcrumbs'][] = $model['name'];
?>

<div class="news-info w1180">
    <?= $this->render('banner',['banner'=>$banner])?>

    <h1 class="title"><span><?=Yii::t('home','Shopping')?></span></h1>
    <?php
    if($category)
    {
        ?>
        <div class="category">
            <ul>
                <?php
                $catId = $model['cat_id'];
                foreach ($category as $k=>$v)
                {
                    if(empty($v)) continue;
                    ?>
                    <li class="<?=$catId==$v['id']?'cur':''?> col-xs-6 col-sm-2 text-center"><a href="<?=yiiUrl('/site/product?cat_id='.$v['id'])?>"><?=$v['name']?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
    <div class="news-info-title col-xs-12 col-sm-12">
        <h2><?=$model['name']?></h2>
        <div class="box f-cb">
            <a href="javascript:;" class="data fl"><?= empty($model['created_at'])?'':date('Y-m-d', $model['created_at'])?></a>
        </div>
    </div>
    <?php if($model['imgUrl']) {?>
        <div class="img col-xs-12 col-sm-12">
            <img src="<?=$model['imgUrl']?>">
        </div>
    <?php } ?>
    <div class="news-info-con col-xs-12 col-sm-12">
        <?=$model['content']?>
    </div>
</div>
