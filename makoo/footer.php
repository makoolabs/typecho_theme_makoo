<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<footer id="footer">
    <div class="copyright">
        <p>
            <i class="fa fa-copyright" aria-hidden="true"></i> 
            <?php if($this->options->copyright):?><?php $this->options->copyright()?>
            <?php else:?>
            <?php _e('2012-2018');?>
            <?php endif;?>
            <b></b>
        </p>
        <p>
            <a href="javascript:void(0)" onClick="goRoll(0)" id="goTop">返回顶部</a>
            Powered by <b>Typecho</b>. Theme by <a href="x" data-toggle="tooltip" data-placement="top" title="Typecho 主题模板" target="_blank"><b>makoo</b></a> |  <?php if($this->options->icp):?><a href="http://www.miibeian.gov.cn/" rel="external nofollow"><?php $this->options->icp()?></a>|<?php endif;?>
                <?php if($this->options->load_time == 'display') echo " - 加载耗时" . timer_stop(). "s";?>
        </p>
    </div>
    <?php $this->options->tongji()?>
</footer>
<script type="text/javascript" src="<?php echo asseturl ?>app.min.js"></script>
<!--<script type="text/javascript" src="<?php echo asseturl ?>js/skel.min.js"></script>-->
<!--<script type="text/javascript" src="<?php echo asseturl ?>/js/util.min.js"></script>-->
<!--<script type="text/javascript" src="<?php echo asseturl ?>/js/nav.js"></script>-->

<script>
/*$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});*/
</script>
<script>
(function(){
    /*var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);*/
})();
</script>
<?php $this->footer();?>
<div id="float">
    <a id="float_gotop" class="floatbtn"  href="javascript:void()" onClick="goRoll(0)" title="返回顶部"></a>
    <a class="linbak floatbtn" href="<?php $this->options->adminUrl(); ?>" title="登陆&注册"></a>
    <a id="float_goend" class="floatbtn" href="javascript:void()" onClick="goend()" title="转到底部"></a>
</div>
</body>
</html>