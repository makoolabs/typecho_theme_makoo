<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<div class="mbx">
    <i class="icon-home icon-large" style="font-size:14px;"></i>
    <a href="<?php $this->options->siteUrl(); ?>" class="gray">首页</a> >
	<?php echo crumbsNav($this); ?> > <?php $this->title() ?>
</div>
<div id="post-<?php $this->cid(); ?>" class="post-4430 post type-post status-publish format-standard hentry category-ugui tag-ugui">
    <div class="c-top2" id="post-<?php $this->cid();?>">
        <div class="datetime">
            <?php $this->date('Y') ?><br />
            <?php $this->date('m-d') ?>
        </div>
        <header class="tit">
            <h1 class="entry-title"><?php $this->title(); ?></h1>
			<aside class="entry-meta iititle2">
                <span>
                    <i class="icon-user icon-large"></i> 
                    <a href="<?php $this->author->permalink(); ?>" title="由<?php $this->author(); ?>发布" rel="author"><?php $this->author(); ?></a>
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
                <span>
                    <i class="icon-pencil icon-large"></i> 编辑日期：<time><?php $modified = new Typecho_Date($this->modified); echo $modified->format('Y-m-d');?></time>
                </span>
                <span>
                    <i class="icon-zoom-in icon-large"></i> 字体：
                    <a href="javascript:;" onclick="checkFontSize(18)">大</a> 
                    <a href="javascript:;" onclick="checkFontSize(16)">中</a> 
                    <a href="javascript:;" onclick="checkFontSize(14)">小</a>
                </span>
            </aside>
        </header>
        <div class="cls"></div>
    </div>
    <!-- .entry-meta -->
    <article class="entry-content">
        <?php if($this->options->post_ad_1){?>
        <div class="ad_1">
        <?php echo $this->options->post_ad_1; ?>
        </div>
        <?php }?>
        <?php $this->content(); ?>
        <div class="loc_link">
            <ul>
                <li>
                    本文固定链接: <a href="<?php $this->permalink() ?>" rel="bookmark" title="<?php $this->title(); ?>"><?php echo $this->permalink() ?></a>
                </li>
                <li>
                    转载请注明: <?php if($this->options->zhuanzai){echo $this->options->zhuanzai;}else{ ?><a href="<?php $this->author->permalink(); ?>" title="由<?php $this->author(); ?>发布" rel="author"><?php $this->author(); ?></a> <time><?php $this->date('Y年m月d日')?> </time>于 <a href="<?php $this->options->siteUrl(); ?>/" title="访问<?php $this->options->title();?>"><?php $this->options->title();?></a> 发表<?php }?>
                </li>
            </ul>
        </div>
        <div style="margin-top:10px">
            <center>
                <script type="text/javascript">
                document.write('<iframe width="150" height="239" frameborder="0" scrolling="no" src="http://widget.weibo.com/relationship/bulkfollow.php?language=zh_cn&uids=1864657763&wide=1&color=C2D9F2,FFFFFF,0082CB,666666&showtitle=1&showinfo=1&sense=0&verified=1&count=1&refer='+encodeURIComponent(location.href)+'&dpc=1"></iframe>');
                </script>
            </center>
            <h3><font color="red">Makoo实验室提醒您：亲，如果您觉得本文不错，快快将这篇文章分享出去吧 。另外请点击网站顶部彩色广告或者捐赠支持本站发展，谢谢！</font></h3>
            <div class="bshare-custome">
                <a title="分享到" href="http://www.bshare.cn/share" id="bshare-shareto" class="bshare-more"></a>
                <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                <a title="分享到腾讯微博" class="bshare-qqmb"></a>
                <a title="分享到微信" class="bshare-weixin"></a>
                <a title="分享到QQ空间" class="bshare-qzone"></a>
                <a title="分享到QQ好友" class="bshare-qqim"></a>
                <a title="分享到腾讯朋友" class="bshare-qqxiaoyou"></a>
                <a title="分享到人人网" class="bshare-renren"></a>
                <a title="分享到开心网" class="bshare-kaixin001"></a>
                <a title="分享到豆瓣" class="bshare-douban"></a>
                <a title="分享到百度空间" class="bshare-baiduhi"></a>
                <!-- 在这里添加更多平台 -->
                <a title="更多平台" id="bshare-more-icon" class="bshare-more"></a>
                <span class="BSHARE_COUNT bshare-share-count">--</span>
            </div>
            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=f7f0b5c9-cf9f-4765-bcc8-30cac77d5462&style=-1"></script>
            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC3.js"></script>
            <div class="cls"></div>
        </div>
        <div class="author_info">
            <div class="au_top_bar">
                <div class="edit_date">
                    最后编辑：<time><?php $modified = new Typecho_Date($this->modified);echo $modified->format('Y-m-d');?></time>
                </div>
                <b>作者：<?php $this->author();?></b>
            </div>
            <div class="avatar">
                <?php echo '<img src="'. ($this->request->isSecure() ? 'https://secure' : 'http://www') . '.gravatar.com/avatar/' . md5(strtolower($this->author->mail)) . '?s=96&r=G' .'&d=mm" alt="' . $this->author->screenName . '"class="avatar" height="96" width="96" />'; ?>
            </div>
            <div class="type_out">
                <span class="ttxx">
                    <?php if($this->options->author_description){$this->options->author_description();}else{echo "这个作者貌似有点懒，什么都没有留下。";}?>
                </span>
                <div class="au_links">
                    <a href="<?php $this->author->permalink();?>" class="c1">
                        <i class="icon-home"></i> 站内专栏
                    </a>
                    <?php //if($this->author->url()){?> 
                    <a href="<?php $this->author->url();?>" class="c2" target="_blank" rel="external nofollow">
                        <i class="icon-globe"></i> 站点
                    </a>
                    <?php// }?>
                    <?php //if($curauth->qq){?> 
                        <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php //echo $curauth->qq; ?>&site=qq&menu=yes" class="c4">
                            <i class="icon-comments-alt"></i> QQ交谈
                        </a>
                    <?php //}?>
                    <?php //if($curauth->tengxunweibo){?> 
                        <a href="<?php// echo $curauth->tengxunweibo?>" class="c5" target="_blank" rel="external nofollow">
                        <i class="icon-pinterest-sign"></i> 腾讯微博
                    </a>
                    <?php //}?>
                    <?php //if($curauth->sinaweibo){?> 
                        <a href="<?php// echo $curauth->sinaweibo?>" class="c6" target="_blank" rel="external nofollow">
                            <i class="icon-linkedin-sign"></i> 新浪微博
                        </a>
                    <?php //}?>
                </div>
            </div>
            <div class="cls"></div>
        </div>
        <div style="display:none"><?php echo $this->options->zhifu_url;?></div>
        <?php if($this->options->zhifu_url){?>
        <div class="j_zeng">
            <!--<a href="<?php echo $this->options->zhifu_url; ?>" target="_blank" class="jz_bt" rel="external nofollow">捐  赠</a>-->
            <span>
                <!--<a href="" target="_blank" class="jz_bt" rel="external nofollow">捐  赠</a><span>如果您愿意花10块钱请我喝一杯咖啡的话，请用手机扫描二维码即可通过支付宝直接向我捐款哦。-->
                <!--<?php if($this->options->juankuan){echo $this->options->juankuan;}else{echo "如果您觉得这篇文章有用处，请支持作者！鼓励作者写出更好更多的文章！";}?>-->
            </span>
        </div>
        <?php }?>
    </article>
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
<br />
<div id="nav-below" class="navigation">
    <div class="nav-previous"><?php theNext($this)?></div>
    <div class="nav-next"><?php thePrev($this)?></div>
