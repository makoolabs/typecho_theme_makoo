<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php')?>
<div id="container">
    <div id="content" role="main" style="width:96%">
    <?php 
      /* Run the loop to output the post.
       * If you want to overload this in a child theme then include a file
       * called loop-post.php and that will be used instead.
       */
      $this->need('loop-post.php');
    ?>
    </div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>