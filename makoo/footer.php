<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<div class="cls"></div>
</section>
<div class="cls"></div>
<footer id="footer" role="contentinfo">
    <div id="colophon">
        <div id="site-info">
            <a href="javascript:void(0)" onClick="goRoll(0)" id="goTop">返回顶部</a>
            <?php if($this->options->sitemap):?>
            <a href="<?php $this->options->sitemap()?>">网站地图</a> &nbsp;
            <?php endif;?>
            <?php if($this->options->icp):?>
            <a href="http://www.miibeian.gov.cn/" rel="external nofollow"><?php $this->options->icp()?></a>
            <?php endif;?>
            <?php $this->options->tongji()?>
            <?php if($this->options->copyright):?><?php _e('©');?><?php $this->options->copyright()?>
            <?php else:?>
            <?php _e('©2012-2017');?>
            <?php endif;?>
            <?php if($this->options->load_time == 'display') echo " - 加载耗时" . timer_stop(). "s";?> | Theme
            <?php if($this->options->banquan == 'close' || $this->is('page') || !$this->is('index')) echo "<span id='official'>frontopen2 for typecho</span>"; else echo '<a id="official" href="http://www.frontopen.com/" target="_blank" title="frontopen主题官方站">frontopen2 for typecho</a>'; ?>
        </div>
    </div>
    </footer>
</div><!--web_bod-->
<?php
echo '<script src="'.asseturl.'js/jquery.js?v='.VERSION.'" data-no-instant></script>';
echo '<script src="'.asseturl.'/js/jquery.fancybox.js?v='.VERSION.'" type="text/javascript"></script>';
echo '<script src="'.asseturl.'js/jquery.fancybox-thumbs.js?v='.VERSION.'" type="text/javascript"></script>';
?>
<script data-no-instant>
    $(function(){
        adminBar = ""||0;
        mod_txt = '#randomposts';
    });
</script>
<?php
echo '<script src="'.asseturl.'app.min.js?v=17'.VERSION.'" data-no-instant></script>';
echo '<script src="'.asseturl.'/js/yiyan.js?v='.VERSION.'"></script>';
$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
if(!strpos($agent, 'iphone') && !strpos($agent,'ipad') && !strpos($agent,'mac')){
  //  echo '<script src="'.asseturl.'/js/sm.js?v='.VERSION.'" data-no-instant></script><style>article pre{max-height:none;}</style>';
}
//echo '<script src="'.asseturl.'js/hj.js?v='.VERSION.'"></script>';
//echo '<script src="'.asseturl.'/js/instantclick.min.js?v='.VERSION.'" data-no-instant></script>';
?>
<?php if($this->options->focus == 'display' && $this->is('index')){?>
<script type="text/javascript">
jQuery(window).resize(function(){
    FocusSize();
});
jQuery(document).ready(function($){
    dn = 0;
    imgNum = $('.focus_img img').length;
    homeFocus(0);
    FocusSize();
    for(var i =0;i<imgNum;i++){
        $("<a href='javascript:;'></a>").appendTo(".bt_line");
    }
    $('.bt_line a ').mouseover(function(){
        var btIndex = $(this).index();
        $('.bt_line a').eq(btIndex).addClass('current').siblings().removeClass();
        homeFocus(btIndex);
        dn = btIndex;
    });
    $('.bt_line a').eq(0).addClass('current');
    $('.focus_img li').eq(0).show();
    $('.focus').hover(function(){
        clearTimeout(clocks);
    },function(){
        clocks = setInterval(clock,5000);
    });
    clocks =setInterval(clock,5000);
    function clock(){
        if(dn>=imgNum-1){
            dn = 0;
        }else{
            dn++;
        }
        homeFocus(dn);
    }
    function homeFocus(nub){
        $('.focus_img li').eq(nub).css('z-index','3').siblings().css('z-index','0');
        $('.focus_img li').eq(nub).fadeIn(500).siblings().fadeOut(500);
        $('.bt_line a').eq(nub).addClass('current').siblings().removeClass();
        imgSrc = $('.focus_img li img').eq(nub).attr('data-focus-src');
        $('.focus_img li img').eq(nub).attr('src',imgSrc);
    }
});
function FocusSize(){
    defHeight = 380;
    defWidth = 960;
    nowImgWidth = jQuery('.focus').width();
    biLi = defHeight/defWidth;
    FocusHeight = nowImgWidth * biLi;
    jQuery('.focus_img').height(FocusHeight);
    jQuery('.focus_img li').height(FocusHeight);
    jQuery('.focus_img img').height(FocusHeight);
}
</script>
<?php }?>
<script data-no-instant>
    <?php //if($this->options->starttime){?>
    function show_date_time(){
        //window.setTimeout("show_date_time()",1e3);
        //var BirthDay = new Date("<?php// $this->options->starttime();?>"),today = new Date,timeold = today.getTime()-BirthDay.getTime(),msPerDay=864e5,e_daysold=timeold/msPerDay,daysold=Math.floor(e_daysold),e_hrsold=24*(e_daysold-daysold),hrsold=Math.floor(e_hrsold),e_minsold=60*(e_hrsold-hrsold),minsold=Math.floor(60*(e_hrsold-hrsold)),seconds=Math.floor(60*(e_minsold-minsold));span_dt_dt.innerHTML=daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
    }
    show_date_time();
    <?php //};?>
</script>
<script data-no-instant>
    /*InstantClick.on('change',function(isInitialLoad){
        if(isInitialLoad === false){
            if(typeof MathJax !== 'undefined'){MathJax.Hub.Queue(["Typeset",MathJax.Hub]);}
            if(typeof prettyPrint !== 'undefined'){prettyPrint();}
            if(typeof _hmt !== 'undefined'){_hmt.push(['_trackPageview', location.pathname + location.search]);}
            if(typeof ga !== 'undefined'){ga('send','pageview',location.pathname+location.search);}
            if(typeof Prism !== 'undefined'){
                <?php //if(Helper::options()->plugin('Prismjs')->showln):?>
                var pres = document.getElementByTagName('pre');
                for(var i = 0;i<pres.length;i++){
                    if(pres[i].getElememntsByTagName('code').length>0)
                        pres[i].className = 'line-numbers';
                }
                <?php //endif;?>
                Prism.highlightAll(true,null);
            }
        }
    });
    InstantClick.init('mousedown');*/
</script>
<?php //if(strpos($this->options->Enhance,'-w')!==false){$this->need('js/welcome.php');}?>
<?php $this->footer();?>
<div id="float">
    <a id="float_gotop" class="floatbtn"  href="javascript:void()" onClick="goRoll(0)" title="返回顶部"></a>
    <a class="linbak floatbtn" href="<?php $this->options->adminUrl(); ?>" title="登陆&注册"></a>
    <a id="float_goend" class="floatbtn" href="javascript:void()" onClick="goend()" title="转到底部"></a>
</div>
    </body>
</html>