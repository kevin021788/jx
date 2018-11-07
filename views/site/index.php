<?php
$this->title = $config['WEB_SITE_TITLE'];
//$this->keyword = $config['WEB_SITE_KEYWORD'];
//$this->description = $config['WEB_SITE_DESCRIPTION'];
//dd($config);
// print_r($this);exit;
// print_r($albums);exit;
?>
<div class="page-index">
  <!-- Title -->

  <!-- Banner -->
  <div class="index-banner">
    <div class="swiper-container" data-space-between='5' data-pagination='.swiper-pagination' data-speed="600" data-autoplay="2000">
      <div class="swiper-wrapper">
        <?php foreach($banner as $v): ?>
        <div class="swiper-slide"><a href="<?=$v['url']?>" class="external"><img src="<?=$v['imgUrl']?>"></a></div>
        <?php endforeach; ?>
      </div>
      <!-- <div class="swiper-pagination swiper-pagination-white"></div> -->
    </div>
  </div>


    <div id="swiper-container1">
        <!--main_visual start-->
        <!-- Swiper -->
        <div class="swiper-container swiper-container-horizontal swiper-container-3d swiper-container-cube" style="cursor: grab;">
            <div class="swiper-wrapper" style="transform-origin: 50% 50% -951.5px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(-360deg); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="2" style="width: 1903px; transform: rotateX(0deg) rotateY(0deg) translate3d(0px, 0px, 0px); transition-duration: 0ms;"><a href="burn_information_details.html?id="><img src="http://image1.zuochao.net/Uploads/banner/img/2018-01/5a696ebf8b1c1.png"></a><div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div><div class="swiper-slide-shadow-right" style="opacity: 1; transition-duration: 0ms;"></div></div>
                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 1903px; transform: rotateX(0deg) rotateY(90deg) translate3d(0px, 0px, 0px); transition-duration: 0ms;"><a href="burn_information_details.html?id=11"><img src="http://image1.zuochao.net/Uploads/banner/img/2018-01/5a696e9e6a1ad.png"></a><div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div><div class="swiper-slide-shadow-right" style="opacity: 1; transition-duration: 0ms;"></div></div><div class="swiper-slide" data-swiper-slide-index="1" style="width: 1903px; transform: rotateX(0deg) rotateY(180deg) translate3d(1903px, 0px, 1903px); transition-duration: 0ms;"><a href="burn_information_details.html?id="><img src="http://image1.zuochao.net/Uploads/banner/img/2018-01/5a696ebac073d.png"></a><div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div><div class="swiper-slide-shadow-right" style="opacity: 1; transition-duration: 0ms;"></div></div><div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="2" style="width: 1903px; transform: rotateX(0deg) rotateY(270deg) translate3d(-1903px, 0px, 5709px); transition-duration: 0ms;"><a href="burn_information_details.html?id="><img src="http://image1.zuochao.net/Uploads/banner/img/2018-01/5a696ebf8b1c1.png"></a><div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div><div class="swiper-slide-shadow-right" style="opacity: 1; transition-duration: 0ms;"></div></div><div class="swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0" style="width: 1903px; transform: rotateX(0deg) rotateY(360deg) translate3d(-7612px, 0px, 0px); transition-duration: 0ms;"><a href="burn_information_details.html?id=11"><img src="http://image1.zuochao.net/Uploads/banner/img/2018-01/5a696e9e6a1ad.png"></a><div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div><div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 0ms;"></div></div><div class="swiper-cube-shadow" style="height: 1903px; transform: translate3d(0px, 971.5px, -951.5px) rotateX(90deg) rotateZ(0deg) scale(2);"></div></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

</div>
