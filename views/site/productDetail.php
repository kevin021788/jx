<?php

/* @var $this yii\web\View */

$this->title = Yii::t('home','Product List');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['product']];
$this->params['breadcrumbs'][] = $model['name'];
?>

<div class="news-info w1180">
    <?= $this->render('banner',['banner'=>$banner])?>

    <h1 class="title"><span><?=Yii::t('home','Product')?></span></h1>
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
                    <li class="<?=$catId==$v['id']?'cur':''?>"><a href="<?=yiiUrl('/site/product?cat_id='.$v['id'])?>"><?=$v['name']?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
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
