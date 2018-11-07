<?php
$this->title = $config['WEB_SITE_TITLE'];
//$this->keyword = $config['WEB_SITE_KEYWORD'];
//$this->description = $config['WEB_SITE_DESCRIPTION'];
//dd($config);
// print_r($this);exit;
// print_r($albums);exit;
?>

<div class="page-index">
  <!-- Banner -->
    <?= $this->render('banner',['banner'=>$banner])?>

<!---->
<!--    <div class="container">-->
<!--        <div class="container1">-->
<!--            <ul class="sban">-->
<!--                <li><img src="/img/ban1.jpg">-->
<!--                    <div class="title">air transport</div>-->
<!--                </li>-->
<!--                <li><img src="/img/ban2.jpg">-->
<!--                    <div class="title">Miner</div>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->


    <div class="product-type-ajax">
        <h1 class="title"><span><?=Yii::t('home','Service')?></span></h1>
        <?php
        $ct = yiiParams('ct');
        ?>
        <ul class="f-cb">
            <?php foreach($service as $k=>$v):
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

    <div class="product-type-ajax">
        <h1 class="title"><span><?=Yii::t('home','Product')?></span></h1>
        <?php
        $ct = yiiParams('ct');
        ?>
        <ul class="f-cb">
            <?php foreach($product as $k=>$v):
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

    <div class="about">
        <h1 class="title"><span><?=Yii::t('home','About')?></span></h1>

        <div class="container">
            aboutklasdjf;laksdjf;
        </div>
    </div>


    <div class="container">
        <div class="news"></div>
    </div>
</div>



</div>
