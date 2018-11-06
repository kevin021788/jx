<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = Yii::t('home','Product List');
$this->params['breadcrumbs'][] = $this->title;
$ct = [
    0 => 'one',
    1 => 'two',
    2 => 'the',
    3=>'four',
];
?>

<div class="product-type-ajax"><ul class="f-cb">
        <?php foreach($list as $k=>$v):
            $b = $k%4;
            ?>
        <li class="<?=$ct[$b]?>">
            <p class="pic">
                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                </a>
            </p>
            <a href="javascript:;" class="shopping" data-link="" data-img=""><span><?=Yii::t('home','View Detail')?></span></a>
            <div class="con">
                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                    <h2><?=$v['name']?></h2>
                </a>
            </div>
        </li>


        <?php endforeach; ?>
    </ul>


</div>
<div class="clear"></div>
<?php echo LinkPager::widget(['pagination'=>$pages]);?>
