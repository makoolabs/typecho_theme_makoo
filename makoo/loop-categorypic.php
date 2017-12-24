<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php $this->need('header.php');?>
<div class="mbx">
    <i class="icon-home icon-large" style="font-size:14px;"></i>
    <a href="<?php $this->options->siteUrl();?>" class="gray">首页</a> > 
    <?php echo crumbsArchiveNav($this,$this->_archiveSlug); ?>
</div>
<div id="container">
    <div id="content" role="main" style="width:96%">
        <h1 class="page-title sucai_php">
            <?php $this->archiveTitle(array('category'=>_t('分类目录归档: <span>%s</span>'),),'','');?>
        </h1>
        <?php 
            $category_description = $this->_description;
            if(!empty($category_description))
                echo '<div class="archive-meta sucai_php">' . $category_description . '</div>';
        ?>
        <?php if(!$this->have()):?>
        <div id="post-0" class="post error404 not-found">
            <h1 class="entry-title">未找到</h1>
            <div class="entry-content">
                <p>抱歉，您浏览的页面未找到。也许搜索能帮到您 。</p>
                <form role="search" method="post" id="searchform" class="searchform" action="/">
                    <div>
                        <label class="screen-reader-text" for="s">搜索：</label>
                        <input type="text" value="" name="s" id="s"/>
                        <input type="submit" id="searchsubmit" value="搜索"/>
                    </div>
                </form>
            </div>
        </div>
        <?php else:?>
        <div class="page_box">
            <?php while($this->next()):?>
            <dl class="post_pic_box">
                <dt>
                    <a href="<?php $this->permalink();?>" title="链向 <?php $this->title()?> 的固定链接" rel="bookmark">
                    <?php if ( preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $r ) ){
                        echo '<img src="'.$this->options->themeUrl.'/timthumb.php?src='.$r['2']['0'].'&h=200&w=250&zc=1" alt="'.$this->title.'">';
                    };?>
                    </a>
                </dt>
                <dd class="info">TYPE : <a href="<?php category($this); ?>" title="查看<?php $this->category(',', false); ?>中的全部文章" rel="category tag"><?php $this->category(',', false); ?></a><span class="time"><?php $this->date('Y-m-d'); ?></span></dd>
                <dd><a href="<?php $this->permalink(); ?>" title="链向 <?php $this->title() ?> 的固定链接"><?php $this->title() ?></a></dd>
            </dl>
            <?php endwhile?>
            <div class="cls"></div>
        </div>
        <?php endif;?>
        <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;',6, '...', array('wrapTag' => 'div', 'wrapClass' => 'page_num', 'itemTag' => NULL, 'textTag' => '', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next')); ?>
    </div>
</div>
<script type="text/javascript">$('.loading').animate({'width':'55%'},50);</script>
<?php $this->need('sidebar.php'); ?>
<script type="text/javascript">$('.loading').animate({'width':'78%'},50);</script>
<?php $this->need('footer.php'); ?>
<script type="text/javascript">$('.loading').animate({'width':'100%'},50);</script>