<?php
$this->title = $config['WEB_SITE_TITLE'];
$ct = yiiParams('ct');
?>

<div class="page-index">
  <!-- Banner -->
    <?= $this->render('banner',['banner'=>$banner])?>


    <div class="product-type-ajax">


        <div class="col-xs-12 col-sm-12 text-center" style="width: 100%; text-align: center">
            <ul id="myTab" class="nav nav-tabs sban">
                <li class="col-xs-12 col-sm-2"></li>
                <li class="active col-xs-12 col-sm-4"><a href="#service" data-toggle="tab"><img src="/img/ban1.jpg"></a><div class="title col-xs-10 col-sm-10 text-center"><?=Yii::t('home','Shipping')?></div></li>
<!--                <li class="col-xs-12 col-sm-1"></li>-->

                <li class="col-xs-12 col-sm-4"><a href="#product" data-toggle="tab"><img src="/img/ban2.jpg"></a><div class="title col-xs-10 col-sm-10 text-center"><?=Yii::t('home','Service')?></div></li>
            </ul>
        </div>
        <div class="clear"></div>

        <div id="myTabContent" class="tab-content">


                <div class="tab-pane fade in active" id="service">

                    <ul class="f-cb">
                        <?php foreach($service as $k=>$v):
                            $b = $k%4;
                            ?>
                            <li class="<?=$ct[$b]?> col-xs-12 col-sm-4">
                                <p class="pic">
                                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v['id'])?>">
                                        <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                                    </a>
                                </p>
<!--                                <a href="javascript:;" class="shopping" data-link="" data-img=""><span>--><?//=Yii::t('home','View Detail')?><!--</span></a>-->
                                <div class="text-center">
                                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v['id'])?>">
                                        <h2><?=$v['name']?></h2>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            <div class="tab-pane fade in" id="product">

                <ul class="f-cb">
                    <?php foreach($product as $k=>$v):
                        $b = $k%4;
                        ?>
                        <li class="<?=$ct[$b]?> col-xs-12 col-sm-4">
                            <p class="pic">
                                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                                </a>
                            </p>
<!--                            <a href="javascript:;" class="shopping" data-link="" data-img=""><span>--><?//=Yii::t('home','View Detail')?><!--</span></a>-->
                            <div class="text-center">
                                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                                    <h2><?=$v['name']?></h2>
                                </a>
                            </div>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>

        </div>


    </div>
    <div class="clear"></div>

    <div class="about">
        <h1 class="title"><span><?=Yii::t('home','About Us')?></span></h1>
        <div class="container">
            <?php
            if($about['hkey'])
            {
                echo '<div class="key col-xs-12 col-sm-12"><ul>';
                $ls = explode(',',$about['hkey']);
                foreach ($ls as $l) {
                    echo "<li>$l</li>";
                }
                echo '</ul></div><div class="clear"></div>';
            }
            ?>

            <div class="des col-xs-12 col-sm-6"><?=$about['desc']?></div>
            <div class="pic col-xs-12 col-sm-6"><a href="<?=$about['video']?>" target="_blank"><img src="/img/pc.png"></a></div>
            <div class="more-btn col-xs-12 col-sm-12"><a href="<?=yiiUrl('site/about')?>" class="more"><?=Yii::t('home','More')?></a> </div>
            <div class="clear"></div>
        </div>
    </div>


    <div class="container">
        <h1 class="title"><span><?=Yii::t('home','News')?></span></h1>
        <div class="news">
            <ul class="f-cb news-list">
                <?php foreach($news as $v): ?>
                    <li class=" col-xs-12 col-sm-6">
                        <a href="<?php echo yiiUrl('/site/news-detail?id='.$v['id'])?>">
                            <p class="pic col-xs-12 col-sm-4">
                                <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="bg">
                                <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="picture">
                            </p>
                            <span class="con col-xs-12 col-sm-8">
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
