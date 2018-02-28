<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php define("THEME_URL",str_replace('//usr','/usr',str_replace($this->options->siteUrl,$this->options->rootUrl.'/',$this->options->themeUrl)));if(!empty($this->options->CDNURL)){$theUrl = $this->options->CDNURL.'/MakooCDN/';}else{$theUrl = THEME_URL.'/';}define("asseturl",$theUrl);?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset();?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta name="author" content="<?php $this->author();?>,<?php echo $this->author->mail;?>">
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
    <link rel="icon" href="<?php echo asseturl?>images/icon_32.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo asseturl?>images/icon_32.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo asseturl?>images/icon_152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo asseturl?>images/icon_167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asseturl?>images/icon_180.png">
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
    <link rel="stylesheet" href="<?php echo asseturl?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asseturl?>css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo asseturl?>js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo asseturl?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo asseturl?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo asseturl?>app.min.css?v=<?php echo VERSION?>">
    <style type="text/css">
    a{color:#5bc0eb ?>}
    a:hover{color:#2980b9!important}
    #header{background-color:#5bc0eb}
    .widget .widget-title::after{background-color:#5bc0eb}
    .uptop{border-left-color:#5bc0eb}
    #titleBar .toggle:before{background:#5bc0eb}
    </style>
    <?php if($this->options->css):?>
    <style><?php $this->options->css();?></style>
    <?php endif;?>
    <!--[if lt IE 9]
    <script src="<?php $this->options->themeUrl('html5.js');?>"></script>
    <style>body{overflow-y:hidden;}</style>
    <div class="browsehappy" role="dialog"><a href="http://browsehappy.com/"><img src="<?php echo asseturl;?>images/hj.png"><br>您的浏览器很滑稽，建议点击滑稽升级您的浏览器！</a></div>
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo asseturl.'css/font-awesome-ie7.min.css'?>?ver=<?php echo VRESION?>">
    <![endif]-->
    <?php $this->header('generator=&template=&commentReply=&rss1=&rss2=&atom='); ?>
    <?php $this->options->tongji();?>
</head>
<body>
    <header id="header">
        <div class="avatar">
            <a href="<?php $this->options->siteUrl();?>" title="<?php $this->options->title();?>">
                <img src="<?php echo stripslashes(asseturl.$this->options->logo_img); ?>" alt="<?php $this->options->title();?>" class="img-circle" width="50%">
            </a>
        </div>
    <h1 id="name"><?php $this->author();?></h1>
    <h6 id="desc"><?php $this->options->description(); ?></h6>
    <div class="sns">
        <?php if ($this->options->rss == 'display') { ?><a href="<?php echo $this->options->feedUrl;?>" target="_blank" rel="nofollow" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i></a><?php } ?>
        <?php if ($this->options->weibo == 'display') { ?><a href="<?php echo stripslashes($this->options->weibo_url); ?>" target="_blank" rel="nofollow" title="Weibo"><i class="fa fa-weibo" aria-hidden="true"></i></a><?php } ?>
        <?php if ($this->options->twitter == 'display') { ?><a href="<?php echo stripslashes($this->options->twitter_url); ?>" target="_blank" rel="nofollow" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php } ?>
        <?php if ($this->options->facebook == 'display') { ?><a href="<?php echo stripslashes($this->options->facebook_url); ?>" target="_blank" rel="nofollow" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a><?php } ?>
        <?php if ($this->options->github == 'display') { ?><a href="<?php echo stripslashes($this->options->github_url); ?>" target="_blank" rel="nofollow" title="GitHub"><i class="fa fa-github" aria-hidden="true"></i></a><?php } ?>
    </div>
    <div class="nav">
    <ul>
            <li><a href="">首页</a></li>
            <li><a href="">博主介绍</a></li>
            <li><a href="#">koo叔出品</a>
                <ul>
                    <li style="border:none;"><a href="http://makoolabs.com">makoo主题</a></li>
                </ul>
            </li>
            <li><a href="https://www.douban.com/doulist/46380335/">我的书单</a></li>
            <li><a href="#" style="color:#FF0;"><i class="fa fa-gift" aria-hidden="true"></i> 打赏 <i class="fa fa-gift" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <?php if ($this->options->weixin == 'display') { ?>
    <div class="weixin">
        <img src="<?php echo asseturl.stripslashes($this->options->weixin_img); ?>" alt="微信公众号" width="50%">
        <p>微信公众号</p>
    </div>
    <?php } ?>
    </header>