<?php global $bd_data; global $post; ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        var vids = jQuery(".article-grid .post-item");
        for(var i = 0; i < vids.length; i+=3){ vids.slice(i, i+3).wrapAll('<div class="article-grid-items"></div>'); }
    });
</script>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        if (has_post_format('video')):
            /* video */
            ?><article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
            <?php
            $img_w          = 298;
            $img_h          = 180;
            $type           = get_post_meta($post->ID, 'bd_video_type', true);
            $id             = get_post_meta($post->ID, 'bd_video_url', true);
            $embed          = get_post_meta($post->ID, 'bd_embed_code', true);

            if($type == 'youtube')
            {
                echo '<div class="post-image video-box"><iframe width="'. $img_w .'" height="'. $img_h .'" src="http://www.youtube.com/embed/'. $id .'?rel=0" frameborder="0" allowfullscreen></iframe></div>'."\n";
            }
            elseif($type == 'vimeo')
            {
                echo '<div class="post-image video-box"><iframe src="http://player.vimeo.com/video/'. $id .'?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="'. $img_w .'" height="'. $img_h .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>'."\n";
            }
            elseif($type == 'daily')
            {
                echo '<div class="post-image video-box"><iframe frameborder="0" width="'. $img_w .'" height="'. $img_h .'" src="http://www.dailymotion.com/embed/video/'. $id .'?logo=0"></iframe></div>'."\n";
            }
            elseif($type == 'embed')
            {
                $embed_code = $get_meta["bd_embed_code"][0];
                $video_code = htmlspecialchars_decode($embed_code);
            }
            ?>

            <div class="article-grid-content">
                <div class="post-cate">
                    <?php echo "<div class='post_meta_cats'>\n"; the_category(', '); echo "</div>\n"; ?>
                </div>
                <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                <?php echo bd_wp_post_rate() ?>
                <div class="post-entry"><p><?php wp_excerpt('wp_bd6'); ?></p></div><!-- .post-excerpt/-->
                <div class="post-readmore">                <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                    <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                        <?php if(function_exists("social_shares_button")) social_shares_button("grid"); ?>
                        <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                    </div>
                </div><!-- .post-readmore/-->
                <div class="clear"></div>
            </div>
            </article><?php


        elseif ( has_post_format('audio')):
            /* audio */

            ?><article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
            <?php
            $post_type       = get_post_meta($post->ID, 'bd_post_type', true);
            $url             = get_post_meta($post->ID, 'bd_soundcloud_url', true);
            $soundcloudauto  = get_post_meta($post->ID, 'bd_soundcloud_auto', true);
            if($post_type == 'post_soundcloud')
            {
                echo '<div class="post-image soundcloud-box"><iframe width="100%" height="180" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='. $url .'&amp;auto_play=false&amp;show_artwork=true"></iframe></div>'."\n";
            }
            ?>
            <div class="article-grid-content">
                <div class="post-cate">
                    <?php echo "<div class='post_meta_cats'>\n"; the_category(', '); echo "</div>\n"; ?>
                </div>
                <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                <?php echo bd_wp_post_rate() ?>
                <div class="post-entry"><p><?php wp_excerpt('wp_bd6'); ?></p></div><!-- .post-excerpt/-->
                <div class="post-readmore">                <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                    <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                        <?php if(function_exists("social_shares_button")) social_shares_button("grid"); ?>
                        <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                    </div>
                </div><!-- .post-readmore/-->
                <div class="clear"></div>
            </div>
            </article><?php

        elseif ( has_post_format('gallery')):
            /* gallery */
            ?><article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
            <?php
            $args = array(
                'order'          => 'ASC',
                'post_type'      => 'attachment',
                'post_parent'    => $post->ID,
                'post_mime_type' => 'image',
                'post_status'    => null,
                'orderby'		 => 'menu_order',
                'numberposts'    => -1,
            );
            $attachments = get_posts($args);
            $img_w      = 298;
            $img_h      = 180;
            echo '<div id="slider-post-'. get_the_ID() .'" class="flexslider post-gallery"><ul class="slides">' ."\n";
            if ($attachments)
            {
                foreach ($attachments as $attachment)
                {
                    $attachment_url     = wp_get_attachment_url($attachment->ID , 'full');
                    $image              = aq_resize($attachment_url, $img_w, $img_h, true);
                    echo '<li><a href="'. $attachment_url .'?lightbox[modal]=true" class="lightbox" rel="group1"><img src="'.$image.'" alt="" /></a></li>';
                }
            }
            echo "\n". '</ul></div>' ."\n";
            ?>
            <script>
                jQuery(window).load(function()
                {
                    jQuery('#slider-post-<?php the_ID() ?>').flexslider({
                        animation: "fade",
                        easing: "swing",
                        keyboard: false,
                        slideshowSpeed: 5000,
                        animationSpeed: 500,
                        randomize: false,
                        pauseOnHover: true,
                        controlNav: false,
                        directionNav: true,
                        prevText: '<i class="icon-chevron-left"></i>',
                        nextText: '<i class="icon-chevron-right"></i>'
                    });
                });
            </script>
            <div class="article-grid-content">
                <div class="post-cate">
                    <?php echo "<div class='post_meta_cats'>\n"; the_category(', '); echo "</div>\n"; ?>
                </div>
                <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><!-- .post-title/-->
                <?php echo bd_wp_post_rate() ?>
                <div class="post-entry"><p><?php wp_excerpt('wp_bd6'); ?></p></div><!-- .post-excerpt/-->
                <div class="post-readmore">                <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                    <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                        <?php if(function_exists("social_shares_button")) social_shares_button("grid"); ?>
                        <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                    </div>
                </div><!-- .post-readmore/-->
                <div class="clear"></div>
            </div>
            </article><?php

        elseif ( has_post_format('standard')):
            /* standard */

            ?><article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
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
                <div class="post-readmore">                <?php if(function_exists("categ_gen_button")) categ_gen_button(); ?>
                    <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>" onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                        <?php if(function_exists("social_shares_button")) social_shares_button("grid"); ?>
                        <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                    </div>
                </div><!-- .post-readmore/-->
                <div class="clear"></div>
            </div>
            </article><?php

        else :

            /* Blog */
            ?><article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">
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
                        <div class="sharing-interactive" id="sharing-interactive-<?php the_ID(); ?>"  onmouseover="openSharePanelForID('<?php the_ID(); ?>')" onmouseout="hideSharePanelForID('<?php the_ID(); ?>');">
                            <?php if(function_exists("social_shares_button")) social_shares_button("grid"); ?>
                            <?php bd_in ('live-sharing'); // Get Social Sharing ?>
                        </div>
                    </div><!-- .post-readmore/-->                    <div class="clear"></div>
                </div>
            </article><?php
        endif;
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