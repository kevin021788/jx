<?php
$this->title = '球队详情';

?>

<div class="team-detail">
  <div class="team-detail-head">
    <div class="item-title"><?=$teaminfo['name']?></div>
    <div class="item-title">球队口号：<?=$teaminfo['slogan']?></div>
    <div class="item-title">成立于<?=$teaminfo['fdate']?></div>
    <div class="item-title"><?=$teaminfo['faddres']?></div>
    <div class="item-title">队长：<?=$teaminfo['captain']?></div>
  </div>
  <div style="position:relative;right:10px;top:-40px;float:right;display:inline-block;">
    <?php if($teamleader): ?>
      <a href="/admin/" class="external">
        <img src="<?=$teaminfo['logourl']?>" style="width:4rem;height:4rem;" />
      </a>
    <?php else: ?>
      <img src="<?=$teaminfo['logourl']?>" style="width:4rem;height:4rem;" />
    <?php endif; ?>
  </div>
  <div style="text-align:center;color:#0660B7;border-right:1px #A6A6A6 solid;margin-right:82%;">
    队员<br><?=count($teaminfo['teammember'])?>
  </div>
</div>

<div class="member-list">
  <div class="news-title">
    <span class="title-prefix2" style="background-color:#8ae7e7"></span><b>球队成员</b>
  </div>
  <div class="member-item">
    <ul>
      <?php foreach($teaminfo['teammember'] as $member): ?>
      <li>
        <img src="<?= empty($member['icon']) ? '/img/user.png' : $member['icon'] ?>">
        <div class="item-subtitle"><?=$member['name']?></div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<div class="inimg">
  <div class="list-block">
    <ul>
      <div class="news-title">
        <span class="title-prefix2" style="background-color:#ff918f"></span><b>球队赛程</b>
      </div>
      <div style="font-size:.75rem">
        <li>
          <div class="item-content">
            <div class="item-inner">
              <div class="col-50">赛程</div>
              <div class="col-25">时间</div>
            </div>
          </div>
        </li>
        <?php foreach($competitions as $competition): ?>
          <li>
            <a href="/site/competition-detail?cid=<?=$competition['id']?>" class="item-link">
              <div class="item-content">
                <div class="item-inner">
                  <div class="col-70"><?=$competition['name']?></div>
                  <div class="col-30">
                    <?=explode(' ', $competition['time'])[0]?>
                  </div>
                </div>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </div>
    </ul>
  </div>
</div>

<div class="inimg">
  <div class="list-block">
    <ul>
      <div class="news-title">
        <span class="title-prefix2" style="background-color:#ffc295"></span><b>球队成绩</b>
      </div>
      <div style="font-size:.75rem">
        <li>
          <div class="item-content">
            <div class="item-inner">
              <div class="col-20">序号</div>
              <div class="col-30">赛事名称</div>
              <div class="col-25">总杆数</div>
              <div class="col-25">排名</div>
            </div>
          </div>
        </li>
        <?php $i = 1; ?>
        <?php foreach($scores as $score): ?>
        <li>
          <div class="item-content">
            <div class="item-inner">
              <div class="col-20"><?=$i?></div>
              <div class="col-30"><?=str_replace("2016“前创汇杯”广东业余高尔夫球队际公开赛","",$score['competition'])?></div>
              <div class="col-25"><?=$score['score']?></div>
              <div class="col-25"><?=$score['ranking']?></div>
            </div>
          </div>
        </li>
        <?php ++$i; ?>
        <?php endforeach; ?>
      </div>
    </ul>
  </div>
</div>
