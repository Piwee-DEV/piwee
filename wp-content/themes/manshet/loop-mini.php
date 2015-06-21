<?php global $bd_data;
if (have_posts()) :
    while (have_posts()) : the_post();
        /* Blog */
        ?>
        <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
            <?php bd_wp_thumb( '240', '160', '' ); ?>
            <div class="mini-post-entry">
                <div class="mini-post-cate">
                    <?php echo "<div class='post_meta_cats'>\n"; the_category(', '); echo "</div>\n"; ?>
                </div>
                <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                <div class="mini-post-meta">
                    <?php
                    /* post_meta_date */
                    if($bd_data['post_meta_date']):
                        echo "<div class='post_meta_date'><i class='icon-time'></i>\n";
                        the_time("j F Y");
                        echo "</div>\n";
                    endif;
                    /* post_meta_author */
                    if($bd_data['post_meta_author']):
                        echo "<div class='post_meta_author'><i class='icon-user'></i>\n";
                        the_author_posts_link();
                        echo "</div>\n";
                    endif;
                    /* post_meta_comments */
                    if($bd_data['post_meta_comments']):
                        echo "<div class='post_meta_comments'><i class='icon-comments'></i>\n";
                        comments_popup_link(__('0 Comments', 'bd'), __('1 Comment', 'bd'), '% '.__('Comments', 'bd'));
                        echo "</div>\n";
                    endif;
                    ?>
                    <span class="widget"><?php echo bd_wp_post_rate() ?></span>
                </div>
            </div>
        </article>
    <?php
    endwhile;
else :
    ?>
    <article class="post-entry">
        <div class="oops">oops!</div>
        <div class="text-aligncenter oops-meta">
            <?php _e('Sorry, but you are looking for something that isn\'t here, back to', 'bd'); ?>
            <a href="index.php"><?php _e('Homepage','bd') ?></a>
        </div>
    </article>
<?php
endif;