<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php 
    if($this->options->dis_num){
        $dis_num = $this->options->dis_num;
    }else{
        $dis_num = 150;
    }
    if($this->options->image_width){
        $imgW = intval($this->options->image_width);
    }else{
        if($this->options->timThumb == 'display'){
            $imgW = 'auto';
        }else{
            $imgW = 205;
        }
    }
    intval($this->options->image_height)?$imgH = intval($this->options->image_height):$imgH = 140;
?>
<?php if($this->options->focus == 'display' && $this->is('index')){$this->need('focus.php');}?>
<div class="top_box">
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
            echo '<div class="top_post">
                    <div class="title">置 顶</div>
                    <article class="ulist">
                        <h2>
                            <a href="'.$permalink.'" title="'.$post_title.'" rel="bookmark">
                                <i class="icon-eject icon-large"></i>'.$post_title.'
                            </a>
                            '.$span.'
                            <span>'.$post_date.'</span>
                        </h2>
                    </article>
                  </div>';
        }
    ?>
    <?php endif;?>
</div>
<?php while($this->next()):?>
<article class="post_box">
    <div class="c-top" id="post-<?php $this->cid();?>">
        <div class="datetime">
            <?php $this->date('Y')?><br/>
            <?php $this->date('m-d');?>
        </div>
        <header class="tit">
            <h2 class="h1">
                <a href="<?php $this->permalink()?>" title="链向 <?php $this->title()?> 的固定链接" rel="bookmark"><?php $this->title();?></a>
                <?php echo '<span class="title_hot">HOT</span>'; ?>
            </h2>
                <aside class="iititle">
                    <span>
                        <i class="icon-user icon-large"></i>
                        <a href="<?php $this->author->permalink();?>" title="由<?php $this->author();?>发布" rel="author"><?php $this->author();?></a>
                    </span>
                    <span>
                        <i class="icon-folder-open icon-large"></i>
                        <?php $this->category(',',true,'未分类');?>
                    </span>
                    <?php 
                    if($this->options->view_time == 'display'){
                        if(Views_Plugin::theViews('','','0')>0){
                            echo ''.Views_Plugin::theViews('<span><i class="icon-eye-open icon-large"></i> 围观','次</span>').'';
                        }
                    }
                    ?>
                    <span>
                        <i class="icon-comment-alt icon-large"></i>
                        <a href="<?php $this->permalink()?>#comments"><?php $this->commentsNum();?>条评论</a>
                    </span>
                </aside>
        </header>
    </div>
    <div class="c-con">
        <?php //if($ifpic == 'display'){the_post_thumbnail('thumbnail');}?>
        <?php if($this->options->dis_href == 'display'):?>
            <a href="<?php $this->permalink()?>" class="disp_a" rel="bookmark" title="链向 <?php $this->title() ?> 的固定链接">
        <?php endif;?>
                <?php //if($ifpic != 'display'){?>
                    <?php// if(has_post_thumbnail()){?>
                        <?php /*post_thumbnail($imgW,$imgH,lateLoad('data-').'src');
                            if(has_excerpt()) the_excerpt();
                            else
                            echo dm_strimwidth(strip_tags($post->post_content),0,$dis_num,'....');
                          }elseif(catch_that_image()){
                              post_thumbnail($imgW,$imgH,lateLoad('data-').'src');
                              if(has_excerpt()) the_excerpt();
                              else
                              echo dm_strimwidth(strip_tags($post->post_content),0,$dis_num,'....');
                          }else{
                              if(has_excerpt())the_excerpt();
                              else
                              echo dm_strimwidth(strip_tags($post->post_content),0,$dis_num+50,'....');
                          }
                        }
                        if($ifpic == 'display'){the_content('Read More >',$strip_teaser,$more_file);}
                        wp_link_pages(array('before'->'<div class="page-link"'.__('Pages:','frontopen'),'after'=>'</div>'));*/
                        ?>
                <?php 
                    if ( preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $r ) ){
                        echo '<img src="'.$this->options->themeUrl.'/timthumb.php?src='.$r['2']['0'].'&h=140&w=205&zc=1" alt="'.$this->title.'">';
                    }else{
                        //echo '<img src="'.$this->options->themeUrl.'/img/sj/1.jpg'.'" alt="xxx" width="205" height="104"/>';
                        echo '<img src="'.$this->options->themeUrl.'/timthumb.php?src='.$this->options->themeUrl.'/img/sj/54.jpg'.'&h=140&w=205&zc=1" alt="'.$this->title.'">';                        
                    };
                    $this->excerpt($dis_num,'...');
                ?>
            <?php if($this->options->dis_href=='display'){?>
            </a>
            <?php }?>
        <a href="<?php $this->permalink()?>" class="more-link">
            <?php 
            if($this->options->readmore){
                echo ''.$this->options->readmore().'';
            }else{
                echo "Read More >";
            }
            ?>
        </a>
        <div class="cls"></div>
    </div>
    <div class="c-bot">
        <?php if($this->tags):?>
        <aside class="cb_bq">
            <i class="icon-tag icon-large"></i>
            <?php $this->tags(', ',true,'');?>
        </aside>
        <?php endif;?>
        <?php if($this->user->hasLogin()):?>
        <i class="icon-edit icon-large"></i>
        <a class="post-edit-link" href="<?php $this->options->adminUrl('write-post.php?cid=' .$this->cid)?>">编辑</a>
        <?php endif;?>
        <div class="cls"></div>
    </div>
</article>
<?php //comments_template('',true);?>
<?php endwhile;?>
<div class="cls"></div>
<!--<div class="page_num">
    <a href='http://www.frontopen.com/' class='current'>1</a>
    <a href='http://www.frontopen.com/page/2'>2</a>
    <a href='http://www.frontopen.com/page/3'>3</a>
    <a href='http://www.frontopen.com/page/4'>4</a>
    <a href='http://www.frontopen.com/page/5'>5</a>
    <a href='http://www.frontopen.com/page/6'>6</a>
    <a href='http://www.frontopen.com/page/7'>7</a>
    <a href='http://www.frontopen.com/page/8'>8</a>
    <a href='http://www.frontopen.com/page/9'>9</a>
    <a href='http://www.frontopen.com/page/10'>10</a>
    <a href="http://www.frontopen.com/page/2" >下一页 &raquo;</a>
</div>-->
<?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;',6, '...', array('wrapTag' => 'div', 'wrapClass' => 'page_num', 'itemTag' => NULL, 'textTag' => '', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next')); ?>