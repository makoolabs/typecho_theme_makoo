<?php //显示文章?>
<?php while($this->next()): ?>
    <div class="post">
	<h2 class="entry_title"><a href="<?php $this->permalink() //文章所在的连接?>"><?php $this->title() //文章标题?></a></h2>
	<div class="entry_data">
	    Published by <a href="<?php $this->author->permalink(); //文章作者地址?>"><?php $this->author();//文章作者 ?></a> on <?php $this->date('F j, Y'); //文章的发布日期，格式可参考PHP日期格式?> in <?php $this->category(',');//文章所在分类 ?>.
	    <?php $this->commentsNum('%d Comments'); //	文章评论数及连接?>.
	</div>
	<div class="entry_text">
	    <?php $this->content('Continue Reading...');//文章内容，其中的“Continue Reading…”是显示摘要时隐藏部分的邀请连接 ?>
	</div>
    </div>
<?php endwhile; ?>
<?php $this->pageNav(); //文章分页?>
<?php //页面导航?>
<ul class="clearfix" id="nav_menu">
    <li><a href="<?php $this->options->siteUrl(); ?>">Home</a></li>
    <?php $this->widget('Widget_Contents_Page_List')
               ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
<?php $this->options->siteUrl(); //网站的首页地址?>
<?php $this->options->title();//网站名称?>
<?php $this->options->description() //网站的一些简短描述、介绍?>
<?php //站内搜索?>
<form method="post" action="">
    <div><input type="text" name="s" class="text" size="32" /> <input type="submit" class="submit" value="Search" /></div>
</form>
<?php //最新文章列表?>
<ul>
    <?php $this->widget('Widget_Contents_Post_Recent')
               ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
<?php //最新回复列表?>
<ul>
    <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
    <?php while($comments->next()): ?>
        <li><?php $comments->author(false); ?>: <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(10, '[...]'); ?></a></li>
    <?php endwhile; ?>
</ul>
<?php //文章分类列表?>
<ul>
    <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
</ul>
<?php //按月归档?>
<ul>
    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
               ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
    </ul>
<?php //其它连接?>
<ul>
    <?php if($this->user->hasLogin()): ?>
        <li class="last"><a href="<?php $this->options->index('Logout.do'); ?>">Logout (<?php $this->user->screenName(); ?>)</a></li>
    <?php else: ?>
        <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>">Login</a></li>
    <?php endif; ?>
</ul>
<?php//RSS地址 页脚文件，推荐大家把一些较大的js放在这个文件中最后载入，不会影响阅读。看看我们的footer要讲解些什么？?>
<a href="<?php $this->options->feedUrl(); ?>">Entries (RSS)</a> <!-- 文章的RSS地址连接 -->
<a href="<?php $this->options->commentsFeedUrl(); ?>">Comments (RSS)</a>. <!-- 评论的RSS地址连接 -->
<?php //typecho可以使用is语法判断很多东西?>
<?php 
//需要注意的是，后面的参数是分类、页面的缩略名 写法
$this->is('index');
$this->is('archive');
$this->is('single');
$this->is('page');
$this->is('post');
$this->is('category');
$this->is('tag');
$this->is('category','default');
$this->is('page','start');
$this->is('post',1);
?>
<?php //自定义页面title显示方式?>
<?php $this->archiveTitle($split, $before, $end); ?>
<?php
//$split:多级菜单间的分隔符，如：2009 » 12
//$before:title 前显示的字符
//$end:title 后显示的字符
 ?>
 <?php //页面面包屑?>
 <?php //什么是面包屑？ 面包屑通常用来展示页面在站点中的位置，使访客不会迷失方向，如：Home » Journal » Hello World?>
<?php 
//首页 » 最新文章
//首页 » 分类名称 » 文章标题
//首页 » 归档年份 » 归档月份
//首页 » 页面名称
//首页 » 分类名称
//首页 » 标签名称
//首页 » 搜索关键词或其他信息
?>
<div class="crumbs_patch">
	<a href="<?php $this->options->siteUrl(); ?>">Home</a> &raquo;</li>
	<?php if ($this->is('index')): ?><!-- 页面为首页时 -->
		Latest Post
	<?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
		<?php $this->category(); ?> &raquo; <?php $this->title() ?>
	<?php else: ?><!-- 页面为其他页时 -->
		<?php $this->archiveTitle(' &raquo; ','',''); ?>
	<?php endif; ?>
</div>
<?php //分离文章的评论和引用通告?>
<?php $this->comments()->to($comments); //显示全部（默认）?>
<?php $this->comments('comment')->to($comments);//只显示 comment?>
<?php $this->comments('trackback')->to($trackback);//只显示 trackback?>
<?php $this->comments('pingback')->to($pingback);//只显示 pingback?>
<?php //调用相关文章?>
<?php $this->related(5)->to($relatedPosts); ?>
    <ul>
    <?php while ($relatedPosts->next()): ?>
    <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
    <?php endwhile; ?>
</ul>
<?php $this->related($limits, $type);?>
<?php 
//$limits 默认值为 5，表示显示的相关文章数量
//$type 默认值为 NULL，表示文章的相关方式，只接受 author。当 $type 为 author 时，根据用户显示相关文章；为其他值时，根据标签显示相关文章。=
?>
<?php //调用某一分类下的文章？》然后操作$categoryPosts这个变量即可?>
<?php $this->widget('Widget_Archive@myCustomCategory', 'type=category', 'mid=1')->to($categoryPosts); ?>
<?php //获取分类描述?>
<?php echo $this->getDescription(); ?>
<?php //鼠标悬停时显示分类描述?>
<?php $this->widget('Widget_Metas_Category_List')
                ->parse('<li><a href="{permalink}" title="{description}">{name}</a> ({count})</li>'); ?>
