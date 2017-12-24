<?php
/**
 * Makoo theme.你可以在<a href="http://www.makoolabs.com">makoo的官方网站</a>获得更多关于此皮肤的信息
 * @package Typecho Makoo Theme
 * @author Victor
 * @version 1.0.0
 * @link http://www.makoolabs.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="main">
    <?php 
        /* Run the loop to output the posts.
         * If you want to overload this in a child theme then include a file
         * called loop-index.php and that will be used instead.
         */
        $this->need('loop.php');
    ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>

                