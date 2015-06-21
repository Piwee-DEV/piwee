<?php
// Template Name: Full Width
get_header();
?>

<div class="inner">
<?php bd_breadcrumb(); ?>
<?php while(have_posts()): the_post(); ?>
    <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
        <?php echo bd_post_top(); ?>
        <div class="clearfix"></div>
        <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
        <?php echo"<div class='clearfix'></div> \n"; echo bd_post_meta(); ?>

        <?php echo bd_post_above_ads() ?>
        <div class="post-entry bottom40">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        </div>
        <?php echo bd_post_below_ads() ?>

    </article>
<?php endwhile; ?>

    <?php if($bd_data['post_author_box']): ?>
        <div class="post-author-box">
            <div class="box-title"><h2><b>L'AUTEUR : <?php the_author_posts_link(); ?></b></h2></div>
            <?php echo bd_author_box() ?>
        </div>
    <?php endif; ?>

    <?php
    if($bd_data['post_fb_comments_box']):
        // Get the current page url for FB comments
        $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        echo '<div class="fb-comments" data-href="'. $url .'" data-num-posts="4" data-width="620"></div>' ."\n";
    endif;

    if($bd_data['post_comments_box']):
        comments_template('', true);
    endif;
    ?>
</div>

<?php get_footer(); ?>