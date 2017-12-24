<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<div id="comments">
    <?php $this->comments()->to($comments);?>
    <?php if($comments->have()):?>
    <h3 id="comments-title">《<em><?php $this->title();?></em>》<?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <ol class="commentlist">
        <?php function threadedComments($comments,$options){
                    $commentClass = '';
                    if($comments->authorId){
                        if($comments->authorId == $comments->ownerId){
                            $commentClass .= ' comment-by-author';
                        }else{
                            $commentClass .= ' comment-by-user';
                        }
                    }
                    $commentLevelClass = $comments->levels>0?' comment-child':' comment-parent';
        ?>
        <li class="comment <?php if($comments->levels>0){echo 'byuser';echo ' comment-author-'.$comments->author;echo ' bypostauthor';echo $comments->levelsAlt(' even',' odd');}else{$comments->alt('even','odd');$comments->alt(' thread-even',' thread-odd');}?> depth-<?php echo $comments->levels+1;?>" id="li-<?php $comments->theId();?>">
            <div id="<?php $comments->theId();?>">
                <div class="comment-author vcard">
                    <?php $comments->gravatar('80','');?>
                    <cite class="fn">
                        <?php $comments->author();?>
                    </cite>
                    <span class="says">说:</span>
                </div>
                <div class="comment-meta commentmetadata">
                    <a href="<?php $comments->permalink();?>"><?php $comments->date('Y-m-d H:i');?></a>
                </div>
                <div class="comment-body">
                    <?php $comments->content();?>
                </div>
                <div class="reply">
                    <?php $comments->reply();?>
                </div>
            </div>
            <?php if($comments->children){?>
            <ul class="children">
                <?php $comments->threadedComments($options); ?>
            </ul>
            <?php }?>
        </li>
        <?php }?>
        <?php $comments->listComments(array('before'=>'' , 'after'=>'')); ?>
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </ol>
    <?php endif;?>
    <?php if($this->allow("comment")):?>
    <div id="<?php $this->respondId();?>" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">留下一个回复
            <small>
                <?php $comments->cancelReply();?>
            </small>
        </h3>
        <form action="<?php $this->commentUrl() ?>" method="post" id="commentform" class="comment-form" role="form">
            <?php if($this->user->hasLogin()):?>
            <p class="comment-notes"><?php _e('登录身份: ');?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. 
            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出');?> &raquo;</a></p>
            <?php endif;?>
            <p class="comment-notes">你的email不会被公开。</p>
            <p class="comment-form-comment">
                <label for="textarea">评论</label>
                <textarea rows="8" cols="50" name="text" id="textarea"  required ><?php $this->remeber('text');?></textarea>
            </p>
            <?php if(!$this->user->hasLogin()):?>
            <p class="comment-form-author">
                <label for="author">姓名 <span class="required">*</span></label>
                <input id="author" name="author" type="text"  value="<?php $this->remember('author');?>" size="30" maxlength="245" required />
            </p>
            <p class="comment-form-email">
                <label for="mail" >电子邮件 <?php if($this->options->commentsRequireMail):?><span class="required">*</span><?php endif;?></label>
                <input id="mail" name="mail" type="email" value="<?php $this->remember('mail');?>" size="30" maxlength="100" <?php if($this->options->commentsRequireMail):?> required<?php endif;?>/>
            </p>
            <p class="comment-form-url">
                <label for="url">站点</label>
                <input id="url" name="url" type="url" placeholder="<?php _e('http://')?>" value="<?php $this->remember('url');?>" size="30" maxlength="200" />
            </p>
            <?php endif;?>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="发表评论" />
            </p>
        </form>
    </div>
    <?php else:?>
    <h4><?php _e("评论已关闭");?></h4>
    <?php endif;?>
</div>
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