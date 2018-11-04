<?php

/* @var $this yii\web\View */

$this->title = '赛事影集列表';
?>

<header class="bar bar-nav">
  <a class="icon icon-refresh pull-right"></a>
  <h1 class="title">赛事影集</h1>
</header>

<div class="list-block">
  <ul>
    <?php foreach($albums as $album): ?>
        <li class="item-content">
          <div class="item-inner" id="album_<?=$album['id']?>">
            <div class="item-title" style="font-size:14px"><?=$album['title']?></div>
            <div class="item-after" style="font-size:12px"><?=date('m-d', $album['time'])?></div>
          </div>
        </li>
    <?php endforeach; ?>
  </ul>
</div>
