<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = Yii::t('home','Service List');
$this->params['breadcrumbs'][] = $this->title;
$ct = [
    0 => 'one',
    1 => 'two',
    2 => 'the',
    3=>'four',
];
?>
<div class="news w1180">
    <?= $this->render('banner',['banner'=>$banner])?>
    <h1 class="title"><span><?=Yii::t('home','Service')?></span></h1>
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
                    <li class="<?=$catId==$v['id']?'cur':''?>"><a href="<?=yiiUrl('/site/service?cat_id='.$v['id'])?>"><?=$v['name']?></a></li>
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

<div class="product-type-ajax"><ul class="f-cb">

        <?php foreach($list as $k=>$v):
            $b = $k%4;
            ?>

            <li class="<?=$ct[$b]?>">
                <p class="pic">
                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v['id'])?>">
                        <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                    </a>
                </p>
                <a href="javascript:;" class="shopping" data-link="" data-img=""><span><?=Yii::t('home','View Detail')?></span></a>
                <div class="con">
                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v['id'])?>">
                        <h2><?=$v['name']?></h2>
                    </a>
                </div>
            </li>


        <?php endforeach; ?>
    </ul>

</div>
<div class="clear"></div>
<?php echo LinkPager::widget(['pagination'=>$pages]);?>
