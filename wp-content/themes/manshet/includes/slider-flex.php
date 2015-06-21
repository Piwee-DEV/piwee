<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 *  http://themeforest.net/user/bdayh
 *  Flex Slider
 */
    global $bd_data;
    $slider_speed       = $bd_data ['slider_speed'];
    $slider_animation   = $bd_data ['slider_animation'];

if ( $bd_data['slider_show'] )
{
    $slider_display     = $bd_data ['slider_display'];

    if(array_key_exists('slider_category',$bd_data))
    {
    	$slider_cat         = $bd_data ['slider_category'];
    }

    if(array_key_exists('slider_tag',$bd_data))
    {
    	$slider_tag         = $bd_data ['slider_tag'];
    }

    $slider_nub         = $bd_data ['slider_bumber'];

    if ($slider_display == 'lates')
    {
        query_posts(array('showposts' => $slider_nub));
    }
    elseif ($slider_display == 'category')
    {
        query_posts(array('showposts' => $slider_nub, 'cat' => $slider_cat ));
    }
    elseif ($slider_display == 'tag')
    {
        query_posts(array('showposts' => $slider_nub, 'tag' => $slider_tag ));
    }
    else
    {
        query_posts(array('showposts' => 5));
    }

    ?>
    <div id="slider" class="slider-flex flexslider">
        <div class="post-warpper">
            <ul class="slides">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                        <?php
                            $img_w      = 620;
                            $img_h      = 360;
                            $thumb      = bd_post_image('full');
                            $image      = aq_resize( $thumb, $img_w, $img_h, true );
                            $alt        = get_the_title();
                            $link       = get_permalink();
                            if (strpos(bd_post_image(), 'youtube'))
                            {
                                echo '<div><a href="'. $link .'" title="'. $alt .'"><img width="'. $img_w .'" height="'. $img_h .'"  src="'. bd_post_image('full').'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                            }
                            elseif (strpos(bd_post_image(), 'vimeo'))
                            {
                                echo '<div><a href="'. $link .'" title="'. $alt .'"><img width="'. $img_w .'" height="'. $img_h .'"  src="'. bd_post_image('full').'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                            }
                            elseif (strpos(bd_post_image(), 'dailymotion'))
                            {
                                echo '<div><a href="'. $link .'" title="'. $alt .'"><img width="'. $img_w .'" height="'. $img_h .'"  src="'. bd_post_image('full').'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                            }
                            else
                            {
                                echo '<div><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. $image .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                            }
                        ?>
                        <div class="post-caption">
                            <div class="post-caption-content">
                                <h4 class="post-cate"><?php the_category(', '); ?></h4>
                                <h1 class="post-title"><a href="<?php the_permalink()?>" rel="bookmark"><?php the_title(); ?></a></h1><!-- .post-title/-->
                                <?php if(array_key_exists('slider_excerpt_show', $bd_data )) { ?>
                                    <div class="post-excerpt"><?php wp_excerpt('wp_bd2'); ?></div><!-- .post-excerpt/-->
                                <?php } ?>
                            </div>
                        </div><!-- .post-caption/-->
                    </li><!-- article/-->
                <?php endwhile; else: endif; wp_reset_query(); ?>
            </ul>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function()
            {
                jQuery('#slider').flexslider({
                    animation       : "fade",
                    easing          : "swing",
                    slideshowSpeed  : <?php if($bd_data['slider_speed'] != ''){echo $bd_data['slider_speed'];} else {echo 6666;} ?>,
                    animationSpeed  : <?php if($bd_data['slider_animation'] != ''){echo $bd_data['slider_animation'];} else {echo 555;} ?>,
                    randomize       : false,
                    pauseOnHover    : false,
                    controlNav      : true,
                    directionNav    : true,
                    prevText        : '<i class="icon-chevron-left"></i>',
                    nextText        : '<i class="icon-chevron-right"></i>'
                });
            });
        </script>
    </div>
    <?php
}