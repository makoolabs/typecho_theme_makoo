<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div id="main">
    <div class="row box">
        <div class="col-md-8">
            <h2 class="uptop"><i class="fa fa-folder-o" aria-hidden="true"></i> 
                <?php $this->archiveTitle(array('category'=>_t('分类目录归档: <span>%s</span>'),),'','');?>
            </h2>
            <?php 
            $category_description = $this->_description;
            if(!empty($category_description))
                echo '<div class="archive-meta">' . $category_description . '</div>';
            ?>
            <?php while ($this->next()):?>
            <article class="article-list-1 clearfix">
                <header class="clearfix">
                    <h1 class="post-title"><a href="<?php $this->permalink()?>"><?php $this->title()?></a></h1>
                    <div class="post-meta">
                        <span class="meta-span"><i class="fa fa-calendar"></i> <?php $this->date('Y-m-d')?></span>
                        <span class="meta-span"><i class="fa fa-folder-open-o"></i> <?php $this->category(',',true,'未分类');?></span>
                        <span class="meta-span"><i class="fa fa-commenting-o"></i> <?php $this->commentsNum();?>条评论</span>
                        <span class="meta-span hidden-xs"><i class="fa fa-tags" aria-hidden="true"></i> <?php $this->tags(', ',true,'');?></span>
                    </div>
                </header>
                <div class="post-content clearfix">
                    <p><?php $this->excerpt(200,'...');?></p>
                </div>
            </article>
            <?php endwhile; ?>
            <nav style="float:right">
                <?php $this->pageNav('<i class="fa fa-angle-double-left" aria-hidden="true"></i> <i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-angle-double-right" aria-hidden="true"></i>',5, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination', 'itemTag' => 'li', 'textTag' => '', 'currentClass' => 'active', 'prevClass' => '', 'nextClass' => '')); ?>
            </nav>
        </div>
        <div class="col-md-4 hidden-xs hidden-sm">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>