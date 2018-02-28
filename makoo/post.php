<?php $this->need('header.php');?>
<div id="main">
    <article class="col-md-8 col-md-offset-2 view clearfix">
        <h1 class="view-title"><?php $this->title(); ?></h1>
        <div class="view-meta">
            <span>作者: <?php $this->author(); ?></span>
            <span>分类: <?php $this->category(',',true,'未分类');?></span>
            <span>发布时间: <?php $this->date('Y-m-d H:i') ?></span>
            <span><a href="<?php $this->options->adminUrl('write-post.php?cid=' .$this->cid)?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>编辑</a></span>
        </div>
        <div class="view-content">
            <?php $this->content(); ?>
        </div>
        <section class="view-tag">
            <div class="pull-left"><i class="fa fa-tags"></i> <?php $this->tags(', ',true,'');?></div>
        </section>
        <?php if ($this->options->dashang == 'display') { ?>
        <section class="support-author">
            <p><?php echo stripslashes($this->options->dashang_info); ?></p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-cny" aria-hidden="true"></i> 打赏支持</button>
        </section>
        <?php } ?>
        <section id="comments">
            <?php $this->need('comments.php');?>
        </section>
    </article>
    <section class="col-md-8 col-md-offset-2 clearfix">
    <div class="read">
        <div class="read-head"> <i class="fa fa-book"></i> 更多阅读 </div>
        <div class="read-list row">
            <div class="col-md-6">
                <ul>
                    <?php //get_most_viewed(); ?>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                <?php //$rand_posts = get_posts('numberposts=10&orderby=rand');  foreach( $rand_posts as $post ) : ?>
                    <li><a href="<?php //the_permalink(); ?>" title="<?php //the_title(); ?>"><?php //the_title(); ?></a></li>
                <?php //endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="read">
        <div class="read-head"> <i class="fa fa-tags"></i> 标签云 </div>
        <div class="read-list">
            <?php //wp_tag_cloud();?>
        </div>
    </div>
    </section>
</div>
<!--modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content single-dashang">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cny" aria-hidden="true"></i> 打赏支持</h4>
            </div>
            <div class="modal-body text-center">
                <p><img border="0" src="<?php //echo stripslashes(get_option('dashang_alipay')); ?>"><img border="0" src="<?php //echo stripslashes(get_option('dashang_wechat')); ?>"></p>
                <p>扫描二维码，输入您要打赏的金额</p>
            </div>
        </div>
    </div>
</div>
<!--modal-->
<?php $this->need('footer.php'); ?>
