<?php

/* @var $this yii\web\View */

$this->title = '赛事规则';
?>

<div class="competition-head">
<span><a href="/site/competition">赛程</a></span>
<span style="height:80px; width:1px; border-left:1px #A6A6A6 solid"></span>
<span><a href="/site/rules" style="color:white;">规则</a></span>
</div>

<h3 style="margin-top:20px;margin-bottom:20px;text-align:center;">赛事规则</h3>

<div class="content-padded news-detail">
  <?=$rules['competition_rule']?>
</div>
