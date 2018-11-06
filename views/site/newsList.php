<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = Yii::t('home','News List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news w1180">
    <ul class="f-cb news-list">

        <?php foreach($list as $v): ?>
        <li>
            <a href="<?php echo yiiUrl('/site/news-detail?id='.$v['id'])?>">
                <p class="pic">
                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="bg">
                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="picture">
                </p>
                <span class="con">
    							<h3><?=empty($v['created_at'])?'':date('m-d',$v['created_at']) ?></h3>
    							<h2><?=$v['name']?></h2>
    							<div class="font">
                                    <?=$v['desc']?></div>
    						</span>
            </a>
        </li>

        <?php endforeach; ?>
    </ul>
    <?php echo LinkPager::widget(['pagination'=>$pages]);?>

</div>
</div>

