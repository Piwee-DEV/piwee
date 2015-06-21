<?php
//Template Name: Tags
get_header();
global $bd_data;
?>

<div class="content-wrapper">
    <div class="inner">
    <div class="box-title bottom40"><h2><b><?php the_title();?></b></h2></div>
        <?php echo bd_post_above_ads() ?>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
            <div class="post-entry bottom40">

                <?php
                    the_content();
                    $args = array(
                        'smallest'                  => 8,
                        'largest'                   => 22,
                        'unit'                      => 'pt',
                        'number'                    => 0);
                    wp_tag_cloud( $args );
                    wp_link_pages();
                ?>

            </div>
        </article>
        <?php endwhile; ?>
        <?php echo bd_post_below_ads() ?>
        <?php comments_template( '', true ); ?>
    </div>
</div>
<?php get_sidebar(); get_footer(); ?>