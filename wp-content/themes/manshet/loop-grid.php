<script type="text/javascript">
jQuery(document).ready(function(){
    var vids = jQuery(".article-grid .post-item");
    for(var i = 0; i < vids.length; i+=3){ vids.slice(i, i+3).wrapAll('<div class="article-grid-items"></div>'); }
});
</script>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        /* Blog */
        ?>
        <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
        <?php
            $img_w      = 298;
            $img_h      = 180;
            $thumb      = bd_post_image('full');
            $image      = aq_resize( $thumb, $img_w, $img_h, true );
            $alt        = get_the_title();
            $link       = get_permalink();
            if (strpos(bd_post_image(), 'youtube'))
            {
                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            }
            elseif (strpos(bd_post_image(), 'vimeo'))
            {
                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            }
            elseif (strpos(bd_post_image(), 'dailymotion'))
            {
                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            }
            else
            {
                if($image) :
                    echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                endif;
            }
        ?>
        <div class="article-grid-content">
            <div class="post-cate">
                <?php echo "<div class='post_meta_cats'>\n"; the_category(', '); echo "</div>\n"; ?>
            </div>
            <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
            <?php echo bd_wp_post_rate() ?>
            <div class="post-entry"><p><?php wp_excerpt('wp_bd6'); ?></p></div><!-- .post-excerpt/-->
            <div class="post-readmore">
                <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                <div class="sharing-interactive-grid" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                    <?php if(function_exists("social_shares_button")) social_shares_button("grid"); ?>
                    <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                </div>
            </div><!-- .post-readmore/-->            
            <div class="clear"></div>
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