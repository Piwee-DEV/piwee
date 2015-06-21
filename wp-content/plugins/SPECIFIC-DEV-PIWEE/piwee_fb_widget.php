<?php  

// Creating the widget 
class campain_fb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'piwee_fb_widget', 

		// Widget name will appear in UI
		__('Piwee Facebook Widget', 'campain_fb_widget'), 

		// Widget description
		array( 'description' => __( 'Provide a facebook widget especially for PIWEE', 'campain_fb_widget' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output

	    $fullsite_campain_fb_widget_code = get_option("campain_fb_widget_code"); //fullsite code
		$campain_fb_widget_code = get_post_meta(get_the_ID(), "campain_fb_widget_code", true);

		?>

		<?php if(!is_home() && is_single(get_the_ID()) && strlen($campain_fb_widget_code) > 0): ?>

			<?php

				echo stripslashes($campain_fb_widget_code);

			?>

		<?php elseif(!is_home() && strlen($fullsite_campain_fb_widget_code) > 0): ?>

			<?php

				echo stripslashes($fullsite_campain_fb_widget_code);

			?>

		<?php else: ?>

			<div class="fb-like-box" data-href="https://www.facebook.com/piwee.net" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>

			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1411359452474265&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<?php endif ?>

		<?php

		echo $args['after_widget'];
	}
	        
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'campain_fb_widget' );
		}
		// Widget admin form
		?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
		<?php 
	}
	    
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}

// Register and load the widget
function load_fb_widget() {
    register_widget( 'campain_fb_widget' );
}

add_action( 'widgets_init', 'load_fb_widget' );


?>