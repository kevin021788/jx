<?php

/* @var $this yii\web\View */

$this->title = '新闻中心列表';
?>

<header class="bar bar-nav">
  <h1 class="title">新闻中心</h1>
</header>

<div class="list-block">
  <ul>
    <?php foreach($newslist as $news): ?>
      <a href="/site/news?id=<?=$news['id']?>" class="item-link">
        <li class="item-content">
          <div class="item-inner" style="padding-right:0.5rem">
            <div class="item-title" style="font-size:14px"><?=$news['title']?></div>
            <div class="item-after" style="font-size:12px"><?=date('m-d', $news['time'])?></div>
          </div>
        </li>
      </a>
    <?php endforeach; ?>
  </ul>
</div>
