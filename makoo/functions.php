<?php 
define('VERSION','0.9.0');
function themeConfig($form){
    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', NULL, NULL, _t('模板资源文件地址替换'), _t("
    新建一个'MakooCDN' 文件夹,把Makoo模板文件夹下的所有子文件夹放进去，然后再把js和css文件放进去, 最后把'MakooCDN' 上传到到你的 CDN 储存空间根目录下<br />
    填入你的 CDN 地址, 如 <b>http://makoolabs.qiniu.com</b>"));
    $form->addInput($CDNURL);
    $logo_img = new Typecho_Widget_Helper_Form_Element_Text('logo_img', NULL, 'images/logo.png', _t('网站logo'), _t('在这里填入一个图片相对地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logo_img);
    //建站时间
    $starttime = new Typecho_Widget_Helper_Form_Element_Text('starttime', NULL, '2018/01/01', _t('博客成立时间'), _t('在这里填入博客的成立时间,格式要求，完整如填入“2018/01/01 00:00:00”或者只填写年月日“2018/01/01”。不填则不显示建站时间'));
    $form->addInput($starttime);
    $css = new Typecho_Widget_Helper_Form_Element_Textarea('css', NULL,NULL, _t('自定义css'), _t('这里可以添加自定义css，自定义css可以改变网站样式'));
    $form->addInput($css);
    //统计代码
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL,NULL, _t('统计代码'), _t('填入百度或者谷歌统计代码，只能填写那种不显示文字的统计代码<head>部分'));
    $form->addInput($tongji);
    $rss = new Typecho_Widget_Helper_Form_Element_Radio('rss', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('是否显示RSS订阅源'), _t(''));
    $form->addInput($rss);
    $weibo = new Typecho_Widget_Helper_Form_Element_Radio('weibo', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('是否显示Weibo'), _t(''));
    $form->addInput($weibo);
    $weibo_url = new Typecho_Widget_Helper_Form_Element_Text('weibo_url', NULL, 'https://weibo.com/coffis', _t('Weibo地址'), _t(''));
    $form->addInput($weibo_url);
    $twitter = new Typecho_Widget_Helper_Form_Element_Radio('twitter', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('是否显示Twitter'), _t(''));
    $form->addInput($twitter);
    $twitter_url = new Typecho_Widget_Helper_Form_Element_Text('twitter_url', NULL, 'https://twitter.com/coffis', _t('Twitter地址'), _t('Twitter地址'));
    $form->addInput($twitter_url);
    $facebook = new Typecho_Widget_Helper_Form_Element_Radio('facebook', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'close', 
    _t('是否显示Facebook'), _t(''));
    $form->addInput($facebook);
    $facebook_url = new Typecho_Widget_Helper_Form_Element_Text('facebook_url', NULL, 'https://www.facebook.com/coffis', _t('Facebook地址'), _t('Facebook地址'));
    $form->addInput($facebook_url);
    $github = new Typecho_Widget_Helper_Form_Element_Radio('github', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('是否显示GitHub'), _t(''));
    $form->addInput($github);
    $github_url = new Typecho_Widget_Helper_Form_Element_Text('github_url', NULL, 'https://github.com/makoolabs', _t('GitHub地址'), _t('GitHub地址'));
    $form->addInput($github_url);
    $weixin = new Typecho_Widget_Helper_Form_Element_Radio('weixin', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('是否显示微信公众号'), _t(''));
    $form->addInput($weixin);
    $weixin_img = new Typecho_Widget_Helper_Form_Element_Text('weixin_img', NULL, 'images/qrcode.jpg', _t('公众号二维码图片'), _t('公众号二维码图片'));
    $form->addInput($weixin_img);
    $dis_num = new Typecho_Widget_Helper_Form_Element_Text('dis_num',NULL, '150','自动摘要字符数', '请根据需要输入整数以控制首页摘要的字符数量，如不填则使用默认策略');
    $dis_num->input->setAttribute('class', 'mini');
    $form->addInput($dis_num->addRule('isInteger', '请填入数字')->addRule('minLength', '至少包含3个数字', 3)->addRule('maxLength', '最多包含4个数字', 4)->addRule('required', '请填入数字。'));
    $image_width = new Typecho_Widget_Helper_Form_Element_Text('image_width',NULL, '150','自动摘要字符数', '请根据需要输入整数以控制首页摘要的字符数量，如不填则使用默认策略');
    $image_width->input->setAttribute('class', 'mini');
    $form->addInput($image_width->addRule('isInteger', '请填入数字')->addRule('minLength', '至少包含3个数字', 3)->addRule('maxLength', '最多包含4个数字', 4)->addRule('required', '请填入数字。'));
    $image_height = new Typecho_Widget_Helper_Form_Element_Text('image_height',NULL, '150','自动摘要字符数', '请根据需要输入整数以控制首页摘要的字符数量，如不填则使用默认策略');
    $image_height->input->setAttribute('class', 'mini');
    $form->addInput($image_height->addRule('isInteger', '请填入数字')->addRule('minLength', '至少包含3个数字', 3)->addRule('maxLength', '最多包含4个数字', 4)->addRule('required', '请填入数字。'));
    $focus = new Typecho_Widget_Helper_Form_Element_Radio('focus', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'close', 
    _t('显示幻灯片'), _t(''));
    $form->addInput($focus);
    $view_time = new Typecho_Widget_Helper_Form_Element_Radio('view_time', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('顶部按钮扩展区域'), _t(''));
    $form->addInput($view_time);
    $view_num = new Typecho_Widget_Helper_Form_Element_Text('view_num',NULL, '150','自动摘要字符数', '请根据需要输入整数以控制首页摘要的字符数量，如不填则使用默认策略');
    $view_num->input->setAttribute('class', 'mini');
    $form->addInput($view_num->addRule('isInteger', '请填入数字')->addRule('minLength', '至少包含3个数字', 3)->addRule('maxLength', '最多包含4个数字', 4)->addRule('required', '请填入数字。'));
    $dis_href = new Typecho_Widget_Helper_Form_Element_Radio('dis_href', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('顶部按钮扩展区域'), _t(''));
    $form->addInput($dis_href);
    $readmore = new Typecho_Widget_Helper_Form_Element_Text('readmore', NULL, NULL, _t('QQ订阅key'), _t('可以让用户通过自己的邮箱订阅站点的更新内容，需要至腾讯list邮箱中注册key<a href="http://list.qq.com/" target="_blank">去看看</a>'));
    $form->addInput($readmore);



    

    

    
    

    $page_width = new Typecho_Widget_Helper_Form_Element_Text('page_width', NULL, NULL, _t('页面宽度限制'), _t('设置页面宽度后，PC页面会按照您设定宽度展现页面。强烈建议禁用自动摘要后配合此功能调整页面。（请填入整数，并且宽度设置小于960会出错！）'));
    $page_width->input->setAttribute('class', 'mini');
    $form->addInput($page_width->addRule('isInteger', '请填入数字'));

   
    

    $top_right_btn_text = new Typecho_Widget_Helper_Form_Element_Text('top_right_btn_text', NULL, '欢迎投稿', _t('订阅左侧按钮文字'), _t(''));
    $form->addInput($top_right_btn_text);

    $top_right_btn_url = new Typecho_Widget_Helper_Form_Element_Text('top_right_btn_url',NULL, NULL,'订阅左侧按钮链接', '');
    $top_right_btn_url->input->setAttribute('class', 'w-100 mono');
    $form->addInput($top_right_btn_url->addRule('url', '请填写一个合法的URL地址'));

    $top_right_btn_title = new Typecho_Widget_Helper_Form_Element_Text('top_right_btn_title', NULL, NULL, _t('订阅左侧按钮超链接title'), _t(''));
    $form->addInput($top_right_btn_title);

    $rss_key = new Typecho_Widget_Helper_Form_Element_Text('rss_key', NULL, NULL, _t('QQ订阅key'), _t('可以让用户通过自己的邮箱订阅站点的更新内容，需要至腾讯list邮箱中注册key<a href="http://list.qq.com/" target="_blank">去看看</a>'));
    $form->addInput($rss_key);

    $top_ac = new Typecho_Widget_Helper_Form_Element_Textarea('top_ac', NULL, NULL, _t('站点公告'), _t('每条一行(回车)，显示在导航条右上方，支持HTML代码。（建议不要再这里插入一些影响布局的代码）'));
    $form->addInput($top_ac);

    
    
   

    $sticky_1 = new Typecho_Widget_Helper_Form_Element_Text('sticky_1',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_1->input->setAttribute('class', 'mini');
    $form->addInput($sticky_1->addRule('isInteger', '请填入数字'));

    $sticky_2 = new Typecho_Widget_Helper_Form_Element_Text('sticky_2',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_2->input->setAttribute('class', 'mini');
    $form->addInput($sticky_2->addRule('isInteger', '请填入数字'));

    $sticky_3 = new Typecho_Widget_Helper_Form_Element_Text('sticky_3',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_3->input->setAttribute('class', 'mini');
    $form->addInput($sticky_3->addRule('isInteger', '请填入数字'));

    $sticky_4 = new Typecho_Widget_Helper_Form_Element_Text('sticky_4',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_4->input->setAttribute('class', 'mini');
    $form->addInput($sticky_4->addRule('isInteger', '请填入数字'));

    $sticky_5 = new Typecho_Widget_Helper_Form_Element_Text('sticky_5',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_5->input->setAttribute('class', 'mini');
    $form->addInput($sticky_5->addRule('isInteger', '请填入数字'));

    

      

    

    $auto_zhaiyao = new Typecho_Widget_Helper_Form_Element_Radio('auto_zhaiyao', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('顶部按钮扩展区域'), _t(''));
    $form->addInput($auto_zhaiyao);
    $picCat = new Typecho_Widget_Helper_Form_Element_Text('picCat',NULL, NULL,'图片展现分类目录', '填写对应分类的 id（例如 1,2）');
    $picCat->input->setAttribute('class', 'mini');
    $form->addInput($picCat->addRule('isInteger', '请填入数字'));
    $Enhance = new Typecho_Widget_Helper_Form_Element_Text('Enhance', NULL, NULL, _t('高级输入框'), _t("可以使用一些特殊字母或者数字来开启隐藏的某些功能，或者处于测试阶段的功能"));
    $form->addInput($Enhance);
    try{
        $fujian = Typecho_Widget::widget('Widget_Options')->Enhance;
    }catch(Exception $e){
        $fujian = '';
    }
    if(strpos($fujian,'fujian')!==false){
        //附件源地址
        $src_address = new Typecho_Widget_Helper_Form_Element_Text('src_add', NULL, NULL, _t('替换前地址'), _t('即你的附件存放地址，如http://www.yourblog.com/usr/uploads/'));
        $form->addInput($src_address);
        //替换后地址
        $cdn_address = new Typecho_Widget_Helper_Form_Element_Text('cdn_add', NULL, NULL, _t('替换后'), _t('即你的七牛云存储域名，如http://yourblog.qiniudn.com/'));
        $form->addInput($cdn_address);
    }

    
    /**导航栏上方按钮数量*/
    $btn_num = new Typecho_Widget_Helper_Form_Element_Text('btn_num', NULL, NULL,
    _t('导航栏上方按钮数目'), _t('此数目用于指定显示在导航栏上方的按钮数目.'));
    $btn_num->input->setAttribute('class', 'w-20');
    $form->addInput($btn_num->addRule('isInteger', _t('请填入一个数字')));
    $load_speed = new Typecho_Widget_Helper_Form_Element_Text('load_speed',NULL, '1000','loading条加载速度', '必须是整数，单位为毫秒。 （1秒=1000毫秒）');
    $load_speed->input->setAttribute('class', 'mini');
    $form->addInput($load_speed->addRule('isInteger', '请填入数字')->addRule('minLength', '至少包含4个数字', 4)->addRule('maxLength', '最多包含5个数字', 5)->addRule('required', '请填入数字。'));
    
    
   
   
      
    
    
    
    $post_ad_1 = new Typecho_Widget_Helper_Form_Element_Textarea('post_ad_1', NULL, NULL, _t('文章页面右侧广告位'), _t('建议是矩形广告'));
    $form->addInput($post_ad_1);

    $post_ad_2 = new Typecho_Widget_Helper_Form_Element_Textarea('post_ad_2', NULL, NULL, _t('文章页面相关阅读上方广告位'), _t('建议为横幅广告'));
    $form->addInput($post_ad_2);
    $fenxiang = new Typecho_Widget_Helper_Form_Element_Textarea('fenxiang', NULL, NULL, _t('第三方分享代码'), _t('文章结尾处可以插入例如<a href="http://share.baidu.com/" target="_blank">百度分享</a>之类的代码，方便用户将文章分享到社交平台'));
    $form->addInput($fenxiang);
    $zhifu_url = new Typecho_Widget_Helper_Form_Element_Text('zhifu_url',NULL, 'https://me.alipay.com/','捐赠功能的支付宝收款地址', '如果没有收款地址请<a href="https://me.alipay.com/" target="_blank">点击这里</a>开通');
    $zhifu_url->input->setAttribute('class', 'w-100 mono');
    $form->addInput($zhifu_url->addRule('required', '请填入收款地址。')->addRule('url', '请填写一个合法的URL地址'));
    $juankuan = new Typecho_Widget_Helper_Form_Element_Text('juankuan', NULL, '如果您觉得这篇文章有用处，请支持作者！鼓励作者写出更好更多的文章！', _t('捐款说明文字'), _t(''));
    $form->addInput($juankuan);
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
    'ShowFrontLoginBox' => _t('显示前台登录'),
    'ShowRandomPosts' => _t('显示推荐阅读'),
    'ShowHotPosts' => _t('显示最热文章'),
    'ShowNewPosts' => _t('显示最近更新'),
    'ShowTag' => _t('显示标签'),
    'ShowVisitors' => _t('显示最近访客'),
    'ShowComments' => _t('显示近期评论'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowLinks' => _t('显示左邻右舍'),
    'ShowSiteInfo' => _t('显示站点统计'),
    'ShowOther' => _t('显示其它')),
    array('ShowFrontLoginBox', 'ShowRandomPosts', 'ShowHotPosts', 'ShowNewPosts', 'ShowTag', 'ShowVisitors', 'ShowComments', 'ShowCategory', 'ShowArchive', 'ShowLinks', 'ShowSiteInfo', 'ShowOther'), _t('侧边栏显示'),_t(''));
    $form->addInput($sidebarBlock->multiMode());
    $topicUrl = new Typecho_Widget_Helper_Form_Element_Text('topicUrl',NULL, NULL,'推荐文章地址', '');
    $topicUrl->input->setAttribute('class', 'w-100 mono');
    $form->addInput($topicUrl->addRule('url', '请填写一个合法的URL地址'));
    $topicTitle = new Typecho_Widget_Helper_Form_Element_Text('topicTitle', NULL, NULL, _t('推荐文章标题'), _t(''));
    $form->addInput($topicTitle);
    $sidebar_ad_1 = new Typecho_Widget_Helper_Form_Element_Textarea('sidebar_ad_1', NULL, NULL, _t('侧栏广告⑴_规格360*300'), _t('显示在最新文章上方，支持HTML代码。（建议不要再这里插入一些影响布局的代码）'));
    $form->addInput($sidebar_ad_1);
    $sidebar_ad_2 = new Typecho_Widget_Helper_Form_Element_Textarea('sidebar_ad_2', NULL, NULL, _t('侧栏广告⑵_规格300*250'), _t('显示在其它杂项下方，支持HTML代码。（建议不要再这里插入一些影响布局的代码）'));
    $form->addInput($sidebar_ad_2);
    $duoshuo_id = new Typecho_Widget_Helper_Form_Element_Text('duoshuo_id',NULL, NULL,'多说二级域名', '当前站点注册的多说二级域名。例如：你注册了http://apitest.duoshuo.com/时，多说二级域名为<strong>apitest</strong>。');
    $duoshuo_id->input->setAttribute('class', 'w-100 mono');
    $form->addInput($duoshuo_id->addRule('required', '请填入当前站点多说二级域名'));
    $buildDate = new Typecho_Widget_Helper_Form_Element_Text('buildDate',NULL, '2013-12-12','建站日期', '默认格式为：2012-12-12');
    $buildDate->input->setAttribute('class', 'mini');
    $form->addInput($buildDate->addRule('minLength', '至少包含8个字符', 8)->addRule('maxLength', '最多包含11个字符', 11)->addRule('required', '请填入数字。'));
    /** 页面加载耗时 */
    $sider_roll = new Typecho_Widget_Helper_Form_Element_Select('sider_roll', 
    array(
        '' => _t('--未启用--'),
        'frontloginblock' => _t('登录信息框'),
        'randomposts' => _t('推荐阅读'),
        'views' => _t('最热文章'),
        'recent-posts' => _t('最近更新'),
        'tag_cloud' => _t('标签'),
        'categories' => _t('分类'),
        'archives' => _t('归档'),
        'linkcat' => _t('友情连接'),
        'siteinfowidget' => _t('站点统计'),
        'meta' => _t('其他'),
        'text-1' => _t('侧栏广告位⑴'),
        'text-2' => _t('侧栏广告位⑵'),
        ),
    'randomposts',
    _t('右边栏跟随屏幕滚动模块设置'), _t('选择需要跟随滚动的模块ID(选项模块对应由上至下的顺序)'));    
    $form->addInput($sider_roll);

    /** 页面加载耗时 */
    $load_time = new Typecho_Widget_Helper_Form_Element_Radio('load_time', 
    array(
        'display' => _t('显示'),
        'close' => _t('关闭')
        ),
    'display',
    _t('页面加载耗时'), _t('开启后会在页面右下角显示当前页面加载所耗时间，是对当前服务器性能进行评估的重要指标。'));    
    $form->addInput($load_time);
}

function get_lastpostmodified(){
    $db = Typecho_Db::get();
    $modified = $db->fetchObject($db->select('modified')
                                ->from('table.contents')
                                ->where('type = ? AND status = ? AND password IS NULL','post','publish')
                                ->order('modified',Typecho_Db::SORT_DESC)
                                ->limit(1))->modified;
    return $modified+Typecho_Date::$timezoneOffset;
}

/**
 * 单独输出文章分类链接
 *
 * 语法: <?php category($this); ?>
 * 
 */
function category($widget,$split=',',$default=NULL){
    $categories = $widget->categories;
    if($categories){
        $result = array();
        foreach($categories as $category){
            $result[] = $category['permalink'];
        }
        echo implode($split,$result);
    }else{
        echo $default;
    }
}
function crumbsArchiveNav($widget,$slug){
    $result = '';
    $widget->widget('Widget_Metas_Category_List')->to($categorys);
    while($categorys->next()){
        if($categorys->levels === 0){
            if($categorys->slug == $slug){
                $result = '<a href="'.$categorys->permalink.'">'.$categorys->name.'</a>';
                break;
            }
            $children = $categorys->getAllChildren($categorys->mid);
            $find = false;
            if(!empty($children)){
                foreach($children as $mid){
                    $child = $categorys->getCategory($mid);
                    if($child['slug'] == $slug){
                        $result = '<a href="'.$categorys->permalink.'">'.$categorys->name.'</a> > <a href="'.$child['permalink'].'">'.$child['name'].'</a>';
                        $find = true;
                        break;
                    }
                }
                if($find)break;
            }
        }
    }
    return $result;
}
function crumbsNav($widget){
    $result = '';
    foreach ($widget->categories as $category) {
        $cid = $category['mid'];
        break;
    }
    $widget->widget('Widget_Metas_Category_List')->to($categorys);
    while($categorys->next()){
        if($categorys->levels === 0){
            if($categorys->mid == $cid){
                $result = '<a href="'.$categorys->permalink.'">'.$categorys->name.'</a>';
                break;
            }
            $children = $categorys->getAllChildren($categorys->mid);
            $find = false;
            if(!empty($children)){
                foreach($children as $mid){
                    $child = $categorys->getCategory($mid);
                    if($child['mid'] == $cid){
                        $result = '<a href="'.$categorys->permalink.'">'.$categorys->name.'</a> > <a href="'.$child['permalink'].'">'.$child['name'].'</a>';
                        $find = true;
                        break;
                    }
                }
                if($find)break;
            }
        }
    }
    return $result;
}


function theNext($widget,$default=NULL){
    $db = Typecho_Db::get();
    $dql = $db->select()->from('table.contents')
              ->where('table.contents.created > ?',$widget->created)
              ->where('table.contents.status = ?','publish')
              ->where('table.contents.type = ?',$widget->type)
              ->where('table.contents.password IS NULL')
              ->order('table.contents.created',Typecho_Db::SORT_ASC)
              ->limit(1);
    $content = $db->fetchRow($sql);
    if($content){
        $content = $widget->filter($content);
        $link = '<a href="'.$content['permalink'].'" rel="next"><span class="meta-nav"><i class="icon-arrow-left"></i></span> '.$content['title'].'</a>';
        echo $link;
    }else{
        echo $default;
    }
}
function thePrev($widget,$default=NULL){
    $db = Typecho_Db::get();
    $dql = $db->select()->from('table.contents')
              ->where('table.contents.created < ?',$widget->created)
              ->where('table.contents.status = ?','publish')
              ->where('table.contents.type = ?',$widget->type)
              ->where('table.contents.password IS NULL')
              ->order('table.contents.created',Typecho_Db::SORT_DESC)
              ->limit(1);
    $content = $db->fetchRow($sql);
    if($content){
        $content = $widget->filter($content);
        $link = '<a href="'.$content['permalink'].'" rel="prev">"></i>'.$content['title'].'<i class="icon-arrow-right"></i></a>';
        echo $link;
    }else{
        echo $default;
    }
}

/**
* 输出随机文章
*
* 语法: <?php theme_random_posts();?>
*
* @access protected
* @return integer
*/
function random_posts($limit= 10,$format='<li><a href="{permalink}">{title}</a></li>')
{ 
    $db = Typecho_Db::get(); 
    $limit = is_numeric($limit) ? $limit : 10;
    $result = $db->fetchAll($db->select()->from('table.contents') 
        ->where('status = ?','publish') 
        ->where('type = ?', 'post') 
        ->limit($limit) 
        ->order('RAND()')); 

    foreach($result as $val){ 
        $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val); 
        echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $format)."\n\r"; 
    } 
}

/**
* 获取标签数目
* 
* 语法: <?php echo tagsNum(); ?>
* 
* @access protected
* @return integer
*/
function tagsNum($display = true)
{
        $db = Typecho_Db::get();
        $total_tags = $db->fetchObject($db->select(array('COUNT(mid)' => 'num'))
              ->from('table.metas')
              ->where('table.metas.type = ?', 'tag'))->num;
        if($display) {
			echo $total_tags;
		} else {
			return $total_tags;
		}
}

/**
 * 載入耗用時間
 *
 * 语法: <?php echo timer_stop() ?>
 * 
 */
function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
  }
  timer_start();
   
  function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format( $timetotal, $precision );
    if ( $display )
      echo $r;
    return $r;
  }
  //分页
function pagination($query_string){
    global $posts_per_page, $paged;
    $my_query = new WP_Query($query_string ."&posts_per_page=-1");
    $total_posts = $my_query->post_count;
    if(empty($paged))$paged = 1;
    $prev = $paged - 1;
    $next = $paged + 1;
    $range = 5;  //分页数设置
    $showitems = ($range * 2)+1;
    $pages = ceil($total_posts/$posts_per_page);
    if(1 != $pages){
        echo "<ul class='pagination'>";
        echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>":"";
        echo ($paged > 1 && $showitems < $pages)? "<li><a href='".get_pagenum_link($prev)."'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>":"";
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."'>".$i."<span class='sr-only'>(current)</span></a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
            }
        }
    echo ($paged < $pages && $showitems < $pages) ? "<li><a href='".get_pagenum_link($next)."'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>" :"";
    echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>":"";
    echo "</ul>";
    }
}
?>