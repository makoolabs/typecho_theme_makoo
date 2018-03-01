<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php
/*if ( post_password_required() )
    return;*/
?>
<?php $this->comments()->to($comments);?>
<?php if($comments->have()):?>
<div class="comment-head clearfix">
    <div class="pull-left">
        《<em><?php $this->title();?></em>》<?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
    </div>
    <div class="pull-right"><a href="#respond"><i class="fa fa-pencil"></i> 添加新评论</a></div>
</div>
<ul>
        <?php function threadedComments($comments,$options){?>
        <li id="comment-li-<?php $comments->theId();?>" class="comment_li" >
            <div id="<?php $comments->theId();?>">
                <div class="comment_top clearfix">
                    <div class="comment_avatar">
                        <?php $comments->gravatar('40','');?>
                    </div>
                    <div class="pull-left">
                        <p class="comment_author"><a href="" rel="nofollow" target="_blank"><?php $comments->author();?></a></p>
                        <p class="comment_time"><?php $comments->date('Y-m-d H:i');?></p>
                    </div>
                    <div class="pull-right">
                        <?php $comments->reply();?>
                    </div>
                </div>
                <div class="comment-text">
                    <p><?php $comments->content();?></p>
                </div>
            </div>
            <?php if($comments->children){?>
                <ol class="children">
                    <?php $comments->threadedComments($options); ?>
                </ol>
            <?php }?>
        </li>
        <?php }?>
        <?php $comments->listComments(array('before'=>'' , 'after'=>'')); ?>
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</ul>
<?php endif; ?>
<?php if($this->allow("comment")):?>
    <div id="<?php $this->respondId();?>" class="comment-respond">
        <h4 id="reply-title" class="comment-reply-title">发表评论
            <small>
                <?php $comments->cancelReply();?>
            </small>
        </h4>
        <form action="<?php $this->commentUrl() ?>" method="post" id="commentform" class="comment-form" role="form">
            <?php if($this->user->hasLogin()):?>
            <p class="comment-notes"><?php _e('登录身份: ');?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. 
            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出');?> &raquo;</a></p>
            <?php endif;?>
            <p class="comment-notes"><span id="email-notes">你的email不会被公开。</span>必填项已用<span class="required">*</span>标注</p>
            <div class="comment form-group has-feedback">
                <textarea class="form-control" id="textarea" placeholder=" " name="text" rows="5" aria-required="true" required onkeydown="if(event.ctrlKey){if(event.keyCode==13){document.getElementById('submit').click();return false}};"><?php $this->remeber('text');?></textarea>
            </div>
            <?php if(!$this->user->hasLogin()):?>
            <div class="comment-form-author form-group has-feedback">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control" placeholder="昵称" id="author" name="author" type="text"  value="<?php $this->remember('author');?>" size="30" maxlength="245"/>
                    <span class="form-control-feedback required">*</span>
                </div>
            </div>
            <div class="comment-form-email form-group has-feedback">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <input class="form-control" placeholder="邮箱" id="mail" name="mail" type="email" value="<?php $this->remember('mail');?>" size="30" maxlength="100"/>
                    <span class="form-control-feedback<?php if($this->options->commentsRequireMail):?> required<?php endif;?>">*</span>
                </div>
            </div>
            <div class="comment-form-url form-group has-feedback">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-link"></i>
                    </div>
                    <input class="form-control" placeholder="网站(<?php _e('http://')?>)" id="url" name="url" type="url"  value="<?php $this->remember('url');?>" size="30" maxlength="200" />
                </div>
            </div>
            <?php endif;?>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="btn btn-primary" value="发表评论" />
            </p>
        </form>
    </div>
    <?php else:?>
    <h4><?php _e("评论已关闭");?></h4>
    <?php endif;?>
<script>
    (function(){
        window.TypechoComment = {
            dom:function(id){
                return document.getElementById(id);
            },
            create:function(tag,attr){
                var el = document.createElement(tag);
                for(var key in attr){
                    el.setAttribute(key,attr[key]);
                }
                return el;
            },
            reply:function(cid,coid){
                var comment = this.dom(cid),parent = comment.parentNode,
                    response = this.dom('<?php echo $this->respondId();?>'),
                    input = this.dom('comment-parent'),
                    form = 'form' == response.tagName?response:response.getElementsByTagName('form')[0],
                    textarea = response.getElementsByTagName('textarea')[0];
                    if(null == input){
                        input = this.create('input',{
                            'type':'hidden',
                            'name':'parent',
                            'id'  : 'comment-parent'
                        });
                        form.appendChild(input);
                    }
                    input.setAttribute('value',coid);
                    if(null == this.dom('comment-form-place-holder')){
                        var holder = this.create('div',{
                            'id':'comment-form-place-holder',
                            'style':'display:none;'
                        });
                        response.parentNode.insertBefore(holder,response);
                    }
                    parent.insertBefore(response,comment.nextSibling);
                    this.dom('cancel-comment-reply-link').style.display='';
                    if(null != textarea && 'text' == textarea.name){
                        textarea.focus();
                    }
                    return false;
            },
            cancelReply:function(){
                var response = this.dom('<?php echo $this->respondId();?>'),
                holder = this.dom('comment-form-place-holder'),
                input = this.dom('comment-parent');
                if(null != input){
                    input.parentNode.removeChild(input);
                }
                if(null == holder){
                    return true;
                }
                this.dom('cancel-comment-reply-link').style.display = 'none';
                holder.parentNode.insertBefore(response,holder);
                response.parentNode.removeChild(holder);
                return false;
            }
        };
    })();
</script>