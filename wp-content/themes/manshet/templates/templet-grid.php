<?php
    //Template Name: Blog Gird
    get_header(); global $bd_data; global $post; query_posts(array( 'paged' => get_query_var( 'paged' )));
?>
<div class="inner-grid">
<?php
    echo "<div class='article-grid'>\n";
        get_template_part('loop-grid');
        bd_pagenavi($pages = '', $range = 2);
    echo "\n<div class='clear'></div></div>\n";
?>
</div>
<?php get_footer(); ?>