<?php
$this->title = $system['title'];
// print_r($newses);exit;
// print_r($albums);exit;
?>
<div class="page-index">
  <!-- Title -->
  <div>
    <img src="<?=$system['logo']?>" class="index-title">
  </div>
  <!-- Banner -->
  <div class="index-banner">
    <div class="swiper-container" data-space-between='5' data-pagination='.swiper-pagination' data-speed="600" data-autoplay="2000">
      <div class="swiper-wrapper">
        <?php foreach($sliders as $slider): ?>
        <div class="swiper-slide"><a href="<?=$slider['adurl']?>" class="external"><img src="<?=$slider['imgurl']?>"></a></div>
        <?php endforeach; ?>
      </div>
      <!-- <div class="swiper-pagination swiper-pagination-white"></div> -->
    </div>
  </div>
  <!-- 新闻 -->
  <div class="index-news">

    <div class="list-block media-list">
      <ul>
        <div class="news-title">
          <span class="title-prefix"></span><b>新闻中心</b>
          <span class="title-more"><a href="/site/news-list">更多</a></span>
        </div>
        <?php foreach($newses as $news): ?>
        <li>
          <a href="/site/news?id=<?=$news['id']?>" class="item-link">
            <div class="item-content">
              <div class="item-media"><img src="<?=$news['imgurl']?>" style="width:86px;height:86px;"></div>
              <div class="item-inner">
                <div class="item-title-row">
                  <div class="item-title"><?=$news['title']?></div>
                </div>
                <div class="item-subtitle"><?=$news['summary']?></div>
              </div>
            </div>
          </a>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <!-- 影集 -->
  <div class="inimg">
    <div class="list-block">
      <ul>
        <div class="news-title">
          <span class="title-prefix2"></span><b>赛事影集</b>
          <span class="title-more"><a href="/site/album-list">更多</a></span>
        </div>
        <div class="item-inner">
          <?php foreach($albums as $album): ?>
          <li>
            <div id="album_<?=$album['id']?>" class="item-photo">
              <a href="javascript:;" class="item-link">
                <img src="<?=$album['imgurl']?>">
                <div class="item-subtitle"><?=$album['title']?></div>
              </a>
            </div>
          </li>
        <?php endforeach; ?>
        </div>
      </ul>
    </div>
  </div>
</div>
