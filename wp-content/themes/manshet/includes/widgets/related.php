<?php
add_action( 'widgets_init', 'bd_related' );
function bd_related() {
    register_widget( 'bd_related' );
}
class bd_related extends WP_Widget {
function bd_related() {
    $widget_ops = array('classname' => 'bd-related', 'description' => '');
    $control_ops = array('id_base' => 'bd-related');
    $this->WP_Widget('bd-related', theme_name . ' - Related Posts', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    if ( is_single() ) :
    $title = apply_filters('widget_title', $instance['title'] );
    $number = $instance['number'];

    echo $before_widget;
    if($title) {
        echo $before_title.$title.$after_title;
    }
?>
<?php
    global $post;
    $cats = get_the_category($post->ID);
    if ($cats) :
        $cat_ids = array();
        foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat->cat_ID;}
        $args=array(
            'category__in' => $cat_ids,
            'post__not_in' => array($post->ID),
            'showposts'=> $number,
            'ignore_sticky_posts'=>1
        );

        query_posts($args);

    ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="post-warpper">
            <?php
            /**
             *  Post Image
             */
            $img_w      = 52;
            $img_h      = 50;
            $thumb      = bd_post_image('full');
            $image      = aq_resize( $thumb, $img_w, $img_h, true );
            $alt        = get_the_title();
            $link       = get_permalink();

            if (strpos(bd_post_image(), 'youtube'))
            {
                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
            }
            elseif (strpos(bd_post_image(), 'vimeo'))
            {
                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
            }
            elseif (strpos(bd_post_image(), 'dailymotion'))
            {
                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
            }
            else
            {
                if($image) :
                    echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. $image .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
                endif;
            }
            ?>
            <div class="post-caption">
                <h3 class="post-title">
                    <a href="<?php the_permalink()?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h3><!-- .post-title/-->
                <div class="post-meta">
                    <span class="meta-date"><i class="icon-time"></i><?php global $bd_data; the_time("j F Y"); ?></span>
                </div><!-- .post-meta/-->
            </div><!-- .post-caption/-->
        </div>
        <?php endwhile; endif; ?>
    <?php
    wp_reset_query();
?>
<?php
    echo $after_widget;
    endif;
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['number'] = strip_tags( $new_instance['number'] );
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Related Posts' , 'bd'), 'number' => '5');
    $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:' , 'bd'); ?></label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width: 216px" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:' , 'bd'); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
    </p>

<?php
}

}
