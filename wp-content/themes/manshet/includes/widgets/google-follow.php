<?php
add_action( 'widgets_init', 'bd_google_follow' );
function bd_google_follow() {
    register_widget( 'bd_google_follow' );
}
class bd_google_follow extends WP_Widget {
function bd_google_follow() {
    $widget_ops = array('classname' => 'bd-google-follow', 'description' => '');
    $control_ops = array('id_base' => 'bd-google-follow');
    $this->WP_Widget('bd-google-follow', theme_name . ' - Google Follow', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    $page_url = $instance['page_url'];
    echo $before_widget;
    if($title) {
        echo $before_title.$title.$after_title;
    }
?>
<div class="bd-google-follow">
<!-- Google +1 script -->
<script type="text/javascript">
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<!-- Link blog to Google+ page -->
<a  href="<?php echo $page_url ?>" rel="publisher"></a>
<!-- Google +1 Page badge -->
<g:plus href="<?php echo $page_url ?>" height="131" width="300px" theme="light"></g:plus>
</div>
<?php
    echo $after_widget;
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['page_url'] = strip_tags( $new_instance['page_url'] );
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Follow Us On Google+' , 'bd') );
    $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ','bd') ?></label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if(isset($instance['title'])){ echo $instance['title']; } ?>" class="widefat" type="text" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e('Google+ url','bd')?> : </label>
        <input type="text" id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" class="widefat" value="<?php if(isset($instance['page_url'])){ echo $instance['page_url']; } ?>" />
        <small><?php _e('example','bd') ?>: <em>https://plus.google.com/+psdtuts</em></small>
    </p>
<?php
}

}

