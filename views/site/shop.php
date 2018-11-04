<?php

/* @var $this yii\web\View */

$this->title = '合作商家';
?>
<img src="/pic/shop_banner.png" style="width:100%;">

<div class="content-padded">

  <?php for($i = 0; $i < count($shops); ): ?>
  <div class="row">
  <?php for($j=0; $j<2 && $i<count($shops); $j++): ?>
    <div class="col-50">
      <a href="<?= empty($shops[$i]['adurl']) ? ('/site/shop-detail?sid='.$shops[$i]['id']) : $shops[$i]['adurl'] ?>" class="item-link item-content<?=isset($shops[$i]['adurl'])?' external':''?>" style="color:black;">
        <div style="background-color:white;font-size:14px;text-align:center;">
          <img src="<?=$shops[$i]['goodurl']?>" style="width:100%;">
          <div class="item-subtitle"><?=$shops[$i]['name']?></div>
          <div class="item-subtitle">联系: <?=$shops[$i]['tel']?></div>
        </div>
      </a>
    </div>
    <?php ++$i; ?>
  <?php endfor; ?>
  </div>
<?php endfor; ?>

</div>
