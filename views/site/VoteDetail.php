<?php
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>2016广东业余高尔夫队际公开赛-球队详情</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">


    <?php
    $this->title = '球队详情';
    // print_r($competitions);exit;
    ?>
    <!-- <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script> -->

    <style type="text/css">

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

        body,html{
            width: 100%;
            height: 100%;
            background: #02358e;
        }
        *{
            margin: 0;
            padding: 0;
        }
        .vote_zong{
            width: 100%;
            height: 100%;
            background-color: #02358e;
            overflow-y: scroll;
        }
        .vote_bg{
            /*width: 100%;*/
            width: 12.8rem;
            /*height:auto;*/
            height:15.62rem;
            background: url(/img/vote_bg.png) no-repeat;
            margin:0 auto;
            /*overflow: hidden;*/
            /*padding-top: 53%;*/
            padding-top: 7.1rem;
            -webkit-background-size: cover;
            background-size: cover;
            background-color: #02358e;
        }
        .vote_bg .vote_logo{
            width: 12.8rem;
            text-align: center;
        }
        .vote_bg .vote_logo img{
            width: 3.76rem;
            height: 3.74rem;
        }
        .vote_bg .vote_logo .logoTitle{
            font-family: "微软雅黑";
            color: #fff;
            font-size: 0.64rem;
            font-style: normal;
            /*margin-top: 0.64rem;*/
        }
        .vote_bg .contents{
            margin-top: 1.2rem;
            font-family: "微软雅黑";
            font-size: 0.52rem;
            font-style: normal;
            color: #fff;
            padding-left: 0.8rem;
        }
        .vote_bg .contents div{
            margin-top: 0.5rem;
        }
        .vote_bg .vote{
            width: 12.8rem;
            text-align: center;
            margin-top: 1.0rem;
            display: block;
            margin-bottom: 10%;
        }
        .vote_bg .vote img{
            width: 6.26rem;
            height: 1.4rem;
        }
        .vote_bg .exchange{
            width: 100%;
            height: 1.4rem;
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            left: auto;
            bottom: 0;
            overflow: hidden;
        }
        .vote_bg .exchange .character{
            width: 25.6rem;
            height: 100%;
            position: absolute;
            right: 0;
            top: 20%;
        }
        .vote_bg .exchange a{
            width:12.8rem;
            display:block;
            float: left;
            font-family: "微软雅黑";
            font-size: 0.6rem;
            font-style: normal;
            color: #54cfff;
            text-decoration: none;
            text-align: center;
        }


    </style>
</head>
<body>
<!-- <div style="clear: both;"></div> -->
<div class="vote_zong">
    <div class="vote_bg">
        <div class="vote_logo">
            <img src="<?=$teaminfo['logourl']?>" height="187" width="188" alt="" />
            <div class="logoTitle"><?=$teaminfo['name']?></div>
        </div>
        <div class="contents">
            <div>成立时间：<?=$teaminfo['fdate']?></div>
            <div>成立地点：<?=$teaminfo['faddres']?></div>
            <div>球队口号：<?=$teaminfo['slogan']?></div>


        </div>
        <a class="vote" id="btn-vote" href="#" onclick="javascript:dovote(<?=$teaminfo['id']?>)">
            <img src="/img/vote_vote.png" height="70" width="313" alt="" />
        </a>
        <div class="exchange">

            <div class="character"><a href="#" onclick="exchangeFn()">点击进入万嘉欢购酒水电商平台兑奖通道</a></div>
        </div>
    </div>
</div>
<script type='text/javascript' src='/js/jquery-2.2.4.min.js' charset='utf-8'></script>
<script>
    function exchangeFn(){
        window.location.href = "http://www.wjhgw.com/?u=585641";
    }

    function setCookie(name,value)
    {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + 3000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }
    // 读取cookies
    function getCookie(name)
    {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

        if(arr=document.cookie.match(reg))

            return unescape(arr[2]);
        else
            return null;
    }
    // 删除cookies 
    function delCookie(name)
    {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=getCookie(name);
        if(cval!=null)
            document.cookie= name + "="+cval+";expires="+exp.toGMTString();
    }

    function refresh(){
        if(getCookie("refresh_timeout") == null){
            window.location.reload();
            setCookie("refresh_timeout","3000");

        }
    }
    //  delCookie("aa");

    $(document).ready(function(){
        refresh();
        var charWidth=$('.exchange .character').width();
        $('.exchange .character').append($('.exchange .character a').eq(0).clone(true));
        //自动播放
        var timer=null;
        var num=0;
        var speedTime = 60;//播放速度，越大越慢
        var scrollFn =function(){
            num+=1;
            if(num<(charWidth/2)){
                $('.exchange .character').stop().css({'left':-num});
            }else{
                num=0;
                $('.exchange .character').stop().css({'left':0});
            }
        }
        clearInterval(timer);
        timer=setInterval(scrollFn,speedTime);
        //鼠标移入停止
        // $('.exchange').mouseenter(function(){
        //     clearInterval(timer);
        // }).mouseleave(function() {
        //     clearInterval(timer);
        //     timer=setInterval(scrollFn,speedTime);
        // });


        $("#btn-vote").click(function(){
            var tid = <?=$teaminfo['id']?>;
            console.log(tid);
            $.post('/site/save-vote', {_csrf:'<?= Yii::$app->request->csrfToken ?>', Vote: {team_id: tid}}, function(response){
                //$.hidePreloader();
                if(response.success) {
                    alert('投票成功！');
                } else {
                    if(response.msg !== null) {
                        alert(response.msg);
                    } else {
                        alert('投票失败！');
                    }
                }
            }, 'json');

        });
    });

</script>

</body>
</html>
