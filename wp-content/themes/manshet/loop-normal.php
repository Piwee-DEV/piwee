<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
            <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
            <?php echo'<div class="clearfix"></div>' ."\n"; echo bd_wp_post_rate(); ?>
            <?php echo bd_post_meta(); ?>
            <?php bd_wp_thumb( '270', '180', '' ); ?>
            <div class="post-entry"><p><?php wp_excerpt('wp_bd5'); ?></p></div><!-- .post-excerpt/-->
            <div class="sub-article-buttons">
                <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>">
                    <?php if(function_exists("social_shares_button")) social_shares_button(); ?>
                    <?php bd_in ('live-sharing'); // Get Social Sharing ?>
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