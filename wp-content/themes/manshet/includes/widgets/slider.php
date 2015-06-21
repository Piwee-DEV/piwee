<?php
add_action( 'widgets_init', 'bd_slider' );
function bd_slider() {
    register_widget( 'bd_slider' );
}
class bd_slider extends WP_Widget {
function bd_slider() {
    $widget_ops = array('classname' => 'bd-slider', 'description' => '');
    $control_ops = array('id_base' => 'bd-slider');
    $this->WP_Widget('bd-slider', theme_name . ' - Slider', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    $number = $instance['number'];
    $categories = $instance['categories'];

?>
<div class="widget flexslider widgetslider" id="<?php echo $args['widget_id']; ?>">
<ul class="slides">
<?php global $post; $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => $number )); while($recent->have_posts()) : $recent->the_post(); ?>
<li>
    <?php

        $img_w      = 300;
        $img_h      = 215;
        $thumb      = bd_post_image('full');
        $image      = aq_resize( $thumb, $img_w, $img_h, true );
        if($image =='')
        {
            $image = BD_IMG .'default-300-215.png';
        }
        $alt        = get_the_title();
        $link       = get_permalink();

        if (strpos(bd_post_image(), 'youtube'))
        {
            echo '<div><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
        }
        elseif (strpos(bd_post_image(), 'vimeo'))
        {
            echo '<div><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
        }
        elseif (strpos(bd_post_image(), 'dailymotion'))
        {
            echo '<div><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. bd_post_image('full') .') no-repeat scroll 50% 50%; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
        }
        else
        {
            if($image) :
                echo '<div><a href="'. $link .'" title="'. $alt .'" class="" style="width: '. $img_w .'px; height: '. $img_h .'px; background: url('. $image .') no-repeat scroll center center; display:inline-block;"></a></div><!-- .post-image/-->' ."\n";
            endif;
        }

    ?>
    <div class="slider-caption">
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
    </div>
</li>
<?php endwhile; ?>
</ul>
</div>
<script>
jQuery(window).load(function()
{
    jQuery('#<?php echo $args['widget_id']; ?>').flexslider({
        animation: "fade",
        easing: "swing",
        direction: "horizontal",
        keyboard: false,
        slideshowSpeed: 7000,
        animationSpeed: 600,
        randomize: false,
        pauseOnHover: true,
        controlNav: false,
        directionNav: true,
        prevText: '<i class="icon-chevron-left"></i>',
        nextText: '<i class="icon-chevron-right"></i>'
    });
});
</script>
<?php
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['number'] = strip_tags( $new_instance['number'] );
    $instance['categories'] = $new_instance['categories'];
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Category Posts' , 'bd'), 'number' => '5' , 'categories' => '1');
    $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:' , 'bd'); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Select Category:' , 'bd'); ?></label>
        <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">
        <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php _e('All Categories' , 'bd'); ?></option>
            <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
            <?php foreach($categories as $category) { ?>
            <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
            <?php } ?>
        </select>
    </p>
<?php
}

}