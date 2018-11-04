<?php

/* @var $this yii\web\View */

$this->title = '球队';
?>
<div class="bar">
  <div class="searchbar">
    <a class="searchbar-cancel">取消</a>
    <div class="search-input">
      <form action="/site/team-search" method="post">
      <label class="icon icon-search" for="search"></label>
      <input type="search" id='search' name="search" placeholder='搜索球队、队员'/>
      <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    </form>
    </div>
  </div>
</div>

<div class="list-block media-list" style="margin-top:40px;">
  <ul>
    <?php foreach ($teams as $team): ?>
    <li>
      <a href="/site/team-detail?tid=<?=$team['id']?>" class="item-link item-content">
        <div class="item-media"><img src="<?=$team['logourl']?>" style='width: 4rem;'></div>
        <div class="item-inner">
          <div class="item-title-row">
            <div class="item-title"><?=$team['name']?></div>
          </div>
          <div class="item-subtitle"><?=$team['fdate']?> 成立于<?=$team['faddres']?></div>
          <div class="item-subtitle">参赛人数 <?=count($team['teammember'])?> 名</div>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
