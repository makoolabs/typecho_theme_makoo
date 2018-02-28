<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php')?>
<div id="container">
    <div id="content" role="main">
        <h1 class="page-title">
            <?php $this->archiveTitle(array('tag' => _t('标签归档: <span>%s</span>'),),'',''); ?>
        </h1>
        <?php
        /* Run the loop for the tag archive to output the posts
         * If you want to overload this in a child theme then include a file
         * called loop-tag.php and that will be used instead.
         */
        //$this->need('loop.php');
        ?>
    </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>