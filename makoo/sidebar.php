<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<aside class="widget clearfix">
    <form id="searchform" action="/">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="搜索…" value="请输入关键词开始搜索吧" name="s" id="s" onclick="this.value = '';" onkeypress="javascript:if(event.keyCode == 13){query(this.value);}">
            <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></span>
        </div>
    </form>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">文章分类</h4>
    <ul class="widget-cat">
        <?php $this->widget('Widget_Metas_Category_list')->to($categorys);?>
        <?php while($categorys->next()):?>
            <?php if($categorys->levels ===0):?>
                <?php $children = $categorys->getAllChildren($categorys->mid);?>
                <li class="cat-item cat-item-<?php $categorys->mid()?>"><a href="<?php $categorys->permalink()?>" title="查看<?php $categorys->name()?>下的所有文章"><?php $categorys->name()?></a>(<?php $categorys->count()?>)</li>
                <?php if(!empty($children)){?>
                    <ul class="widget-cat" style="margin-left:20px;">
                        <?php foreach($children as $mid){?>
                            <?php $child = $categorys->getCategory($mid)?>
                            <li class="cat-item cat-item-<?php echo $child['mid']?>"><a href="<?php echo $child['permalink']?>" title="查看<?php echo $child['name']?>下的所有文章"><?php echo $child['name']?></a></li>
                        <?php }?>
                    </ul>
                <?php }?>
            <?php endif?>
        <?php endwhile;?>
    </ul>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">微博</h4>
    <ul class="widget-title">
        <iframe width="280" height="300" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=280&height=300&fansRow=1&ptype=1&speed=0&skin=1&isTitle=0&noborder=1&isWeibo=1&isFans=1&uid=1864657763&verifier=7a1f59f4&dpc=1"></iframe>
    </ul>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">站点统计</h4>
    <?php Typecho_Widget::widget('Widget_Stat')->to($stat);?>
    <ul class="widget-title">
        <li>文章总数:<?php $stat ->publishedPostsNum()?>篇</li>
        <li>分类总数:<?php $stat->categoriesNum()?>个</li>
        <Li>标签总数:<?php tagsNum()?>个</li>
        <li>评论总数:<?php $stat->publishedCommentsNum()?>条</li>
        <li>页面总数:<?php $stat->publishedPagesNum()?>个</li>
        <li>网站已运行：<?php $this->options->buildDate=empty($this->options->buildDate)?date("Y-m-d"):$this->options->buildDate;echo floor((time()-strtotime($this->options->buildDate))/86400);?>天</li>
    </ul>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">最近更新</h4>
    <ul class="widget-hot">
        <?php $this->widget('Widget_Contents_Post_Recent','pageSide=8')->parse('<li><a href="{permalink}" title="阅读 {title} 详细内容">{title}</a></li>');?>
    </ul>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">热门文章</h4>
    <ul class="widget-hot">
        <?php Views_Plugin::theMostViewed(8,'<li><a href="{permalink}" title="{title}">{title}</a> - {views} 次浏览 </li>');?>
    </ul>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">随机推荐</h4>
    <ul class="widget-hot">
     <?php random_posts(10)?>
    </ul>
</aside>
<aside class="widget clearfix">
    <h4 class="widget-title">标签云</h4>
    <?php $this->widget('Widget_Metas_Tag_Cloud','ignoreZeroCount=1&limit=30')->to($tags);?>
    <div class="widget-tags">
       <?php while($tags->next()):?>
           <li><a style="color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a></li>
       <?php endwhile?>
    </div>
</aside>
<?php if($this->options->sidebar_ad_1):?>
    <aside class="widget clearfix">
        <ul class="widget-title">
            <?php $this->options->sidebar_ad_1()?>
        </ul>
    </aside>
<?php endif;?>
<aside class="widget clearfix">
    <h4 class="widget-title">归档</h4>
    <ul class="widget-title">
        <?php $this->widget('Widget_Contents_Post_Date','type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a>({count})</li>');?>
    </ul>
</aside>
<?php if ($this->is('index')||$this->is('front')) { ?>
<aside class="widget clearfix">
    <h4 class="widget-title">左邻右舍</h4>
    <ul class="widget-links">
        <?php Links_Plugin::output("<li><a href=\"{url}\" target=\"_blank\">{name}</a></li>");?>
    </ul>
</aside>
<?php } ?>
<?php if($this->options->sidebar_ad_2):?>
    <aside class="widget clearfix">
        <ul class="widget-title">
            <?php $this->options->sidebar_ad_2()?>
        </ul>
    </aside>
<?php endif;?>