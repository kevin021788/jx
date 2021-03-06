<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = Yii::t('home','Product List').' | '.$this->params['config']['WEB_SITE_TITLE'];
$this->params['breadcrumbs'][] = $this->title;
$ct = yiiParams('ct');
?>
<?= $this->render('banner',['banner'=>$banner])?>

<div class="news w1180">
    <h1 class="title"><span><?=Yii::t('home','Service')?></span></h1>
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
                    <li class="<?=$catId==$v['id']?'cur':''?> col-xs-6 col-sm-6 text-center"><a href="<?=yiiUrl('/site/product?cat_id='.$v['id'])?>"><?=$v['name']?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
</div>
<div class="clear"></div>
<div class="product-type-ajax">

    <ul class="f-cb">
        <?php foreach($list as $k=>$v):
            $b = $k%4;
            ?>
        <li class="<?=$ct[$b]?> col-xs-12 col-sm-3">
            <p class="pic">
                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                </a>
            </p>
<!--            <a href="javascript:;" class="shopping" data-link="" data-img=""><span>--><?//=Yii::t('home','View Detail')?><!--</span></a>-->
            <div class="text-center">
                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                    <h2><?=$v['name']?></h2>
                </a>
            </div>
        </li>


        <?php endforeach; ?>
    </ul>


</div>
<div class="clear"></div>
<div class="page">
    <?php if(isset($pages)) echo LinkPager::widget(['pagination'=>$pages]);?>
</div>
<div class="clear"></div>
