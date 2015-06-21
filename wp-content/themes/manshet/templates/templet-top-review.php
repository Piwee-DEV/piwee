<?php
//Template Name: Top Reviews
get_header(); global $bd_data;
?>

<div class="content-wrapper">
    <div class="inner page-top-reviews">
        <div class="box-title bottom40"><h2><b><?php the_title();?></b></h2></div>
        <div class='home-blog home-small'>
        <?php
            global $wpdb;
            $id = $idObj->term_id;
            $i = 0;
            $r  = new WP_Query(array('showposts' => 10, 'meta_key' => 'bd_final_score', 'orderby' => 'meta_value', 'cat' => $id, 'nopaging' => 0, 'post_status' => 'publish'));
            if ($r->have_posts()) : while ($r->have_posts()) : $r->the_post();
                $category_link          = get_category_link( $id );
                $category_name          = get_cat_name( $id );
                $bd_review_enable       = get_post_meta(get_the_ID(), 'bd_review_enable', true);
                $bd_final_score         = get_post_meta(get_the_ID(), 'bd_final_score', true);
                $bd_final_percentage    = $bd_final_score * 20 + 2 ;

                $format = get_post_format();
                if ( false === $format )
                    $format = 'standard';

                $i++;
                ?>
                <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
                    <span class="post-num-z"><?php echo $i; ?></span>
                    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                    <?php echo'<div class="clearfix"></div>' ."\n"; echo bd_wp_post_rate(); ?>
                    <?php echo bd_post_meta(); ?>
                    <?php
                        $img_w      = 270;
                        $img_h      = 180;
                        $thumb      = bd_post_image('full');
                        $image      = aq_resize( $thumb, $img_w, $img_h, true );
                        $alt        = get_the_title();
                        $link       = get_permalink();

                        if (strpos(bd_post_image(), 'youtube'))
                        {
                            echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                        }
                        elseif (strpos(bd_post_image(), 'vimeo'))
                        {
                            echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                        }
                        elseif (strpos(bd_post_image(), 'dailymotion'))
                        {
                            echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                        }
                        else
                        {
                            if($image) :
                                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. $image .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                            endif;
                        }
                    ?>
                    <div class="post-entry"><p><?php wp_excerpt('wp_bd5'); ?></p></div><!-- .post-excerpt/-->
                    <div class="post-readmore"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"  class="btn btn-small"><?php _e('Read more', 'bd'); ?></a></div><!-- .post-readmore/-->
                </article>
            <?php endwhile; $post = $orig_post; endif; wp_reset_query();
        ?>
        </div>
    </div>
</div>

<?php get_sidebar(); get_footer(); ?>