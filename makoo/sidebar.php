<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<aside id="primary" class="side" role="complementary">
    <ul class="xoxo">
        <li id="siteinfowidget-2" class="widget-container widget_links">
            <h3 class="widget-title">站点统计</h3>
            <ul class="xoxo siteInfo">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat);?>
                <li>文章总数:<?php $stat ->publishedPostsNum()?>篇</li>
                <li>分类总数:<?php $stat->categoriesNum()?>个</li>
                <Li>标签总数:<?php tagsNum()?>个</li>
                <li>评论总数:<?php $stat->publishedCommentsNum()?>条</li>
                <li>页面总数:<?php $stat->publishedPagesNum()?>个</li>
                <li>网站已运行：<?php $this->options->buildDate=empty($this->options->buildDate)?date("Y-m-d"):$this->options->buildDate;echo floor((time()-strtotime($this->options->buildDate))/86400);?>天</li>
            </ul>
        </li>
        <li id="text-2" class="widget-container widget_text">
            <h3 class="widget-title">微博</h3>
            <div class="textwidget">
                <iframe width="350" height="450" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=350&height=450&fansRow=1&ptype=1&speed=0&skin=1&isTitle=0&noborder=1&isWeibo=1&isFans=1&uid=1864657763&verifier=7a1f59f4&dpc=1"></iframe>
            </div>
        </li>
        <li id="categories-3" class="widget-container widget_categories">
            <h3 class="widget-title">实验室文章汇总</h3>
            <ul>
                <li class="cat-item cat-item-196">
                    <a href="xx">xx0</a>(1)
                </li>
                <li class="cat-item cat-item-10">
                    <a href="xx">xx1</a>(19)
                </li>
            </ul>
        </li>
        <li id="tag_cloud-2" class="widget-container widget_tag_cloud">
            <h3 class="widget-title">标签</h3>
            <div class="tagcloud">
                <!--<?php $this->widget('Widget_Metas_Tag_Cloud',array('sort'=>'count','ignoreZeroCount'=>true,'desc'=>true,'limit'=>30))->to($tags);?>
                <?php while($tags->next()):?>
                    <a href="<?php $tags->permalink();?>" class="tag-link-<?php $tags->mid();?>" title="<?php $tags->count();?>个话题" style="font-size:14px;"><?php $tags->name();?>(<?php $tags->count();?>)</a>
                <?php endwhile;?>-->
                <a href="xxx" class="tag-link-50 tag-link-position-1" tile="208个话题" style="font-size:14px;">Unity3D(208)</a>
            </div>
        </li>
        <li id="recent-posts-4" class="widget-container widget_recent_entries">
            <h3 class="widget-title">近期文章</h3>
            <ul>
                <li>
                    <a href="xxx">xxx</a>
                </li>
            </ul>
        </li>
        <li id="catpostswidget-2" class="widget-container widget_random_posts">
            <h3 class="widget-title">随机文章</h3>
            <ul>
                <li>
                    <a href="xxxxx" title="xxxxx">xxxxx</a>
                </li>
            </ul>
        </li>
        <li id="text-11" class="widget-container widget_text">
            <h3 class="widget-title">赞助商广告</h3>
            <div class="textwidget">
                <!--<script type="text/javascript"></script>
                <script src="xxx" type="text/javascript"></script>-->
            </div>
        </li>
    <?php if(!empty($this->options->topicUrl)&&!empty($this->options->topicTitle)):?>
        <li class="widget-container widget_text">
            <div class="textwidget">
                <div class="d3_btn">
                    <a class="down_theme" href="<?php $this->options->topicUrl()?>">
                        <p><?php $this->options->topicTitle()?></p>
                    </a>
                </div>
                <div class="cls"></div>
            </div>
        </li>
    <?php endif;?>
    <?php if($this->options->sidebar_ad_1):?>
        <li id="text-1" class="widget-container widget_text">
            <div class="textwidget">
                <?php $this->options->sidebar_ad_1()?>
            </div>
        </li>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock)&&in_array('ShowRandomPosts',$this->options->sidebarBlock)):?>
        <li id="randomposts" class="widget-container widget_randomposts">
            <h3 class="widget-title">推荐阅读</h3>
            <ul>
                <?php random_posts(8,'<li><a href="{permalink}" title="title">{title}</a></li>');?>
            </ul>
        </li>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock)&&in_array('ShowHostPosts',$this->options->sidebarBlock)):?>
        <li id="views" class="widget-container widget_views">
            <h3 class="widget-title">最热文章</h3>
            <ul>
                <?php Views_Plugin::theMostViewed(8,'<li><a href="{permalink}" title="{title}">{title}</a> - {views} 次浏览 </li>');?>
            </ul>            
        </li>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock) && in_array('ShowNewPosts',$this->options->sidebarBlock)):?>
        <li id="recent-posts" class="widget-container widget_recent_entries">
            <h3 class="widget-title">最近更新</h3>
            <ul>
                <?php $this->widget('Widget_Contents_Post_Recent','pageSide=8')->parse('<li><a href="{permalink}" title="阅读 {title} 详细内容">{title}</a></li>');?>
            </ul>
        </li>
    <?php endif;?>
    <?php if(!empty($this->options->siderbarBlock) && in_array('ShowVisitors',$this->options->sidebarBlock)):?>
        <li id="ds-recent-visitors" class="widget-container ds-widget-recent-visitors">
            <h3 class="widget-title">最近访客</h3>
            <ul class="ds-recent-visitors" data-num-items="30" data-show-time="0" data-avatar-size="50"></ul>
        </li>
        <script>
            if(typeof( DUOSHUO!=='undefined'))
                DUOSHUO.RecentVisitors('.ds-recent-visitors');
        </script>
        <script tpe="text/javascript">
            var duoshuoQuery = {"short_name":"<?php $this->options->duoshuo_id()?>","theme":"<?php echo ($this->options->Duoshuo_theme)?$this->options->Duoshuo_theme:'default'?>","stylePatch":"typecho\/Front_Open_2"};
            (function(){
                var ds = document.createElement('script');ds.type = 'text/javascript';ds.async = true;
                ds.charset = 'UTF-8';
                ds.src = 'http://static.duoshuo.com/embed.js';
                (document.getElementByTagName('head')[0]||document.getElementByTagName('body')[0]).appendChild(ds);
            })();
        </script>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock)&&in_array('ShowComments',$this->options->siderbarBlock)):?>
        <li id="ds-recent-comments" class="widget-container ds-widget-recent-comments">
            <h3 class="widget-title">最近评论</h3>
            <ul class="ds-recent-comments" data-num-items = "5" data-show-avatars="1" data-show-time="1" data-show-title="0" data-show-admin="0" data-avatar=size="30" data-excerpt-length="70"></ul>
        </li>
        <script>
            if(typeof DUOSHUO !== 'undefined')
            DUOSHUO.RecentComments && DUOSHUO.RecentComments('.ds-recent-comments');
        </script>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock) && in_array('ShowCategory',$this->options->sidebarBlock)):?> 
        <li id="categories" class="widget-container widget_categories">
            <h3 class="widget-title">分类</h3>
            <ul>
                <?php $this->widget('Widget_Metas_Category_List')->parse('<li class="cat-item cat-item-{mid}"><a href="{permalink}" title="查看{name}下的所有文章">{name}</a>({count})</li>');?>
            </ul>
        </li>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock) && in_array('ShowArchive',$this->options->sidebarBlock)):?>
        <li id="archives" class="widget-container widget_archive">
            <h3 class="widget-title">归档</h3>
            <ul><?php $this->widget('Widget_Contents_Post_Date','type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a>({count})</li>');?></ul>
        </li>
    <?php endif;?>
    <?php if(!empty($this->options->sidebarBlock)&&in_array('ShowLinks',$this->options->sidebarBlock)):?>
        <li id="linkcat" class="widget-container widget_links">
            <h3 class="widget-title">左邻右舍</h3>
            <ul class="xoxo blogroll">
                <?php Links_Plugin::output("<li><a href=\"{url}\" target=\"_blank\">{name}</a></li>");?>
            </uL>
        </li>
    <?php endif;?>
    <?php if($this->options->sidebar_ad_2):?>
    <li id="text-2" class="widget-container widget_text">
        <div class="textwidget">
            <?php $this->options->sidebar_ad_2()?>
        </div>
    </li>
    <?php endif;?>
    </ul>
</aside>