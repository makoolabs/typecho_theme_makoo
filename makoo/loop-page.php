<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<div id="post-<?php $this->cid();?>" class="post-<?php $this->cid();?> page type-page status-publish hentry">
    <?php if(!$this->is('page')){?>
    <h2 class="entry-title"><?php $this->title()?></h2>
    <?php }else{?>
    <h1 class="entry-title"><?php $this->title()?></h1>
    <?php }?>
    <div class="entry-content">
        <?php $this->content();?>
        <?php if($this->user->hasLogin()):?><span class="edit-link"><a class="post-edit-link" href="<?php $this->options->adminUrl('write-post.php?cid='.$this->cid);?>">编辑</a></span><?php endif;?>
    </div>
</div>
<?php $this->need('comments.php');?>