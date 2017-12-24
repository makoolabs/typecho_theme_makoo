<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php define("THEME_URL",str_replace('//usr','/usr',str_replace($this->options->siteUrl,$this->options->rootUrl.'/',$this->options->themeUrl)));if(!empty($this->options->CDNURL)){$theUrl = $this->options->CDNURL.'/MakooCDN/';}else{$theUrl = THEME_URL.'/';}define("asseturl",$theUrl);?>
<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta name="author" content="Victor,makoolabs@163.com">
    <meta name="Robots" content="index,follow">
    <meta http-equiv="x-dns-prefetch-control" content="on"/>
    <link ref="dns-prefetch" href="<?php echo asseturl;?>">
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta property="og:type" content="blog"/>
    <?php if($this->is('post')||$this->is('page')):?>
    <meta property="og:image" content="<?php echo asseturl.$this->options->logo_img;?>"/>
    <meta property="og:release_date" content="<?php $this->date('Y-m-j');?>"/>
    <meta property="og:title" content="<?php $this->title();?>"/>
    <meta property="og:description" content="<?php $this->description()?>"/>
    <meta property="og:author" content="<?php $this->author();?>"/>
    <?php else:?>
    <meta property="og:image" content="<?php echo asseturl.$this->options->logo_img;?>"/>
    <?php if($this->options->starttime){?>
    <meta property="og:release_date" content="<?php $this->options->starttime();?>"/>
    <?php };?>
    <meta property="og:title" content="<?php if($this->is('index') || $this->is('front')):?><?php $this->options->title();?><?php else: ?><?php echo $this->getArchiveTitle();?><?php endif;?>"/>
    <meta property="og:description" content="<?php if($this->is('index')||$this->is('front')):?><?php $this->options->description()?><?php else:?><?php echo $this->getArchiveSlug();?><?php endif;?>"/>
    <meta property="og:author" content="<?php $this->author();?>"/>
    <?php endif;?>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="theme-color" content="#000000"/>
    <meta name="full-screen" content="yes"/>
    <meta name="x5-fullscreen" content="true"/>
    <link rel="shortcut icon" href="<?php echo asseturl;?>images/favicon.png"/>
    <link rel="apple-touch-icon" href="<?php echo asseturl;?>images/favicon.png">
    <?php if($this->is('post')||$this->is('page')):?>
        <link rel="canonical" href="<?php $this->permalink();?>"/>
    <?php endif;?>
    <title>
        <?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - ';?>
        <?php $this->archiveTitle(array(
            'category'=>_t('分类 %s 下的文章'),
            'search'=>_t('包含关键字 %s 的文章'),
            'tag' => _t('标题 %s 下的文章'),
            'author'=>_t('%s 的主页')
        ),'',' - ');?>
        <?php $this->options->title();?>
        <?php if($this->is('index')||$this->is('front')):?>
        <?php endif;?>
    </title>
    <link rel="stylesheet" href="<?php echo asseturl?>app.min.css?v=<?php echo VERSION?>">
    <style type="text/css">
    .navcon ul li{float:left;background:url(<?php echo asseturl.'images/li_right.gif';?>) right repeat-y;}.navcon ul li a:hover,.navcurrent{color:#fd5e02 !important;background:url(<?php echo asseturl.'images/li_right.gif';?>) #000 right repeat-y;}
    @media screen and(min-width:1366px){.c-con{height:140px;}}
    .entry-content p{text-indent:2em;}.entry-content p iframe{margin-left:-2em;}
    </style>
    <?php if($this->options->page_width){?>
    <style type="text/css">body{max-width:<?php $this->options->page_width;?>px;_width:<?php echo $this->options->page_wdith;?>px;margin:auto;}
    <?php if($this->options->page_width<1366){echo ".post_box{width:95%;height:auto;}";}?>
    @media screen and(max-width:960px){body{width:100%;margin:auto;}.post_box{width:100%;height:auto;}.main{width:100% !important;}.side{width:25%;}.page_php{width:72% !important;}#content{width:75%;}}
     <?php if($this->options->page_width<=959){echo ".main{width:70%;}.side{width:30%;}.page_php{width:67% !important;}#content{width:70%;}";}?>
    </style>
    <?php }?>
    <?php if($this->options->css):?>
    <style><?php $this->options->css();?></style>
    <?php endif;?>
    <!--[if lt IE 9]
    <script src="<?php $this->options->themeUrl('html5.js');?>"></script>
    <style>body{overflow-y:hidden;}</style>
    <div class="browsehappy" role="dialog"><a href="http://browsehappy.com/"><img src="<?php echo asseturl;?>images/hj.png"><br>您的浏览器很滑稽，建议点击滑稽升级您的浏览器！</a></div>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo asseturl.'css/font-awesome.min.css'?>?ver=<?php echo VERSION?>">
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo asseturl.'css/font-awesome-ie7.min.css'?>?ver=<?php echo VRESION?>">
    <![endif]-->
    <?php $this->header('generator=&template=&commentReply=&rss1=&rss2=&atom='); ?>
    <?php $this->options->tongji();?>
    </head>
    <body>
        <div class="web_bod">
            <header class="header marauto">
                <span class="logo">
                    <a href="<?php $this->options->siteUrl();?>" title="<?php $this->options->title();?>" rel="home">
                        <img src="<?php echo asseturl.$this->options->logo_img ?>" alt="<?php $this->options->title() ?>" />
                    </a>
                    <i>
                        <?php $this->options->description(); ?>
                    </i>
                </span>
                <form id="searchform" role="search" method="post" action="/">
                    <span class="search">
                        <input name="s" id="s" type="text"  class="input" value="请输入关键词开始搜索吧" onclick="this.value = '';" style="color:#999" onkeypress="javascript:if(event.keyCode == 13){query(this.value);}" x-webkit-speech=""/>
                        <button id="searchsubmit" class="btn">SEARCH</button>
                    </span>
                </form>
                <div class="cls"></div>
            </header>
            <div class="nav marauto">
                <div class="tig">
                    <?php if(!empty($this->options->top_right_btn_text)):?>
                    <a href='javascript:(function(){function c(){var e=document.createElement("link");e.setAttribute("type","text/css");e.setAttribute("rel","stylesheet");e.setAttribute("href",f);e.setAttribute("class",l);document.body.appendChild(e)}function h(){var e=document.getElementsByClassName(l);for(var t=0;t<e.length;t++){document.body.removeChild(e[t])}}function p(){var e=document.createElement("div");e.setAttribute("class",a);document.body.appendChild(e);setTimeout(function(){document.body.removeChild(e)},100)}function d(e){return{height:e.offsetHeight,width:e.offsetWidth}}function v(i){var s=d(i);return s.height>e&&s.height<n&&s.width>t&&s.width<r}function m(e){var t=e;var n=0;while(!!t){n+=t.offsetTop;t=t.offsetParent}return n}function g(){var e=document.documentElement;if(!!window.innerWidth){return window.innerHeight}else if(e&&!isNaN(e.clientHeight)){return e.clientHeight}return 0}function y(){if(window.pageYOffset){return window.pageYOffset}return Math.max(document.documentElement.scrollTop,document.body.scrollTop)}function E(e){var t=m(e);return t>=w&&t<=b+w}function S(){var e=document.createElement("audio");e.setAttribute("class",l);e.src=i;e.loop=false;e.addEventListener("canplay",function(){setTimeout(function(){x(k)},500);setTimeout(function(){N();p();for(var e=0;e<O.length;e++){T(O[e])}},15500)},true);e.addEventListener("ended",function(){N();h()},true);e.innerHTML=" <p>If you are reading this, it is because your browser does not support the audio element. We recommend that you get a new browser.</p> <p>";document.body.appendChild(e);e.play()}function x(e){e.className+=" "+s+" "+o}function T(e){e.className+=" "+s+" "+u[Math.floor(Math.random()*u.length)]}function N(){var e=document.getElementsByClassName(s);var t=new RegExp("\\b"+s+"\\b");for(var n=0;n<e.length;){e[n].className=e[n].className.replace(t,"")}}var e=30;var t=30;var n=350;var r=350;var i="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake.mp3";var s="mw-harlem_shake_me";var o="im_first";var u=["im_drunk","im_baked","im_trippin","im_blown"];var a="mw-strobe_light";var f="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake-style.css";var l="mw_added_css";var b=g();var w=y();var C=document.getElementsByTagName("*");var k=null;for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){if(E(A)){k=A;break}}}if(A===null){console.warn("Could not find a node of the right size. Please try a different page.");return}c();S();var O=[];for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){O.push(A)}}})()' target="_self" rel="nofollow" title="<?php $this->options->top_right_btn_title()?>"><span class="sub"><?php $this->options->top_right_btn_text()?></span></a>
                    <?php endif;?>
                    <a href="javascript:;"><span id="rss_open" class="rrs">订阅RSS</span></a>
                    <div class="rss_box">
                        <a class="close_rss" href="#"></a>
                        <span>邮件订阅</span> - 最后更新: <time><?php echo date('Y-m-d', get_lastpostmodified()); ?></time><br/><br/>
                        <form class="subscribe-mail" action="http://list.qq.com/cgi-bin/gf_compose_send" target="_blank" method="post">
                            <input type="hidden" name="t" value="qf_booked_feedback">
                            <input type="hidden" name="id" value="<?php echo $this->options->rss_key?>">
                            <input class="rss_input" id="to" name="to" type="email" placeholder="Your E-mail">
                            <input class="rss_submit" type="submit" value="订阅">
                        </form>
                        <div class="ress_btn_box">
                            订阅源：<a target="_blank" href="<?php $this->options->feedUrl();?>" rel="alternate" type="application/rss+xml" title="rss Feed">RSS</a>
                            <a target="_blank" rel="external nofollow" href="http://mail.qq.com/cgi-bin/feed?u=<?php $this->options->feedUrl();?>">QQ邮箱</a>
                        </div>
                    </div>
                    <div class="gonggao">
                        <ul id="g_box">
                        <?php 
                            if($this->options->top_ac){
                                $tip = $this->options->top_ac;
                                $tip = str_replace("\r","",$tip);
                                $tips = explode("\n",$tip);
                                if(is_array($tips)){
                                    foreach($tips as $tip){
                                        $str .='<li><span class="gg_tx"><i class="icon-volume-off icon-large"></i>'.$tip.'</span></li>'."\n\r";
                                    }
                                    echo $str;
                                }
                            }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="navlist">
                    <dl><dt><a href="/about.html" title="关于本站" target="_self" class="nav_button" style="opacity:0.7;" rel="nofollow"><img src="<?php echo asseturl.'images/about.gif'?>" width="45" height="45"/></a></dt><dd>关于本站</dd></dl>
                    <dl><dt><a href="/contact.html" title="联系Makoo" target="_self" class="nav_button" style="opacity:0.7;" rel="nofollow"><img src="<?php echo asseturl.'images/contact.gif'?>" width="45" height="45"/></a></dt><dd>联系Makoo</dd></dl>
                    <dl><dt><a href="/tools.html" title="工具箱" target="_self" class="nav_button" style="opacity:0.7;" rel="nofollow"><img src="<?php echo asseturl.'images/tools.gif'?>" width="45" height="45"/></a></dt><dd>工具箱</dd></dl>
                    <dl><dt><a href="/bbs" title="" target="_self" class="nav_button" style="opacity:0.7;" rel="nofollow"><img src="<?php echo asseturl.'images/bbs.gif'?>" width="45" height="45"/></a></dt><dd>BBS</dd></dl>
                    <dl><dt><a href="/wiki" title="" target="_self" class="nav_button" style="opacity:0.7;" rel="nofollow"><img src="<?php echo asseturl.'images/wiki.gif'?>" width="45" height="45"/></a></dt><dd>Wiki</dd></dl>
                    <div class="cls"></div>
                </div>
            </div>
            <nav class="navcon marauto">
                <div id="mobile_nav_btn">网站导航</div>
                <div class="menu-header">
                    <ul id="menu-menu-1" class="menu">
                        <li id="menu-item-0" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-0"><a href="<?php $this->options->siteUrl();?>">首页</a></li>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys);?>
                        <?php while($categorys->next()):?>
                            <?php if($categorys->levels === 0):?>
                                <?php $children = $categorys->getAllChildren($categorys->mid);?>
                                <?php if(empty($children)){?>
                                <li id="menu-item-<?php echo $categorys->mid?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $categorys->mid?>">
                                    <a href="<?php $categorys->permalink();?>">
                                        <?php $categorys->name();?>
                                    </a>
                                </li>
                                <?php }else{?>
                                <li id="menu-item-<?php echo $categorys->mid?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-<?php echo $categorys->mid?>">
                                    <a href="<?php $categorys->permalink();?>">
                                        <?php $categorys->name();?>
                                    </a>
                                    <ul class="sub-menu">
                                        <?php foreach($children as $mid){?>
                                        <?php $child = $categorys->getCategory($mid);?>
                                        <?php if($child['count']>0):?>
                                        <li id="menu-item-<?php echo $child['mid'];?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $child['mid']?>">
                                            <a href="<?php echo $child['permalink']?>">
                                                <?php echo $child['name'];?>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                        <?php }?>
                                    </ul>
                                </li>
                                <?php }?>
                            <?php endif;?>
                        <?php endwhile;?>
                    </ul>
                </div>
            </nav>
            <section class="conter marauto">