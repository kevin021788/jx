<?php

/* @var $this yii\web\View */

$this->title = '新闻中心';
?>

<div style="margin-top:20px;margin-bottom:20px;text-align:center;">
<h3><?=$newsdetail['title']?></h3>
<span style="font-size:12px;color:#2cd96d"><?=date('Y-m-d H:i:s', $newsdetail['time'])?></span>
</div>

<div style="text-align:center;">
  <img src="<?=$newsdetail['imgurl']?>" style="width:88%;">
</div>

<div class="content-padded news-detail">
  <?=$newsdetail['content']?>
</div>
