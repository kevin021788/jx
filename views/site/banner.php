<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-11-07
 * Time: 15:24
 */

    if(!empty($banner))
    {
        ?>
        <!-- Banner -->
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

        <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
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

        <?php
    }
?>