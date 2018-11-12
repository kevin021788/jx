<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = Yii::t('home','News List').' | '.$this->params['config']['WEB_SITE_TITLE'];
$banner = \app\models\Banner::getBanner('news');
?>
<div class="news w1180">
    <?= $this->render('banner',['banner'=>$banner])?>
    <h1 class="title"><span><?=Yii::t('home','News')?></span></h1>
    <?php
    if($category)
    {
        ?>
        <div class="category">
            <ul>
                <?php
                $catId = Yii::$app->request->get('cat_id', '');
                foreach ($category as $k=>$v)
                {
                    if(empty($v)) continue;
                    ?>
                    <li class="<?=$catId==$v['id']?'cur':''?> col-xs-6 col-sm-2 text-center"><a href="<?=yiiUrl('/site/news?cat_id='.$v['id'])?>"><?=$v['name']?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
    <ul class="f-cb news-list">
        <?php foreach($list as $v): ?>
        <li class=" col-xs-12 col-sm-12">
            <a href="<?php echo yiiUrl('/site/news-detail?id='.$v['id'])?>">
                <p class="pic col-xs-12 col-sm-3">
                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="bg">
                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="picture">
                </p>
                <span class="con col-xs-12 col-sm-9">
    							<h3><?=empty($v['created_at'])?'':date('m-d',$v['created_at']) ?></h3>
    							<h2><?=$v['name']?></h2>
    							<div class="font">
                                    <?=$v['desc']?></div>
    						</span>
            </a>
        </li>

        <?php endforeach; ?>
    </ul>


</div>
<div class="clear"></div>
<div class="page">
    <?php echo LinkPager::widget(['pagination'=>$pages]);?>
</div>
<div class="clear"></div>
