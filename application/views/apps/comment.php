<?php foreach($items as $item){ ?>
<li id="li-comment-<?= $item['id'] ?>" class="comment even <?= ($item['user_id'] == $application->user_id) ?  'bypostauthor odd' : '' ?>" >
    <div id="comment-<?= $item['id'] ?>" class="comment-container" >
        <!-- .comment-author .vcard -->
        <div class="comment-author vcard" >
            <img alt="" src="https://www.gravatar.com/avatar/<?= $item['email'] ?>>?d=mm&s=55" class="avatar" height="55" width="50" />
            <br/>
            <cite class="fn"><?= $item['name'] ?></cite>
        </div>

        <div class="comment-meta commentmetadata" style="background-color: #f4f4f4; ">
            <div class="intro">
                <div class="commentDate">
                    <a href="#comment-2">
                        <?= $item['created_at']?></a>
                    <br/>
                </div>
                <br/>
                <div class="commentNumber">#&nbsp;</div>
            </div>
            <br/>
            <div class="comment-body">
                <p> <?= $item['text'] ?></p>
            </div>
            <div class="reply group">
                <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-<?= $item['id'] ?>&quot;,&quot;<?= $item['id'] ?>&quot;, &quot;respond&quot;, &quot;<?= $item['application_id'] ?>&quot;)">Reply</a>
            </div>
            <!-- .reply -->
        </div>
        <!-- .comment-meta .commentmetadata -->
    </div>
    <!-- #comment-##  -->

    <?php isset($com)?>

    <?php if(isset($com[$item['id']])) { ?>
        <ul class="children">
            <?php  $this->load->view('apps/comment', ['items'=>$com[$item['id']]]); ?>
        </ul>
    <?php  } ?>

</li>
<?php } ?>