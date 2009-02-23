<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
        return;
    }
}

/* This variable is for alternating comment background */
$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
<?php
    $author_email = get_the_author_email();
?>
    
    <div id="comments">
        <h2><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h2>

        <ol class="commentlist">

            <?php foreach ($comments as $comment) : ?>
                
            <?php
                $author_class = ($author_email == get_comment_author_email()) ? "author_comment" : '';
            ?>

                <li class="mod <?php echo $author_class.' '.$oddcomment; ?>" id="comment-<?php comment_ID() ?>">
                    <div class="hd">
                        <strong><cite><?php comment_author_link() ?></cite> Says:</strong>
                        <span class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></span>
                        <div class="avatar"><?php if(function_exists('get_avatar')){ echo get_avatar($comment, '48'); } ?></div>
                    </div>
                    <div class="bd">
                        <?php if ($comment->comment_approved == '0') : ?>
                            <em>Your comment is awaiting moderation.</em>
                        <?php endif; ?>

                        <?php comment_text() ?>
                    </div>
                </li>

            <?php
            /* Changes every other comment to a different class */
            $oddcomment = ( empty( $oddcomment ) ) ? 'alt' : '';
            ?>

            <?php endforeach; /* end for each comment */ ?>

        </ol>
    </div>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>

    <?php endif; ?>
<?php endif; ?>

<p>
<?php if ($post->ping_status == "open") { ?>
    <span><strong><a href="<?php trackback_url(display); ?>"><?php _e('Trackback URI', 'ml'); ?> </a></strong></span> |
<?php } ?>
<?php if ($post-> comment_status == "open") {?>
    <span><strong><?php comments_rss_link(__('Comments RSS', 'ml')); ?></strong></span>
<?php }; ?>
</p>
<?php if ('open' == $post->comment_status) : ?>

    <h2 id="respond">Leave a Reply</h2>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <?php if ( $user_ID ) : ?>

            <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

        <?php else : ?>

            <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1">
            <label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>

            <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2">
            <label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>

            <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3">
            <label for="url">Website</label></p>

        <?php endif; ?>

        <p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>
        <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment">
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
        </p>
        <?php do_action('comment_form', $post->ID); ?>

        </form>

    <?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>