<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div id="container">
    <div id="content" role="main">
    <?php if($this->have()):?>
        <h1 class="page-title"><?php $this->archiveTitle(array('search'=>_t('<span>%s</span> 的搜索结果'),),'','');?></h1>
        <?php $this->need('loop.php')?>
    <?php else:?>
        <div id="post-0" class="post no-results no-found">
            <h2 class="entry-title"><?php _e('未找到');?></h2>
            <div class="entry-content">
                <p><?php _e('抱歉，没有符合您搜索条件的结果。请换其它关键词再试。');?></p>
                <form role="search" method="post" id="searchform" class="searchform" action="/">
                    <div>
                        <label class="screen-reader-text" for="s">搜索: </label>
                        <input type="text" value="<?php $this->archiveTitle(array('search'=>_t('%s'),),'','');?>" name="s" id="s"/>
                        <input type="submit" id="searchsubmit" value="搜索"/>
                    </div>
                </form>
            </div>
        </div>
    <?php endif;?>
    </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>