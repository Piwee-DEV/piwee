<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 *  Single
 */
get_header();
global $bd_data;

/* Side bar */
if(get_post_meta($post->ID, 'bd_full_width', true))
{
    $post_full      = ' post_full_width';
}

if(get_post_meta($post->ID, 'bd_sidebar_position', true) == 'left')
{
    $post_po        = ' post_sidebar_left';
}
elseif(get_post_meta($post->ID, 'bd_sidebar_position', true) == 'right')
{
    $post_po        = ' post_sidebar_right';
}

?>
    <div class="<?php echo $post_po; echo $post_full ?>">
        <div class="content-wrapper">
            <div class="inner">
                <?php bd_breadcrumb(); ?>
                <?php if(have_posts()): the_post(); ?>
                <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">

                    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                    <?php echo"<div class='clearfix'></div> \n"; echo bd_post_meta(); ?>

                    <?php echo bd_post_above_ads() ?>

                    <div class="post-entry bottom40">
                        <?php the_content(); ?>
                    </div>

                    <?php echo bd_post_below_ads() ?>
                    <?php
                        if($bd_data['comments_pages']):
                            echo '<br class="clear" />';
                            comments_template('', true);
                        endif;
                    ?>

                </article>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
        </div><!-- .content-wrapper/-->
        <?php
        if(get_post_meta($post->ID, 'bd_full_width', true))
        {

        }
        else
        {
            get_sidebar();
        }
        ?>
        <div class="clear"></div>
    </div>
<?php get_footer(); ?>