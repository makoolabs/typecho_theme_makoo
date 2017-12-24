<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div class="mbx">
    <i class="icon-home icon-large" style="font-size:14px;"></i>
    <a href="<?php $this->options->siteUrl();?>" class="gray">首页</a> > 
    <?php echo crumbsArchiveNav($this,$this->_archiveSlug); ?>
</div>
<div id="container">
    <div id="content" role="main">
        <h1 class="page-title">
            <?php $this->archiveTitle(array('category'=>_t('分类目录归档: <span>%s</span>'),),'','');?>
        </h1>
        <?php 
            $category_description = $this->_description;
            if(!empty($category_description))
                echo '<div class="archive-meta">' . $category_description . '</div>';
        ?>
        <?php $this->need('loop.php');?>
    </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>