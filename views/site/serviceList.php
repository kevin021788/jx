<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = Yii::t('home','Service List').' | '.$this->params['config']['WEB_SITE_TITLE'];
$this->params['breadcrumbs'][] = $this->title;
$ct = yiiParams('ct');
?>
<?= $this->render('banner',['banner'=>$banner])?>

<div class="news w1180">
    <h1 class="title"><span><?=Yii::t('home','Shipping')?></span></h1>
    <?php
    if($category)
    {
        ?>
        <div class="category">
            <div class="col-xs-12 col-sm-3"></div>
            <ul class="col-xs-12 col-sm-6">
                <?php
                $catId = Yii::$app->request->get('cat_id', '');
                foreach ($category as $k=>$v)
                {
                    if(empty($v)) continue;
                    ?>
                    <li class="<?=$catId==$v['id']?'cur':''?> col-xs-6 col-sm-6 text-center"><a href="<?=yiiUrl('/site/service?cat_id='.$v['id'])?>"><?=$v['name']?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
    <div class="clear"></div>
    <ul class="f-cb news-list">
        <?php foreach($list as $v): ?>
            <li class="service-li col-xs-12 col-sm-6">
                <a href="<?php echo yiiUrl('/site/service-detail?id='.$v['id'])?>">
                    <p class="pic col-xs-12 col-sm-3">
                        <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="bg">
                        <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="picture">
                    </p>
                    <span class="con col-xs-12 col-sm-9">
<!--    							<h3>--><?//=empty($v['created_at'])?'':date('m-d',$v['created_at']) ?><!--</h3>-->
    							<h2><?=$v['name']?></h2>
    							<div class="font">
                                    <?=$v['desc']?> [<?=Yii::t('home','More')?>]</div>
    						</span>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>


</div>
<div class="clear"></div>
<div class="page">
    <?php if(isset($pages)) echo LinkPager::widget(['pagination'=>$pages]);?>
</div>
<div class="clear"></div>
