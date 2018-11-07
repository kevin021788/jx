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
<?php
if(!empty($banner))
{
    ?>

    <div class="banner">
        <ul>
            <?php foreach($banner as $v): ?>

                <li><a href="javascript:void(0);"><img src="<?=$v['imgUrl']?>" alt=""></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="count">
            <?php foreach($banner as $v): ?>
                <i></i>
            <?php endforeach; ?>
        </div>
        <a href="javascript:void(0);" class="prev">
            <span></span>
        </a>
        <a href="javascript:void(0);" class="next">
            <span></span>
        </a>
    </div>

    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        var num=0;
        var timer=null;
        var $Li=$(".banner ul li");
        //鼠标经过清除定时器，鼠标离开执行
        $(".banner").hover(function(){
            clearInterval(timer);
        },function(){
            timer=setInterval(fnSwitch,3000);
        })
        //鼠标经过圆点
        $(".count i").hover(function(){
            num=$(this).index();
            fnTab();
        })
        //左按钮无缝切换
        $(".prev").click(function(){
            num--;
            if(num==-1){
                num=$Li.length-1;
            }
            fnTab();
        })
        //右按钮无缝切换
        $(".next").click(function(){
            fnSwitch();
        })
        function fnSwitch(){
            num++;
            if(num==$Li.length){
                num=0;
            }
            fnTab();
        }
        function fnTab(){
            $Li.eq(num).show().siblings().hide();
            $(".count i").eq(num).addClass("current").siblings().removeClass("current");
        }
    </script>
    </div>
    <?php
}
?>