<?php // 创建自定义模板?>
<?php //1.自定义首页模板?>
<?php //在当前模板目录下面建你需要的文件（例如：home.php），然后再文件的开头加上如下代码(需在 package 后面加上 index)就算是自定义了好了一个首页；?>
<?php //<?php
/**
 * 自定义首页模板
 *
 * @package index
 */
//然后进入后台的『设置』-『文章』页面，选择“站点首页”中的“直接调用[home.php]模板文件”，保存即可。
?>
<?php //2.自定义页面(page)模板?>
<?php //只需要在当前模板目录下面建你需要的文件，然后再文件的开头加上如下代码(需在 package 后面加上 custom)就算是自定义了好了一个页面，可以自定义多个页面；?>
<?php 
//<?php
/**
 * 自定义页面模板
 *
 * @package custom
 */
//其中　@package custom　是必须的，然后进入 typecho 后台在『创建页面』的【展开高级选项】里就可以看到

?>
<?php //自定义分类模板?>
<?php //方法一
//直接在当前模板目录下建立一个名为 category 的目录，然后在里面放上以你需要单独做模板分类的缩略名为文件名的 php 文件，比如 default.php，这样，在访问缩略名为default的分类时，它会自动调用这个模板。?>
<?php //方法二
//在模板文件中使用 is 语法判断页面?>
<?php if ($this->is('category', 'default')): ?>
//默认分类模板
<?php endif; ?>
<?php if ($this->is('category', 'category2')): ?>
//分类2模板
<?php endif; ?>
<?php //自定义页面列表显示条数?>
<?php //模板目录下建立一个名为 functions.php 的文件 然后里面写一个函数（示例是控制 jobs 分类下的文章列表显示条数为 10 条）?>
<?php //自定义404页面?>
<?php 
/*使用自定义的404页面非常简单，只需要如下两步
自己制作一个HTML页面，把它命名为404.php
把这个页面放到你当前的模板目录下*/
?>
<?php //自定义错误页面?>
<?php 
/*如果你厌倦了千篇一律的typecho报错页面，你可以通过以下简单的方法来使用自己的报错页面
随便创建一个php文件(有两个变量你可以在这个php里直接使用，分别为$code和$message，它们分别代表错误代码和错误信息)
把它传到你服务器的某个路径
打开config.inc.php，加入一行*/
//define('__TYPECHO_EXCEPTION_FILE__', '你的文件路径');
?>
<?php //自定义评论列表区域?>
<?php function threadedComments($comments, $options) {//1.使用自定义评论函数
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
<?php //自定义评论的代码结构?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
            <?php $comments->gravatar('40', ''); ?>
            <cite class="fn"><?php $comments->author(); ?></cite>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>
        <?php $comments->content(); ?>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
<?php //注意：上面的自定义评论代码输出的，就是本来评论页里的下面这段代码，所以你就不用对这段代码做任何更改了。?>
<?php $comments->listComments(); ?>
<?php //最新版本更新：首次评论审核提示，在自定义评论代码的适当地方添加以下语句，否则将看不到审核提示语句。?>
<?php $singleCommentOptions->commentStatus(); ?>
<?php //自定义头部信息输出?>
<?php //在默认的模板中，头部信息的输出的结果是这样的?>
<meta name="description" content="Just So So ..." />
<meta name="keywords" content="typecho,php,blog" />
<meta name="generator" content="Typecho 0.8/10.8.15" />
<meta name="template" content="default" />
<link rel="pingback" href=".../action/xmlrpc" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href=".../action/xmlrpc?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href=".../action/xmlrpc?wlw" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href=".../feed/" />
<link rel="alternate" type="application/rdf+xml" title="RSS 1.0" href=".../feed/rss/" />
<link rel="alternate" type="application/atom+xml" title="ATOM 1.0" href=".../feed/atom/" />
<?php //加上你要设置的参数即可，比如：?>
<?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw='); ?>
<?php 
/*keywords：关键词
description：描述、摘要
rss1：feed rss1.0
rss2：feed rss2.0
atom：feed atom
generator：程序版本等
template：模板名称
pingback：文章引用
xmlrpc：离线写作
wlw：m$的离线写作工具
commentReply：评论回复*/
//等号（=）为空则不输出该项目，各个参数之间使用 “&” 连接。 如果需要自定义rss地址，只填上 rss2=feed订阅地址 即可。
?>
<?php //输出标签云?>
<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<ul class="tags-list">
<?php while ($tags->next()): ?>
    <li><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
    <li><?php _e('没有任何标签'); ?></li>
<?php endif; ?>
</ul>
<?php //参数说明?>
<?php 
//sort：排序方式为 mid；
//ignoreZeroCount：忽略文章数为 0 的；
//desc：是否降序输出；
//limit：输出数目
?>
<?php //随机颜色标签云?>
<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
<ul class="tags-list">
<?php while($tags->next()): ?>
    <li><a style="color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
</ul>
<?php //输出$this的所有内容?>
<?php print_r($this);?>
<?php //炫酷的 themeFields?>
<?php //为你的主题增加一个自动绑定的输入框?>
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}

