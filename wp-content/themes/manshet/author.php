<?php
get_header();
global $bd_count;
$bd_count = 0; ?>
    <div class="content-wrapper">
        <div class="inner">

                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                    <div class="post-author-box ">
                        <div class="box-title"><h2><b>L'AUTEUR : <?php the_author_posts_link(); ?></b></h2>
                        </div>
                        <?php echo bd_author_box() ?>
                    </div>
                <?php endif; rewind_posts(); ?>

            <div class="divider"></div>
            <?php
            if (have_posts()) :
                echo '<div>';
                while (have_posts()) : the_post();
                    $bd_count++;
                    ?>
                    <article class="blog-two half-width-category <?php if( $bd_count == 2 ) { echo 'last-column'; $bd_count= 0; } ?>" id="post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
                        <?php
                        $img_w      = 295;
                        $img_h      = 160;
                        $thumb      = bd_post_image('full');
                        $image      = aq_resize( $thumb, $img_w, $img_h, true );
                        if($image =='')
                        {
                            $image = BD_IMG .'default-295-160.png';
                        }
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
                echo '</div>';
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
            <?php endif; ?>
            <div class="clear"></div>
        </div>
    </div><!-- .content-wrapper/-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>