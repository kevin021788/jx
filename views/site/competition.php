<?php

/* @var $this yii\web\View */

$this->title = '赛程';
?>

<div class="competition-head">
  <span><a href="/site/competition" style="color:white;">赛程</a></span>
  <span style="height:80px; width:1px; border-left:1px #A6A6A6 solid"></span>
  <span><a href="/site/rules">规则</a></span>
</div>

<?php foreach($competitions as $competition): ?>
<div class="card">
  <a href="/site/competition-detail?cid=<?=$competition['id']?>" class="item-link item-content" style="color:black;">
    <div valign="bottom" class="card-header color-white no-border no-padding">
      <img class='card-cover' src="<?=$competition['imgurl']?>">
    </div>
    <div class="roundnumber"><span><?=$competition['teams']?>支</span></div>
    <div class="card-content">
      <div class="card-content-inner">
        <div class="item-title" style="font-size:16px;font-weight:bold;margin-top:-6px;"><?=$competition['name']?></div>
        <div class="item-subtitle" style="color:#404040;">时间： <?=$competition['time']?></div>
        <div class="item-subtitle" style="color:#404040;">地点： <?=$competition['addres']?></div>
      </div>
    </div>
  </a>
</div>
<?php endforeach; ?>
