<?php
$this->title = $config['WEB_SITE_TITLE'];
?>

<div class="page-index">
  <!-- Banner -->
    <?= $this->render('banner',['banner'=>$banner])?>

    <div class="product-type-ajax">
        <h1 class="title"><span><?=Yii::t('home','Service Item')?></span></h1>

        <div class="col-xs-12 col-md-12 text-center">
            <ul id="myTab" class="nav nav-tabs">
                <?php
                foreach ($serviceCate as $k=>$v)
                {
                    $b = '';
                    if($k==0) $b = ' class="active"';
                    echo "<li$b><a href=\"#service{$v['id']}\" data-toggle=\"tab\">{$v['name']}</a></li>";
                }
                ?>
            </ul>
        </div>

        <div id="myTabContent" class="tab-content">
            <?php
            $ct = yiiParams('ct');

            foreach ($serviceCate as $k=>$v)
            {
                ?>
                <div class="tab-pane fade in active" id="service<?=$v['id']?>">
                    <?php
                    $service = \app\models\Service::getIndexList(4, $v['id']);
                    ?>
                    <ul class="f-cb">
                        <?php foreach($service as $k1=>$v1):
                            $b = $k1%4;
                            ?>
                            <li class="<?=$ct[$b]?> col-xs-12 col-sm-3">
                                <p class="pic">
                                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v1['id'])?>">
                                        <img src="<?= empty($v1['imgUrl'])?'/img/logo.png':$v1['imgUrl'];?>" alt="<?=$v1['name']?>">
                                    </a>
                                </p>
                                <a href="javascript:;" class="shopping" data-link="" data-img=""><span><?=Yii::t('home','View Detail')?></span></a>
                                <div class="con">
                                    <a href="<?php echo yiiUrl('/site/service-detail?id='.$v1['id'])?>">
                                        <h2><?=$v1['name']?></h2>
                                    </a>
                                </div>
                                <div class="clear"></div>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
            }
            ?>

        </div>


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
                <li class="<?=$ct[$b]?> col-xs-12 col-sm-3">
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
