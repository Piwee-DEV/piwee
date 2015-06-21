<?php
    get_header();
    echo bd_breaking_news_in_pic();
?>

<div class="content-wrapper">
    <div class="inner">
        <?php
        global $bd_data;
        /**
         * Slider
         */
        include (get_template_directory().'/includes/slider-flex.php');

        ?>

        <?php if($category_featured_enabled == 'on'){ include (get_template_directory().'/includes/cat-slider-flex.php'); }  ?>
        <div class="box-title bottom20">
            <h2>
                <b>Accueil</b>

                <?php global $bd_data; $category_id = get_query_var('cat'); if( $bd_data['cate_rss'] ){ ?>
                    <a class="rss-cat ttip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>"><i class="social_icon-rss"></i></a>
                <?php } ?>
            </h2>
        </div>

        <?php
        global $bd_data;
        if ( is_category() )
        {
            if( $bd_data['category_desc'] )
            {
                $category_description = category_description();
                if( ! empty( $category_description ) )
                {
                    echo '<div class="archive-dec">' . $category_description . '</div>';
                }
            }
        }
        ?>

        <?php

        $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts('showposts=20&paged=' . $page . '&posts_per_page=10');

        if (have_posts()) :
            while (have_posts()) : the_post();
                $bd_count++;
                ?>
                <article class="blog-two half-width-category <?php if( $bd_count == 2 ) { echo 'last-column'; $bd_count= 0; } ?>" id="post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
                    <?php bd_wp_thumb( '295', '160', '' ); ?>
                    <div class="blog-two-inner">
                        <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                        <div class="post-entry"><p><?php wp_excerpt('wp_bd6'); ?></p></div><!-- .post-excerpt/-->
                        <div class="post-readmore">
                            <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                            <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                                <?php if(function_exists("social_shares_button")) social_shares_button(); ?>
                                <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                            </div>
                        </div><!-- .post-readmore/-->
                    </div>
                </article>
            <?php
            endwhile;
            bd_pagenavi($pages = '', $range = 2);
        else :
            ?>
            <article class="post-entry">
                <h1><?php _e('Not Found', 'bd'); ?></h1>
                <p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.', 'bd'); ?></p>
            </article>
        <?php
        endif;
        ?>
        <div class="clear"></div>
    </div>
</div><!-- .content-wrapper/-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>