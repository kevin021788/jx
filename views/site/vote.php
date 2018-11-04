<?php
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>万嘉欢购-2016年广东业余高尔夫队际公开赛最具人气球队投票</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="/css/site.css">
    <link rel="stylesheet" href="/css/light7/light7.min.css">
    <style type="text/css">

        .page .exchange1{
            width: 100%;
            height: 1.4rem;
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            left: auto;
            bottom: 0;
            overflow: hidden;
        }
        .page .exchange1 .character1{
            width: 25.6rem;
            height: 100%;
            position: absolute;
            right: 0;
            top: 20%;
        }
        .page .exchange1 span{
            width:42.8rem;
            display:block;
            float: left;
            font-family: "微软雅黑";
            font-size: 0.6rem;
            font-style: normal;
            color: #54cfff;
            text-decoration: none;
            text-align: center;
        }
        .vote-head{
            height: 100px;
        }
        .mybutton{
            border-radius: 0;
        }

        /*媒体查询*/
        html { font-size: 50px; }
        body { font-size: 24px; }
        @media screen and (max-width: 359px) {
            html { font-size: 25px;}
            body { font-size: 12px; }
        }
        @media screen and (min-width: 360px) {
            html { font-size: 28.13px;}
            body { font-size: 12px; }
        }
        @media screen and (min-width: 375px) {
            html { font-size: 29.30px;}
            body { font-size: 14px; }
        }
        @media screen and (min-width: 384px) {
            html { font-size: 30px;}
            body { font-size: 14px; }
        }
        @media screen and (min-width: 400px) {
            html { font-size: 31.25px;}
            body { font-size: 15px; }
        }
        @media screen and (min-width: 414px) {
            html { font-size: 32.34px;}
            body { font-size: 16px; }
        }
        @media screen and (min-width: 424px) {
            html { font-size: 33.13px;}
            body { font-size: 16px; }
        }
        @media screen and (min-width: 480px) {
            html { font-size: 37.50px;}
            body { font-size: 18px; }
        }
        @media screen and (min-width: 540px) {
            html { font-size: 42.19px;}
            body { font-size: 20px; }
        }
        @media screen and (min-width: 640px) {
            html { font-size: 50px;}
            body { font-size: 24px; }
        }
    </style>

    <div id='wx_pic' style='margin:0 auto;display:none;'>
        <img src='/pic/wjhg_logo.jpg' />
    </div>
</head>
<body>

<!-- Page body begin -->
<div class="page">

    <div class="content">
        <!-- page content container -->

        <!--      <img src="/upload/slider/201608311325223748.png" style="width:100%;">-->
        <img src="/pic/vote_banner.png" style="width:100%;">
        <div class="vote-head">

            <div class="row">
                <div class="col-33 vline2" style="margin-left:6%;">
                    <div class="item-subtitle">已报名</div>
                    <div class="item-subtitle"><?=count($teams)?></div>
                </div>
                <div class="col-33 vline">
                    <div class="item-subtitle">总票数</div>
                    <div class="item-subtitle"><span id="polls"><?=$polls?></span></div>
                </div>
                <div class="col-33 vline3">
                    <div class="item-subtitle">访问量</div>
                    <div class="item-subtitle"><?=$visits['visit']?></div>
                </div>
            </div>
        </div>

        <div class="vote-list">

            <div class="row" style="padding-top:10px;padding-left:10px;">
                <div class="col-33">
                    <a href="javascript:;" class="button button-fill open-popup" data-popup=".popup-rule">活动规则</a>
                </div>
                <div class="col-33">
                    <a href="javascript:;" class="button button-fill open-popup" data-popup=".popup-share">分享达人</a>
                </div>
                <div class="col-33">
                    <a href="javascript:;" class="button button-fill open-popup" data-popup=".awarding-rule">兑奖规则</a>
                </div>
            </div>

            <div class="content-padded" style="margin-top:32px;padding-bottom:10px;">
                <?php for($i = 0; $i < count($teams); ): ?>
                    <div class="row">
                        <?php for($j=0; $j<2 && $i<count($teams); $j++): ?>
                            <div class="col-50">
                                <a href="#" class="item-link item-content" style="color:black;"><!--/site/team-detail?tid=<?//=$teams[$i]['id']?>-->
                                    <div style="background-color:white;font-size:14px;text-align:left;">
                                        <img src="<?=$teams[$i]['logourl']?>" style="width:100%; height:145px;">
                                        <div class="item-subtitle" style="text-align:center; padding: 0 10px; height:60px;"><?=$teams[$i]['name']?>
                                            <div style="color:red;">
                                                <span id="poll_<?=$teams[$i]['id']?>"><?=empty($teams[$i]['poll'])?'0':$teams[$i]['poll']?></span>票
                                            </div>
                                        </div>
                                        <div class="item-subtitle">
                                            <a href="#" id="btn-vote" class="mybutton button button-fill" onclick="javascript:dovote(<?=$teams[$i]['id']?>)">立即投票</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php ++$i; ?>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>

            </div>

        </div>

    </div>
    <!-- 滚动文字 -->
    <div class="exchange1">
        <!-- http://www.wjhgw.com/wap/#!/ -->
        <div class="character1"><span onclick="exchangeFn()">点击进入万嘉欢购兑奖通道，成功注册有机会抽取iPhone7及（拉菲）大奖！</span></div>
    </div>

</div>  <!-- Page body end -->

