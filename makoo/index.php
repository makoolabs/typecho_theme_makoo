<?php
/**
 * Makoo theme.你可以在<a href="http://www.makoolabs.com">makoo的官方网站</a>获得更多关于此皮肤的信息
 * @package Typecho Makoo Theme
 * @author koo叔
 * @version 0.9.0
 * @link http://www.makoolabs.com
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<?php 
    if($this->options->dis_num){
        $dis_num = $this->options->dis_num;
    }else{
        $dis_num = 150;
    }
    if($this->options->image_width){
        $imgW = intval($this->options->image_width);
    }else{
        $imgW = 205;
    }
    intval($this->options->image_height)?$imgH = intval($this->options->image_height):$imgH = 140;
?>
    <div id="main">
    <?php if($this->options->focus == 'display' && $this->is('index')){$this->need('focus.php');}?>
    <div class="row box">
        <div class="col-md-8">
        <?php if($this->is('index')):?>
        <?php 
        $db = Typecho_Db::get();
        $prefix = $db->getPrefix();
        $sticky_posts = $db->fetchAll($this->db
            ->select()->from($prefix.'contents')
            ->orWhere('cid=?',$this->options->sticky_1)
            ->orWhere('cid=?',$this->options->sticky_2)
            ->orWhere('cid=?',$this->options->sticky_3)
            ->orWhere('cid=?',$this->options->sticky_4)
            ->orWhere('cid=?',$this->options->sticky_5)
            ->where('type=? AND status=? AND password IS NULL','post','publish'));
        rsort($sticky_posts);
        foreach($sticky_posts as $sticky_posts){
            $result = Typecho_Widget::widget('Widget_Abstract_Contents')->push($sticky_posts);
            $post_views = number_format($result['views']);
            $post_title = htmlspecialchars($result['title']);
            $post_date  = date('Y-m-d',$result['created']);
            $permalink = $result['permalink'];
            $t1 = $post_date;
            $t2 = date('Y-m-d h:i:s');
            $diff = (strtotime($t2)-strtotime($t1))/3600;
            if($diff<24){
                $span = '<span class="title_new">NEW</span>';
            }
            if($this->options->view_time == 'display'){
                $span = '<span class="title_hot">'.$post_views.' VIEW</span>';
            }else{
                if($this->options->view_num){
                    if($post_views > $this->options->view_num){
                        $span = '<span class="title_hot">HOT</span>';
                    }
                }
            }
            echo '<h2 class="uptop">
                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i> 
                    <a href="'.$permalink.'" title="'.$post_title.'" target="_blank">
                        <i class="icon-eject icon-large"></i>'.$post_title.'
                    </a>
                    '.$span.'
                    <span>'.$post_date.'</span>
                  </h2>';
        }
    ?>
        <?php endif;?>
        <?php while ($this->next()):?>
            <article class="article-list-1 clearfix" id="post-<?php $this->cid();?>">
                <header class="clearfix">
                    <h1 class="post-title"><a href="<?php $this->permalink()?>" title="链向 <?php $this->title()?> 的固定链接"><?php $this->title()?></a></h1>
                    <div class="post-meta">
                        <span class="meta-span"><i class="fa fa-calendar"></i> <?php $this->date('Y-m-d')?></span>
                        <span class="meta-span"><i class="fa fa-user"></i><a href="<?php $this->author->permalink();?>" title="由<?php $this->author();?>发布" rel="author"><?php $this->author();?></a></span>
                        <span class="meta-span"><i class="fa fa-folder-open-o"></i> <?php $this->category(',',true,'未分类');?></span>
                        <?php 
                        if($this->options->view_time == 'display'){
                            if(Views_Plugin::theViews('','','0')>0){
                                echo ''.Views_Plugin::theViews('<span class="meta-span"><i class="fa fa-eye"></i> 围观','次</span>').'';
                            }
                        }
                        ?>
                        <span class="meta-span"><i class="fa fa-commenting-o"></i><a href="<?php $this->permalink()?>#comments"><?php $this->commentsNum();?>条评论</a></span>
                        <span class="meta-span hidden-xs"><i class="fa fa-tags" aria-hidden="true"></i> <?php $this->tags(', ',true,'');?></span>
                    </div>
                </header>
                <div class="post-content clearfix">
                <?php if($this->options->dis_href == 'display'):?>
                    <a href="<?php $this->permalink()?>" class="disp_a" rel="bookmark" title="链向 <?php $this->title() ?> 的固定链接">
                <?php endif;?>
                <?php 
                    if ( preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $r ) ){
                        echo '<img src="'.$this->options->themeUrl.'/timthumb.php?src='.$r['2']['0'].'&h=140&w=205&zc=1" alt="'.$this->title.'">';
                    }else{
                        //echo '<img src="'.$this->options->themeUrl.'/img/sj/1.jpg'.'" alt="xxx" width="205" height="104"/>';
                        echo '<img src="'.$this->options->themeUrl.'/timthumb.php?src='.$this->options->themeUrl.'/img/sj/54.jpg'.'&h=140&w=205&zc=1" alt="'.$this->title.'">';                        
                    };
                    $this->excerpt(200,'...');
                ?>
                <?php if($this->options->dis_href=='display'):?>
                    </a>
                <?php endif;?>
                    <a href="<?php $this->permalink()?>" class="more-link">
                    <?php if($this->options->readmore){
                            echo ''.$this->options->readmore().'';
                          }else{
                            echo "Read More >";
                          }
                    ?>
                    </a>
                </div>
                <div class="c-bot">
                    <?php if($this->tags):?>
                    <aside class="cb_bq">
                        <i class="fa fa-tags icon-large"></i>
                        <?php $this->tags(', ',true,'');?>
                    </aside>
                    <?php endif;?>
                    <?php if($this->user->hasLogin()):?>
                    <i class="fa fa-edit icon-large"></i>
                    <a class="post-edit-link" href="<?php $this->options->adminUrl('write-post.php?cid=' .$this->cid)?>">编辑</a>
                    <?php endif;?>
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