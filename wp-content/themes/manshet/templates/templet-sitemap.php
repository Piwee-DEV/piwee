<?php
//Template Name: Sitemap
get_header();
global $bd_data;
?>

    <div class="content-wrapper">
        <div class="inner">
            <?php bd_breadcrumb(); ?>

            <?php echo bd_post_above_ads() ?>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
                    <div class="post-entry bottom40">

                    <?php
                        the_content();
                            ?>
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
                            <?php
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