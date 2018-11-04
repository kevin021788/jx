<?php
$this->title = '商家详情';
?>

<div class="list-block contacts-block" style="margin-top:0px;">
  <div class="shop-detail-head">
    <img src="<?=$shopinfo['logourl']?>" class="shop-logo">
  </div>
  <ul>
    <li>
      <div class="item-content">
        <div class="item-inner">
          <div class="item-title">商家名称：<?=$shopinfo['name']?></div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content">
        <div class="item-inner" style="width:100%;">
          <div class="row" style="margin-left:0px;margin-top:-3px;">
            <div class="col-30">产品介绍：</div>
            <div class="col-66" style="width:70%;margin-left:0.0%;float:left;text-align:justify">
              <?=$shopinfo['intro']?>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content">
        <div class="item-inner">
          <div class="item-title">联系电话：<?=$shopinfo['tel']?></div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content">
        <div class="item-inner">
          <div class="item-title">电子邮箱：<?=$shopinfo['email']?></div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content">
        <div class="item-inner" style="width:100%;">
          <div class="row" style="margin-left:0px;margin-top:-3px;">
            <div class="col-30">您的电话：</div>
            <div class="col-50 item-input" style="width:50%;margin-left:-1.5%;">
              <input id="phone" type="text" placeholder="请输入联系号码">
            </div>
            <div class="col-20">
              <a href="#" id="subscribe" onclick="javascript:subscribe(<?=$shopinfo['id']?>)" class="button button-fill button-success">预约</a>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>

</div>
