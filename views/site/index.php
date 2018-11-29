<?php
$this->title = $config['WEB_SITE_TITLE'];
$ct = yiiParams('ct');
?>
<!-- Banner -->
<?= $this->render('banner',['banner'=>$banner])?>
<div class="page-index">
    <div class="product-type-ajax">
        <div class="col-xs-12 col-sm-12 text-center" style="width: 100%; text-align: center">
            <ul id="myTab" class="nav nav-tabs sban">
                <li class="col-xs-12 col-sm-2"></li>
                <li class="active col-xs-6 col-sm-4">
                    <a href="#service" data-toggle="tab" class="sdw">
                        <img src="/img/ban1.jpg">
                    </a>
                    <div class="title col-xs-10 col-sm-10 text-center box-shadow">
                        <a href="#service" data-toggle="tab"><?=Yii::t('home','Shipping')?></a>
                    </div>
                </li>

                <li class="col-xs-6 col-sm-4">
                    <a href="#product" data-toggle="tab" class="sdw">
                        <img src="/img/ban2.jpg">
                    </a>
                    <div class="title col-xs-10 col-sm-10 text-center box-shadow">
                        <a href="#product" data-toggle="tab"><?=Yii::t('home','Service')?></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
        <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="service">
                    <ul class="f-cb">
                        <?php foreach($service as $k=>$v):
                            $b = $k%4;
                            ?>
                            <li class="<?=$ct[$b]?> col-xs-6 col-sm-4">
                                <p class="pic">
                                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v['id'])?>">
                                        <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                                    </a>
                                </p>
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
                        <li class="<?=$ct[$b]?> col-xs-6 col-sm-4">
                            <p class="pic">
                                <a href="<?php echo yiiUrl('/site/product-detail?id='.$v['id'])?>">
                                    <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>">
                                </a>
                            </p>
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
                    echo "<li class='col-xs-5 col-md-2 text-center'>$l</li>";
                }
                echo '</ul></div><div class="clear"></div>';
            }
            ?>
            <div class="pic col-xs-12 col-sm-6 fr"><a href="<?=$about['video']?>" target="_blank"><img src="/img/pc.png"></a></div>
            <div class="des col-xs-12 col-sm-6 fl"><?=$about['desc']?></div>
            <div class="clear"></div>
            <div style="height: 50px;"></div>
            <div class="more-btn col-xs-12 col-sm-12"><a href="<?=yiiUrl('site/about')?>" class="more"><?=Yii::t('home','More')?><img class="jt" src="/img/jt.png"> </a> </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="container">
        <h1 class="title"><span><?=Yii::t('home','News')?></span></h1>
        <div class="news">
            <ul class="f-cb news-list">
                <?php foreach($news as $k=>$v):
                    ?>
                    <li class="col-xs-12 col-sm-6">
                        <a href="<?php echo yiiUrl('/site/news-detail?id='.$v['id'])?>" class="box-shadow">
                            <p class="pic col-xs-12 col-sm-4">
                                <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="bg">
                                <img src="<?= empty($v['imgUrl'])?'/img/logo.png':$v['imgUrl'];?>" alt="<?=$v['name']?>" class="picture">
                            </p>
                            <span class="con col-xs-12 col-sm-8">
    							<h2><?=$v['name']?></h2>
    							<div class="font">
                                    <?=$v['desc']?></div>
    						</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div style="height: 50px;"></div>
            <div class="col-xs-2 col-md-5"></div>
            <div class="col-xs-8 col-md-2"><a class="more text-center" href="<?=yiiUrl('site/news')?>"><?=Yii::t('home','More')?></a></div>
            <div class="col-xs-2 col-md-5"></div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
