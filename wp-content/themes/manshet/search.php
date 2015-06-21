<?php
get_header();
global $bd_count;
$bd_count = 0; ?>

    <div class="content-wrapper">
        <div class="inner">
                <div class="box-title">
                    <h2>
                        <b><?php _e('Results for', 'bd');?> <em>"<?php printf(get_search_query());?>"</em></b>
                    </h2>
                </div>
            <?php
                if (have_posts()) :
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
                                <div class="post-entry"><p><?php wp_excerpt('wp_bd1'); ?></p></div><!-- .post-excerpt/-->
                                <div class="post-readmore"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"  class="btn btn-small"><?php _e('Read more', 'bd'); ?></a></div><!-- .post-readmore/-->
                            </div>
                        </article>
                    <?php
                    endwhile;
                    bd_pagenavi($pages = '', $range = 2);
                else :
                    ?>
                    <br class="clear" />
                    <article class="post-entry bottom40">
                        <div class="oops">oops!</div>
                        <div class="text-aligncenter oops-meta">
                            <?php _e('Sorry, but you are looking for something that isn\'t here, back to', 'bd'); ?>
                            <a href="index.php"><?php _e('Homepage','bd') ?></a>
                        </div>
                    </article>
                <?php
                endif;


            ?>
            <br class="clear" />
            <ul class="sitemap_content">
                <li class="bottom40">
                    <div class="box-title bottom20"><h2><b><?php _e('Pages','bd'); ?></b></h2></div>
                    <ul class="bd_line_list">
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </li>

                <li class="bottom40">
                    <div class="box-title bottom20"><h2><b><?php _e('Categories','bd'); ?></b></h2></div>
                    <ul class="bd_line_list">
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </li>

                <li class="bottom40">
                    <div class="box-title bottom20"><h2><b><?php _e('Tags','bd'); ?></b></h2></div>
                    <ul class="bd_line_list">
                        <?php $tags = get_tags();
                        if ($tags)
                        {
                            foreach ($tags as $tag)
                            {
                                echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
                            }
                        }
                        ?>
                    </ul>
                </li>

                <li class="bottom40">
                    <div class="box-title bottom20"><h2><b><?php _e('Authors','bd'); ?></b></h2></div>
                    <ul class="bd_line_list" >
                        <?php wp_list_authors('optioncount=1&exclude_admin=0'); ?>
                    </ul>
                </li>

            </ul>
            <div class="clear"></div>
        </div>
    </div><!-- .content-wrapper/-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>