<?php global $bd_data; ?>
<?php if($bd_data['article_related']): ?>
<div class="single-post-related">
    <div class="box-title"><h2><b>A VOIR EGALEMENT...</b></h2></div>
    <section id="related-posts">
        <div class="related-<?php echo $bd_data['related_style']; ?>">
            <?php
                $backup = $post;
                $tags = wp_get_post_tags($post->ID);
                $tagIDs = array();
                if ($tags)
                {
                    $tagcount = count($tags);
                    for ($i = 0; $i < $tagcount; $i++)
                    {
                        $tagIDs[$i] = $tags[$i]->term_id;
                    }
                    $args = array('tag__in' => $tagIDs, 'post__not_in' => array($post->ID), 'showposts' => $bd_data['article_related_numb'], 'ignore_sticky_posts' => 1);
                    $my_query = new WP_Query($args);
                    if ($my_query->have_posts())
                    {
                        while ($my_query->have_posts()) : $my_query->the_post();
                            if($bd_data['related_style'] == 'images')
                            {
                                ?>
                                <div class="related-item">
                                    <?php
                                        $img_w      = 270;
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
                                    <h4><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark" class="related-item-title"><?php the_title(); ?></a></h4>
                                </div>
                            <?php
                            }
                            else
                            {
                                ?>
                                <div class="related-item">
                                    <h4><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark" class="related-item-title"><?php the_title(); ?></a></h4>
                                </div>
                                <?php
                            }
                        endwhile;
                    }
                    else
                    {
                        ?><h2><?php _e('No related posts found!', 'bd'); ?></h2><?php
                    }
                    $post = $backup;
                    wp_reset_query();

                }
                else
                {
                    $cat = get_the_category();
                    $category = $cat[0]->cat_ID;
                    global $wp_query, $paged, $post;
                    $nextargs = array('cat' => $category, 'posts_per_page' => $bd_data['article_related_numb'], 'post__not_in' => array($post->ID),);
                    $nextloop = new WP_Query($nextargs);
                    while ($nextloop->have_posts()) : $nextloop->the_post();
                        if($bd_data['related_style'] == 'images')
                        {
                            ?>
                            <div class="related-item">
                                <?php
                                $img_w      = 270;
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
                                <h4><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark" class="related-item-title"><?php the_title(); ?></a></h4>
                            </div>
                        <?php
                        }
                        else
                        {
                            ?>
                            <div class="related-item">
                                <h4><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark" class="related-item-title"><?php the_title(); ?></a></h4>
                            </div>
                            <?php
                        }
                    endwhile;
                    rewind_posts();
                    wp_reset_query();
                }
            ?>
        </div>
        <div class="clear"></div>
    </section>
</div>
<?php endif; ?>