<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div id="main">
    <article class="col-md-8 col-md-offset-2 view clearfix">
        <?php if(!$this->is('page')){?>
        <h2 class="view-title" style="border-bottom:1px dashed #5bc0eb;padding-bottom:10px;margin-bottom:30px;"><?php $this->title()?></h2>
        <?php }else{?>
        <h1 class="view-title" style="border-bottom:1px dashed #5bc0eb;padding-bottom:10px;margin-bottom:30px;"><?php $this->title()?></h1>
        <?php }?>
        <div class="view-content">
            <?php $this->content();?>
            <?php if($this->user->hasLogin()):?><span class="edit-link"><a class="post-edit-link" href="<?php $this->options->adminUrl('write-post.php?cid='.$this->cid);?>">编辑</a></span><?php endif;?>
        </div>
        <section id="comments">
            <?php $this->need('comments.php');?>
        </section>
    </article>
</div>
<?php $this->need('footer.php'); ?>
