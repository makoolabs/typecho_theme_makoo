<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div id="main">
    <div class="row box">
        <div class="col-md-8">
            <?php if($this->have()):?>
                <h2 class="uptop"><i class="fa fa-search" aria-hidden="true"></i> 
                    <?php $this->archiveTitle(array('search'=>_t('<span>%s</span> 的搜索结果'),),'','');?>
                </h2>
                <?php while ($this->next()):?>
                <article class="article-list-2 clearfix">
                    <div class="post-time"><i class="fa fa-calendar"></i> <?php $this->date('Y年m月d日') ?></div>
                    <h1 class="post-title"><a href="<?php $this->permalink()?>"><?php $this->title()?></a></h1>
                    <div class="post-meta">
                        <span class="meta-span"><i class="fa fa-folder-open-o"></i> <?php $this->category(',',true,'未分类');?></span>
                        <span class="meta-span"><i class="fa fa-commenting-o"></i><a href="<?php $this->permalink()?>#comments"><?php //$this->commentsNum();?>条评论</a></span>
                    </div>
                </article>
                <?php endwhile; ?>
                <nav style="float:right">
                    <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;',6, '...', array('wrapTag' => 'div', 'wrapClass' => 'page_num', 'itemTag' => NULL, 'textTag' => '', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next')); ?>
                </nav>
            <?php else:?>
                <h2 class="uptop"><i class="fa fa-search" aria-hidden="true"></i> <?php _e('未找到');?></h2>
                <article class="article-list-2 clearfix">
                    <p><?php _e('抱歉，没有符合您搜索条件的结果。请换其它关键词再试。');?></p>
                </article>
            <?php endif;?>        
        </div>
        <div class="col-md-4 hidden-xs hidden-sm">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>