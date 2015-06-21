<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 */
get_header(); global $bd_data;

?>

<?php
    $parent = get_post_field('post_parent', get_the_ID());
    $link = get_permalink($parent);
    $title = get_the_title($parent);
?>

<div>
    <div class="inner">
        <?php //bd_breadcrumb(); ?>
        <?php if(have_posts()): the_post(); ?>
            <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
                <div class="post-entry" style="margin-top:30px;">
                    <?php the_content(); ?>
                </div>
                <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php echo $title; ?></a></h2><!-- .post-title/-->
                <?php  bd_wp_thumb( '620', '360', 'lightbox' ); ?>
                <p style="text-align:center;font-size:1.3em;">
                    <a href="<?php echo $link ?>">
                        (Voir l'article)
                    </a>
                </p>
            </article>
        <?php endif; ?>
        <div class="clear"></div>

        <br><br>

       <?php if (function_exists("display_social_share_bar")) display_social_share_bar(); ?>

       <br><br>

        <h3 style="color:rgb(213, 172, 60);">Qu'en pensez-vous ?</h3>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-comments" data-href="<?php echo $link ?>" data-numposts="5" data-colorscheme="light"></div>

        <div id="taboola-below-article-thumbnails"></div>
        <script type="text/javascript">
            window._taboola = window._taboola || [];
            _taboola.push({
                mode: 'thumbnails-a',
                container: 'taboola-below-article-thumbnails',
                placement: 'Below Article Thumbnails',
                target_type: 'mix'
            });
        </script>            

    </div>
</div>
<?php get_sidebar(); get_footer(); ?>