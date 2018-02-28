<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div id="main">
    <div class="col-md-8 col-md-offset-2 clearfix">
        <div class="errors_404"><img src="<?php echo asseturl;?>images/404.png" alt="404"></div>
        <div class="errors_link"><a class="btn btn-default btn-lg" href="/" role="button"><i class="fa fa-home" aria-hidden="true"></i> 回首页</a><a class="btn btn-default btn-lg" href="javascript:history.go(-1)" role="button"><i class="fa fa-reply" aria-hidden="true"></i> 返回上一页</a></div>
        <!--<script type="text/javascript" src="//qzonestyle.gtimg.cn/qzone/hybrid/app/404/search_children.js?edition=small" charset="utf-8" homePageUrl="<?php //$this->options->siteUrl();?>" homePageName="返回首页"></script>-->
    </div>
</div>
<?php $this->need('footer.php');?>