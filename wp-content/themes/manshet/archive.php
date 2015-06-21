<?php
get_header();
global $bd_data;
$category_ID                = get_query_var('cat');
$category_blog_style        = get_tax_meta($category_ID,'bd_blog_style');
$category_featured_enabled  = get_tax_meta($category_ID,'bd_featured_slider');
global $bd_count;
$bd_count = 0;?>

<?php

    $category_blog_style = 'blog-style-3'; 
    //SPE PIWEE : TOUTES LES CATEGORIES EN GRID

?>


<?php if($category_blog_style == 'blog-style-1'){ ?>
<div class="content-wrapper">
    <div class="inner">

        <?php if($category_featured_enabled == 'on'){ include (get_template_directory().'/includes/cat-slider-flex.php'); }  ?>
        <div class="box-title bottom20">
            <h2>
                <?php if ( is_day() ) : ?>
                    <b><?php printf( __( 'Daily Archives: %s', 'bd' ), '<span>' . get_the_date() . '</span>' ); ?></b>
                <?php elseif ( is_month() ) : ?>
                    <b><?php printf( __( 'Monthly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bd' ) ) . '</span>' ); ?></b>
                <?php elseif ( is_year() ) : ?>
                    <b><?php printf( __( 'Yearly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bd' ) ) . '</span>' ); ?></b>
                <?php else : ?>
                    <b> <?php single_cat_title(); ?> </b>

                    <?php global $bd_data; $category_id = get_query_var('cat'); if( $bd_data['cate_rss'] ){ ?>
                        <a class="rss-cat ttip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>"><i class="social_icon-rss"></i></a>
                    <?php } ?>

                <?php endif; ?>
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
                    </div><!-- .post-readmore/-->                    </div>
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
<?php }elseif($category_blog_style == 'blog-style-2'){ ?>
    <div class="content-wrapper">
        <div class="inner">

            <?php if($category_featured_enabled == 'on'){ include (get_template_directory().'/includes/cat-slider-flex.php'); }  ?>
            <div class="box-title bottom20">
                <h2>
                    <?php if ( is_day() ) : ?>
                        <b><?php printf( __( 'Daily Archives: %s', 'bd' ), '<span>' . get_the_date() . '</span>' ); ?></b>
                    <?php elseif ( is_month() ) : ?>
                        <b><?php printf( __( 'Monthly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bd' ) ) . '</span>' ); ?></b>
                    <?php elseif ( is_year() ) : ?>
                        <b><?php printf( __( 'Yearly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bd' ) ) . '</span>' ); ?></b>
                    <?php else : ?>
                        <b> <?php single_cat_title(); ?> </b>

                        <?php global $bd_data; $category_id = get_query_var('cat'); if( $bd_data['cate_rss'] ){ ?>
                            <a class="rss-cat ttip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>"><i class="social_icon-rss"></i></a>
                        <?php } ?>

                    <?php endif; ?>
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
            echo "<div class='home-blog home-small'>\n";
            if (have_posts()) :
                while (have_posts()) : the_post();
                    /* Blog */
                    ?>
                    <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
                        <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                        <?php echo'<div class="clearfix"></div>' ."\n"; echo bd_wp_post_rate(); ?>
                        <?php echo bd_post_meta(); ?>
                        <?php bd_wp_thumb( '270', '180', '' ); ?>
                        <div class="post-entry"><p><?php wp_excerpt('wp_bd5'); ?></p></div><!-- .post-excerpt/-->
                        <div class="post-readmore">                
                            <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                            <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                                <?php if(function_exists("social_shares_button")) social_shares_button(); ?>
                                <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                            </div>
                        </div><!-- .post-readmore/-->                        </article>
                <?php
                endwhile;
                bd_pagenavi($pages = '', $range = 2);
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
            echo "\n</div>\n";
            ?>
            <div class="clear"></div>
        </div>
    </div><!-- .content-wrapper/-->
    <?php get_sidebar(); ?>
