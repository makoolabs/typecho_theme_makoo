<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div id="container">
    <div id="content" role="main">
        <h1 class="page-title author"><?php $this->archiveTitle(array('author' => _t('%s 的 站内主页'),),'','');?></h1>
        <?php $this->need('loop.php');?>
    </div>
</div>
<div id="primary" class="side" role="complementary">
    <div class="widget-title">作者档案</div>
    <div class="author_da">
        <div class="avatar">
            <?php echo '<img src="'. ($this->request->isSecure() ? 'https://secure' : 'http://www') . '.gravatar.com/avatar/' . md5(strtolower($this->author->mail)) . '?s=96&r=G' .'&d=mm" alt="' . $this->author->screenName . '"class="avatar" />'; ?>
        </div>
    <?php if($this->author->screenName){?>
        <p><b>昵称:</b><?php echo $this->author->screenName;?></p>    
    <?php }?>
    <?php if($this->author->url){?>
        <p><b>主页:</b><a href="<?php $this->author->url;?>"><?php echo $this->author->url;?></a></p>
    <?php }?>
    <?php if($this->author->mail){?>
        <p><b>邮箱:</b><?php $this->author->mail();?></p>
    <?php }?>
</div>
<!-- Duoshuo Comment BEGIN -->
<div class="ds-thread" data-thread-key="author<?php echo $this->user->uid; ?>" data-title="<?php $this->author(); ?> 在<?php $this->options->title(); ?>中的主页" ></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"<?php $this->options->duoshuo_id() ?>"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- Duoshuo Comment END -->
</div>
<?php $this->need('footer.php')?>