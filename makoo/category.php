<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php
    if($this->categories[0]['mid'] == $this->options->picCat){
        $this->need('loop-categorypic.php');
        die;
    }
    $this->need('loop-category.php');
?>