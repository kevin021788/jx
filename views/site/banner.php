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
        <div class="banner col-xs-12 col-sm-12">
            <ul>
                <?php foreach($banner as $v): ?>
                    <li><a href="<?php
                        if($v['url'])
                            echo $v['url'];
                        else
                            echo 'javascript:void(0);';
                        ?>"><img src="<?=$v['imgUrl']?>" alt=""></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="count">
                <?php foreach($banner as $k=>$v):
                    $a = '';
                    if($k==0) $a = ' class=current';
                    ?>
                    <a<?=$a?>></a>
                <?php endforeach; ?>
            </div>
            <a href="javascript:void(0);" class="prev">
                <span></span>
            </a>
            <a href="javascript:void(0);" class="next">
                <span></span>
            </a>
        </div>
        <div class="clear"></div>
        <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            var num=0;
            var timer=null;
            var $Li=$(".banner ul li");
            $(".banner").hover(function(){
                clearInterval(timer);
            },function(){
                timer=setInterval(fnSwitch,3000);
            })
            $(".count i").hover(function(){
                num=$(this).index();
                fnTab();
            })
            $(".prev").click(function(){
                num--;
                if(num==-1){
                    num=$Li.length-1;
                }
                fnTab();
            })
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
                $(".count a").eq(num).addClass("current").siblings().removeClass("current");
            }
        </script>

        <?php
    }
?>