<!-- 活动规则弹出框 -->
<div class="popup popup-rule">
    <div class="content-block">
        <h3 style="color:#f99c57;text-align:center;">活动规则</h3>
        <div class="content-padded">
            <?=$rules['vote_rule']?>
        </div>
        <a href="#" class="button button-big button-fill button-success close-popup">我知道了</a>
    </div>
</div>

<!-- 活动规则弹出框 -->
<div class="popup awarding-rule">
    <div class="content-block">
        <h3 style="color:#f99c57;text-align:center;">兑奖规则</h3>
        <div class="content-padded">
            <?=isset($rules['vote_awarding'])?$rules['vote_awarding']:".."?>
        </div>
        <a href="#" class="button button-big button-fill button-success close-popup">我知道了</a>
    </div>
</div>

<!-- 分享达人弹出框 -->
<div class="popup popup-share">
    <div class="content-block">
        <h3 style="color:#f99c57;text-align:center;">分享达人</h3>
        <div class="content-padded">
            <div class="list-block">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="col-40">分享达人</div>
                                <div class="col-40">分享指数</div>
                            </div>
                        </div>
                    </li>
                    <?php foreach($share_rank as $rank): ?>
                        <li>
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="col-40">
                                        <img src="<?= $rank['headimgurl'] ?>" style="width:30px;height:30px;">
                                        <span style="font-size:0.5rem"><?= $rank['nickname'] ?></span>
                                    </div>
                                    <div class="col-40"><?= $rank['count'] ?></div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <a href="#" class="button button-big button-fill button-success close-popup" onclick="javascript:doshare()">马上去分享</a>
    </div>
</div>

<!-- 关注二维码 -->
<div class="popup popup-focus">
    <div class="content-block">
        <h3 style="color:#f99c57;text-align:center;">关注步骤</h3>
        <div class="content-padded">
            <p>1、长按二维码</p>
            <p>2、识别二维码</p>
            <p>3、关注</p>
        </div>
        <img src="/pic/qrcode.jpg" style="width:100%">
        <a href="#" class="button button-big button-fill button-success close-popup" onclick="javascript:window.location.href = '/index/index?role=vote2';">已关注，去验证</a>
        <br>
        <a href="#" class="button button-big button-fill button-light close-popup">关闭</a>
    </div>
</div>

<script type='text/javascript' src='/js/jquery-2.2.4.min.js' charset='utf-8'></script>
<!-- <script type='text/javascript' src='http://res.wx.qq.com/open/js/jweixin-1.0.0.js'></script> -->
<script type="text/javascript">
    $.config = {
        autoInit: true,
        // router: false,
        swipePanelOnlyClose: true
    }
    $(function(){
        if('<?=\Yii::$app->session->get('vote_auth')?>' == 'y') {
            <?=\Yii::$app->session->set('vote_auth','')?>
            $.alert('已通过验证，请点击右上角菜单，然后分享给朋友或朋友圈。');
        }

        // 滚动文字
        var charWidth=$('.exchange1 .character1').width();
//        $('.exchange1 .character1').append($('.exchange1 .character1 span').eq(0).clone(true));
        //自动播放
        var timer=null;
        var num=0;
        var speedTime = 30;//播放速度，越大越慢
        var scrollFn =function(){
            num+=1;
            if(num<charWidth){
                $('.exchange1 .character1').stop().css({'left':-num});
            }else{
                num=0;
                $('.exchange1 .character1').stop().css({'left':0});
            }
        }
        timer=setInterval(scrollFn,speedTime);
        //鼠标移入停止
        // $('.exchange').mouseenter(function(){
        //     clearInterval(timer);
        // }).mouseleave(function() {
        //     clearInterval(timer);
        //     timer=setInterval(scrollFn,speedTime);
        // });
        //

    });
    function exchangeFn(){
        window.location.href = "http://www.wjhgw.com/?u=585641";
    }

    function doshare()
    {
        if('<?=\Yii::$app->session->get('wx_openid')?>'.length <= 1) {
            var r = confirm('分享需要您通过微信授权验证以进行达人排名，是否同意？');
            if(r){
                window.location.href = '/index/index?role=vote';
            }
        } else {
            $.alert('如需分享，请点击右上角菜单，然后分享给朋友或朋友圈。');
        }
    }
    function dovote(tid)
    {
        // console.log(tid);
        $.showPreloader('正在提交您的投票');
        $.post('/site/save-vote', {_csrf:'<?= Yii::$app->request->csrfToken ?>', Vote: {team_id: tid}}, function(response){
            $.hidePreloader();
            console.log(response);
            if(response.success) {
                var team_poll = $("#poll_" + tid).text();
                var poll_count = $('#polls').text();
                team_poll = +team_poll + 1;
                poll_count = +poll_count + 1;
                $('#poll_'+tid).text(team_poll);
                $('#polls').text(poll_count);
                $.alert('投票成功！');
            } else {
                if(response.msg !== null) {
                    if(response.focus) {
                        $.alert(response.msg, function(){
                            // $.popup('.popup-focus');
                            window.location.href = '/index/index?role=vote2';
                        });
                    } else {
                        $.alert(response.msg);
                    }
                } else {
                    $.alert('投票失败！');
                }
            }
        }, 'json');
    }
</script>
<script type='text/javascript' src='/js/light7/light7.min.js' charset='utf-8'></script>
</body>
</html>
