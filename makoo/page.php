<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<?php //页面的显示方式，通常情况下和 single.php 无差别?>
<div id="container">
    <div id="content" role="main" style="width:96%">
        <?php $this->need('loop-page.php');?>
    </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>