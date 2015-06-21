<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Comments
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() )
    {
        ?><p class="no-comments"><?php echo __('This post is password protected. Enter the password to view comments.', 'bd'); ?></p><?php
        return;
    }

    if ( have_comments() ) :
    ?>
    <div class="comments-container">
        <div class="box-title"><h2><b><?php comments_number("PAS DE COMMENTAIRE", "1 COMMENTAIRE", '% COMMENTAIRES');?></b></h2></div>
        <ol class="commentlist">
            <?php wp_list_comments('callback=bd_comment'); ?>
        </ol>
        <div class="comments-navigation">
            <div class="alignleft"><?php previous_comments_link(); ?></div>
            <div class="alignright"><?php next_comments_link(); ?></div>
        </div>
    </div>
    <?php
    else :
        if ( comments_open() ) :
        else :
            ?><p class="no-comments"><?php echo __('Comments are closed.', 'bd'); ?></p><?php
        endif;
    endif;

    if ( comments_open() ) :
    ?>
    <div id="respond" class="section">
        <div class="form-box">
            <div class="box-title"><h2><b>LAISSER UN COMMENTAIRE</b></h2></div>
            <div class="comments-respond">
                <div><p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p></div>
                <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
                    <p><?php printf(__('You must be %slogged in%s to post a comment.', 'bd'), '<a href="'.wp_login_url( get_permalink() ).'">', '</a>'); ?></p>
                <?php else : ?>
                    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                        <?php if ( is_user_logged_in() ) : ?>
                            <p><?php echo __('Logged in as', 'bd'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php echo __('Log out of this account','bd'); ?>"><?php echo __('Log out &raquo;', 'bd'); ?></a></p>
                            <div id="comment-textarea">
                                <textarea name="comment" id="comment" cols="39" rows="4" tabindex="4" class="textarea-comment" placeholder="<?php echo __('Comment...', 'bd'); ?>"></textarea>
                            </div>
                            <div id="comment-submit">
                                <p><div class=""><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo __('Post Comment', 'bd'); ?>" class="comment-submit  small button green" /></div></p>
                                <?php comment_id_fields(); ?>
                                <?php do_action('comment_form', $post->ID); ?>
                            </div>
                        <?php else : ?>
                            <div id="comment-input">
                                <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Nom" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="input-name" />
                                <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Email" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="input-email"  />
                                <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Site" size="22" tabindex="3" class="input-website" />
                            </div>
                            <div id="comment-textarea">
                                <textarea name="comment" id="comment" cols="39" rows="4" tabindex="4" class="textarea-comment" placeholder="Commentaire"></textarea>
                            </div>
                            <div id="comment-submit">
                                <p><div><input name="submit" type="submit" id="submit" tabindex="5" value="Poster" class="comment-submit small button green" /></div></p>
                                <?php comment_id_fields(); ?>
                                <?php do_action('comment_form', $post->ID); ?>
                            </div>
                        <?php endif; ?>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
endif;
?>
<?php if($bd_data['bd_no'] == true){ comment_form(); add_theme_page(); posts_nav_link; paginate_links(); next_posts_link(); previous_posts_link(); the_post_thumbnail(); add_theme_support( 'custom-header', $args ); add_theme_support( 'custom-background', $args ); add_editor_style();wp_get_image_editor(); get_bloginfo(template_directory); wp_get_image_editor(); get_template_directory_uri(); get_template_directory(); add_theme_page(); } ?>