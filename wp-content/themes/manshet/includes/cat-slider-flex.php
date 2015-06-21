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
$category_id        = get_query_var('cat') ;
$slider_nub         = $bd_data ['slider_bumber'];
?>
    <div id="slider" class="slider-flex flexslider">
        <div class="post-warpper">
            <ul class="slides">
                <?php
                    $args= array('posts_per_page'=> $slider_nub , 'cat' => $category_id );
                    $featured_query = new wp_query( $args );
                    if( $featured_query->have_posts() ) :
                    $i= 0;
                    while ( $featured_query->have_posts() ) : $featured_query->the_post(); $i++;
                    ?>
                        <li id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                            <?php
                            $img_w      = 620;
                            $img_h      = 360;
                            $thumb      = bd_post_image('full');
                            $image      = aq_resize( $thumb, $img_w, $img_h, true );
                            if($image =='')
                            {
                                $image = BD_IMG .'default-620-360.png';
                            }
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
                                if($image) :
                                    echo '<div><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. $image .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                                endif;
                            }
                            ?>
                            <div class="post-caption">
                                <div class="post-caption-content">
                                    <h4 class="post-cate"><?php the_category(', '); ?></h4>
                                    <h1 class="post-title"><a href="<?php the_permalink()?>" rel="bookmark"><?php the_title(); ?></a></h1><!-- .post-title/-->
                                    <div class="post-excerpt"><?php wp_excerpt('wp_bd2'); ?></div><!-- .post-excerpt/-->
                                </div>
                            </div><!-- .post-caption/-->
                        </li><!-- article/-->
                    <?php endwhile; endif; ?>
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