</div><!-- #nav-below -->
<div class="cls"></div>
<?php if($this->options->post_ad_2) {?>
<div class="ad_2">
    <?php echo $this->options->post_ad_2; ?>
</div>
<?php }//else{?>
<!--<div class="ad_2">
    <?php// echo get_option('themes_fo2_mobile_ad_2'); ?>
</div>-->
<?php //}?>
<div class="relatedposts">
    <h3 class="widget-title"><i class="icon-warning-sign"></i> 您可能还会对这些文章感兴趣！</h3>
    <ul>
	<?php
	/*$post_num = 8; 
	global $post;
	$exists_related_ids = array();
	$tmp_post = $post;
	$tags = ''; $i = 0;
	$exists_related_ids[] = $post->ID;
	if ( get_the_tags( $post->ID ) ) {
	foreach ( get_the_tags( $post->ID ) as $tag ) $tags .= $tag->name . ',';
	$tags = strtr(rtrim($tags, ','), ' ', '-');
	$myposts = get_posts('numberposts='.$post_num.'&tag='.$tags.'&exclude='.$post->ID);
	foreach($myposts as $post) {
	setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"><?php the_title(); ?></a></li>
	<?php
	$exists_related_ids[] = $post->ID;
	$i += 1;
	}
	}
	if ( $i < $post_num ) {
	$post = $tmp_post; setup_postdata($post);
	$cats = ''; 
	$post_num -= $i;
	foreach ( get_the_category( $post->ID ) as $cat ) $cats .= $cat->cat_ID . ',';
	$cats = strtr(rtrim($cats, ','), ' ', '-');
	$myposts = get_posts('numberposts='.$post_num.'&orderby=rand&category='.$cats.'&exclude='. implode(",", $exists_related_ids));
	foreach($myposts as $post) {
	setup_postdata($post);
	?>
	<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"><?php the_title(); ?></a></li>
	<?php
	}
	}
	$post = $tmp_post; setup_postdata($post);*/
	?></ul>
<div class="cls"></div>
</div>
<?php $this->need('comments.php');