<?php }elseif($category_blog_style == 'blog-style-3'){ ?>
<div class="inner-grid">

    <div class="box-title bottom20">
        <h2>
            <?php if ( is_day() ) : ?>
                <b><?php printf( __( 'Daily Archives: %s', 'bd' ), '<span>' . get_the_date() . '</span>' ); ?></b>
            <?php elseif ( is_month() ) : ?>
                <b><?php printf( __( 'Monthly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bd' ) ) . '</span>' ); ?></b>
            <?php elseif ( is_year() ) : ?>
                <b><?php printf( __( 'Yearly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bd' ) ) . '</span>' ); ?></b>
            <?php else : ?>
                <b> <?php single_cat_title(); ?> </b>

                <?php global $bd_data; $category_id = get_query_var('cat'); if( $bd_data['cate_rss'] ){ ?>
                    <a class="rss-cat ttip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>"><i class="social_icon-rss"></i></a>
                <?php } ?>

            <?php endif; ?>
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
    echo "<div class='article-grid'>\n";
        get_template_part('loop-grid');
        bd_pagenavi($pages = '', $range = 2);
    echo "\n<div class='clear'></div></div>\n";
?>
</div>
<?php }elseif($category_blog_style == 'blog-style-4'){ ?>
<div class="inner-grid">
    <div class="box-title bottom20">
        <h2>
            <?php if ( is_day() ) : ?>
                <b><?php printf( __( 'Daily Archives: %s', 'bd' ), '<span>' . get_the_date() . '</span>' ); ?></b>
            <?php elseif ( is_month() ) : ?>
                <b><?php printf( __( 'Monthly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bd' ) ) . '</span>' ); ?></b>
            <?php elseif ( is_year() ) : ?>
                <b><?php printf( __( 'Yearly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bd' ) ) . '</span>' ); ?></b>
            <?php else : ?>
                <b> <?php single_cat_title(); ?> </b>

                <?php global $bd_data; $category_id = get_query_var('cat'); if( $bd_data['cate_rss'] ){ ?>
                    <a class="rss-cat ttip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>"><i class="social_icon-rss"></i></a>
                <?php } ?>

            <?php endif; ?>
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
    echo "<div class='article-grid'>\n";
        $format = get_post_format();
        if( false === $format ) { $format = 'standard'; }
            get_template_part('loop-grid-formats', $format);
        bd_pagenavi($pages = '', $range = 2);
    echo "\n<div class='clear'></div></div>\n";
?>
</div>
<?php }else{ ?>
    <div class="content-wrapper">
        <div class="inner">
            <?php if($category_featured_enabled == 'on'){ include (get_template_directory().'/includes/cat-slider-flex.php'); }  ?>
            <div class="box-title bottom20">
                <h2>
                <?php if ( is_day() ) : ?>
                    <b><?php printf( __( 'Daily Archives: %s', 'bd' ), '<span>' . get_the_date() . '</span>' ); ?></b>
                <?php elseif ( is_month() ) : ?>
                    <b><?php printf( __( 'Monthly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bd' ) ) . '</span>' ); ?></b>
                <?php elseif ( is_year() ) : ?>
                    <b><?php printf( __( 'Yearly Archives: %s', 'bd' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bd' ) ) . '</span>' ); ?></b>
                <?php else : ?>
                    <b> <?php single_cat_title(); ?> </b>

                    <?php global $bd_data; $category_id = get_query_var('cat'); if( $bd_data['cate_rss'] ){ ?>
                        <a class="rss-cat ttip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>"><i class="social_icon-rss"></i></a>
                    <?php } ?>

                <?php endif; ?>
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
            echo "<div class='home-blog home-small'>\n";
            if (have_posts()) :
                while (have_posts()) : the_post();
                    /* Blog */
                    ?>
                    <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
                        <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                        <?php echo'<div class="clearfix"></div>' ."\n"; echo bd_wp_post_rate(); ?>
                        <?php echo bd_post_meta(); ?>
                        <?php bd_wp_thumb( '270', '180', '' ); ?>
                        <div class="post-entry"><p><?php wp_excerpt('wp_bd5'); ?></p></div><!-- .post-excerpt/-->
                        <div class="post-readmore">                
                            <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                            <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                                <?php if(function_exists("social_shares_button")) social_shares_button(); ?>
                                <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                            </div>
                        </div><!-- .post-readmore/-->                        </article>
                <?php
                endwhile;
                bd_pagenavi($pages = '', $range = 2);
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
            echo "\n</div>\n";
            ?>
            <div class="clear"></div>
        </div>
    </div><!-- .content-wrapper/-->
    <?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>