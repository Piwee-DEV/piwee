<?php
//Template Name: Blog Featured Image
get_header();
global $bd_data;
query_posts(array( 'paged' => get_query_var( 'paged' )));
?>

    <div class="content-wrapper">
        <div class="inner">
            <div class="box-title bottom40"><h2><b><?php the_title();?></b></h2></div>

            <?php
                echo "<div class='home-blog home-small'>\n";
                get_template_part('loop-normal');
                bd_pagenavi($pages = '', $range = 2);
                echo "\n</div>\n";
            ?>

            <?php comments_template( '', true ); ?>
        </div>
    </div>

<?php get_sidebar(); get_footer(); ?>