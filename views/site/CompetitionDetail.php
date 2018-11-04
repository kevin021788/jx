<?php
$this->title = '赛程详情';
?>

<div class="card">
  <div valign="bottom" class="card-header color-white no-border no-padding">
    <img class='card-cover' src="<?=$competition['imgurl']?>">
  </div>
  <div class="card-content">
    <div class="card-content-inner">
      <div class="item-title" style="font-size:16px;font-weight:bold;margin-top:-6px;text-align:center;"><?=$competition['name']?></div>
      <div class="item-subtitle">时间： <?=$competition['time']?></div>
      <div class="item-subtitle">地点： <?=$competition['addres']?></div>
      <div class="item-subtitle">参赛球队： <?=$competition['teams']?></div>
      <div class="item-subtitle">
        奖项设置：<?=$competition['awards']?>
      </div>
      <div class="item-subtitle">
        赛事费用：<?=$competition['expenses']?>
      </div>
      <div class="item-subtitle">
        联系人：<?=$competition['tel']?>
      </div>
    </div>
  </div>
</div>
