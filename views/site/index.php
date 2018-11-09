<?php
$this->title = $config['WEB_SITE_TITLE'];
?>

<div class="page-index">
  <!-- Banner -->
    <?= $this->render('banner',['banner'=>$banner])?>

    <div class="product-type-ajax">
        <h1 class="title"><span><?=Yii::t('home','Service Item')?></span></h1>
        <?php
        $ct = yiiParams('ct');
        ?>
        <ul class="f-cb">
            <?php foreach($service as $k=>$v):
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
                    <div class="clear"></div>
                </li>

            <?php endforeach; ?>
        </ul>

    </div>
    <div class="clear"></div>

    <div class="product-type-ajax">
        <h1 class="title"><span><?=Yii::t('home','Product Display')?></span></h1>
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
            <div class="des"><?=$about['desc']?></div>
            <div class="pic"><img src="<?=empty($about['imgUrl'])?"/img/pc.png":$about['desc']?>"></div>
        </div>
    </div>


    <div class="container">
        <h1 class="title"><span><?=Yii::t('home','News')?></span></h1>
        <div class="news">
            <ul class="f-cb news-list">
                <?php foreach($news as $v): ?>
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

        </div>
    </div>
</div>



</div>
