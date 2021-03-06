<?php 
require_once('ppss_admin_page.php');

function ppss_social_share_init() {
	if (is_admin()) {
		return;
	}
	$option = ppss_social_share_get_options_stored();
	
	if (is_mobile_device() && ($option['mobdev']==true)){
		return;
	} 

	if ($option['active_buttons']['twitter']==true) {
		wp_enqueue_script('ppss_social_share_twitter', 'http'.(is_ssl()?'s':'').'://platform.twitter.com/widgets.js','','',$option['jsload']);
	}
	
	if ($option['active_buttons']['Google_plusone']==true) {
		wp_enqueue_script('ppss_social_share_google', 'http'.(is_ssl()?'s':'').'://apis.google.com/js/plusone.js','','',$option['jsload']);
	}
	if ($option['active_buttons']['linkedin']==true) {
		wp_enqueue_script('ppss_social_share_linkedin', 'http'.(is_ssl()?'s':'').'://platform.linkedin.com/in.js','','',$option['jsload']);
	}
	if ($option['active_buttons']['pinterest']==true) {
		wp_enqueue_script('ppss_social_share_pinterest', 'http'.(is_ssl()?'s':'').'://assets.pinterest.com/js/pinit.js','','',$option['jsload']);
	}

	wp_enqueue_style('ppss_style', '/wp-content/plugins/pagepost-specific-social-share-buttons/ppss_style.css');
}    

function ppss_twitter_facebook_contents($content)
{
	return ppss_twitter_facebook($content,'content');
}

function ppss_twitter_facebook_excerpt($content)
{
	return ppss_twitter_facebook($content,'excerpt');
}

function ppss_twitter_facebook($content, $filter)
{
  global $single;
  static $last_execution = '';

  if ($filter=='the_excerpt' and $last_execution=='the_content') {
		remove_filter('the_content', 'ppss_twitter_facebook_contents');
		$last_execution = 'the_excerpt';
		return the_excerpt();
	}
if ($filter=='the_excerpt' and $last_execution=='the_excerpt') {
	add_filter('the_content', 'ppss_twitter_facebook_contents');
}
  
  $option = ppss_social_share_get_options_stored();
  $custom_disable = get_post_custom_values('disable_social_share');
  
  if (is_mobile_device() && ($option['mobdev']==true)){
		return $content;
	} 
  if (is_single() && ($option['show_in']['posts']) && ($custom_disable[0] != 'yes')) {
	    $output = ppss_social_share('auto');
		$last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    } 
	if (is_home() && ($option['show_in']['home_page'])){
        $output = ppss_social_share('auto');
		$last_execution = $filter;
		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
	}
	if (is_page() && ($option['show_in']['pages']) && ($custom_disable[0] != 'yes')) {
		  $output = ppss_social_share('auto');
		  $last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    }  
	if (is_category() && ($option['show_in']['categories'])) {
		  $output = ppss_social_share('auto');
		  $last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    } 
	if (is_tag() && ($option['show_in']['tags'])) {
		  $output = ppss_social_share('auto');
		  $last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    } 
	if (is_author() && ($option['show_in']['authors'])) {
		  $output = ppss_social_share('auto');
		  $last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    } 
	if (is_search() && ($option['show_in']['search'])) {
		  $output = ppss_social_share('auto');
		  $last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    } 
	if (is_date() && ($option['show_in']['date_arch'])) {
		  $output = ppss_social_share('auto');
		  $last_execution = $filter;
  		if ($option['position'] == 'above')
        	return  $output . $content;
		if ($option['position'] == 'below')
			return  $content . $output;
		if ($option['position'] == 'left')
			return  $output . $content;
		if ($option['position'] == 'both')
			return  $output . $content . $output;
    }
	
	return $content;
}

function ppss_social_share($source)
{
	global $posts;
	//GET ARRAY OF STORED VALUES
	$option = ppss_social_share_get_options_stored();
	if (empty($option['bkcolor_value']))
		$option['bkcolor_value'] = '#F0F4F9';
	$border ='';
 	if ($option['border'] == 'flat') 
		$border = 'border:1px solid #808080;';
	else if ($option['border'] == 'round')
	    $border = 'border:1px solid #808080; border-radius:5px 5px 5px 5px; box-shadow:2px 2px 5px rgba(0,0,0,0.3);';
		
	if ($option['bkcolor'] == true)
		$bkcolor = 'background-color:' . $option['bkcolor_value']. ';'; 
	else
		$bkcolor = '';

 	$post_link = get_permalink();
	$post_title = get_the_title();
	if ($option['position'] == 'left' && ( !is_single() && !is_page()))
		if (($source != 'manual') || ($source != 'shortcode')) 
			$option['position'] = 'above';

	if ($option['position'] == 'left'){
		$output = '<div id="leftcontainerBox" style="' .$border. $bkcolor. 'position:' .$option['float_position']. '; top:' .$option['bottom_space']. '; left:' .$option['left_space']. ';">';
		if ($option['active_buttons']['facebook_like']==true) {
		$output .= '
			<div class="buttons">
			<iframe src="http'.(is_ssl()?'s':'').'://www.facebook.com/plugins/like.php?href=' . urlencode($post_link) . '&amp;layout=box_count&amp;show_faces=false&amp;action=like&amp;font=verdana&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:50px; height:65px;"></iframe>
			</div>';
		}
		
		if ($option['active_buttons']['twitter']==true) {
		if ($option['twitter_id'] != ''){
		$output .= '
			<div class="buttons">
			<a href="http'.(is_ssl()?'s':'').'://twitter.com/share" class="twitter-share-button" data-url="'. $post_link .'"  data-text="'. $post_title . '" data-count="vertical" data-via="'. $option['twitter_id'] . '"></a>
			</div>';
		} else {
		$output .= '
			<div class="buttons">
			<a href="http'.(is_ssl()?'s':'').'://twitter.com/share" class="twitter-share-button" data-url="'. $post_link .'"  data-text="'. $post_title . '" data-count="vertical"></a>
			</div>';
		}
		}
		
		if ($option['active_buttons']['Google_plusone']==true) {
		$output .= '
			<div class="buttons">
			<g:plusone size="tall" href="'. $post_link .'"></g:plusone>
			</div>';
		}
		if ($option['active_buttons']['linkedin']==true) {
		$output .= '<div class="buttons" style="padding-left:0px;"><script type="in/share" data-url="' . $post_link . '" data-counter="top"></script></div>';
		}
		if ($option['active_buttons']['stumbleupon']==true) {
		$output .= '
			<div class="buttons"><script src="http'.(is_ssl()?'s':'').'://www.stumbleupon.com/hostedbadge.php?s=5&amp;r='.$post_link.'"></script></div>';
		}
		if ($option['active_buttons']['pinterest']==true) {
		$post_image = tf_get_image(array('post_id' => $post->ID));
		$output .= '<div class="buttons" style="padding-left:5px;">
		<a href="http'.(is_ssl()?'s':'').'://pinterest.com/pin/create/button/?url=' .  $post_link . '&media=' . $post_image . '" class="pin-it-button" count-layout="vertical"></a></div>';
		}
		$output .= '</div><div style="clear:both"></div>';
		return $output;
	}

	global $post;
	$ppss_displayer = get_post_meta($post->ID, 'ab_checkbox', true);
	
	$enabler = $option['enabler'];

if($enabler) { // global enable check
	
	if(!$ppss_displayer) {
		
	if (($option['position'] == 'below') || ($option['position'] == 'above') || ($option['position'] == 'both'))
	{

		$output = '<div class="bottomcontainerBox header-article">';

		if (function_exists("social_shares_span_single")) {
			$shareCounts = social_shares_span_single();
		}
		else {
			$shareCounts = '';
		}

		$output .= $shareCounts;

		if ($option['active_buttons']['pinterest']==true) {
		$post_image = tf_get_image();
		$counter = ($option['pinterest_count']) ? 'horizontal' : 'none';
		$output .= '<div class="share-single-pinterest" style="margin-top:5px;float:right; height:21px;padding-right:30px;"><a href="http'.(is_ssl()?'s':'').'://pinterest.com/pin/create/button/?url=' . $post_link . '&media=' . $post_image . '" class="pin-it-button" count-layout="' .$counter.'"></a></div>';
		}
		if ($option['active_buttons']['linkedin']==true) {
		$counter = ($option['linkedin_count']) ? 'right' : '';
		$output .= '<div class="share-single-linkedin" style="margin-top:5px;float:right; height:21px;"><script type="in/share" data-url="' . $post_link . '" data-counter="' .$counter. '"></script></div>';
		}
		if ($option['active_buttons']['stumbleupon']==true) {
		$output .= '			
			<div style="margin-top:5px;float:left; height:21px;width:70px;"><script src="http'.(is_ssl()?'s':'').'://www.stumbleupon.com/hostedbadge.php?s=1&amp;r='.$post_link.'"></script></div>';
		}
		if ($option['active_buttons']['Google_plusone']==true) {
		$data_count = ($option['google_count']) ? '' : 'count="false"';
		$output .= '
			<div class="share-single-gplus" style="margin-top:5px;float:right; height:21px;width:70px;">
			<g:plusone size="medium" href="' . $post_link . '"'.$data_count.'></g:plusone>
			</div>';
		}
		if ($option['active_buttons']['twitter']==true) {
		$data_count = ($option['twitter_count']) ? 'horizontal' : 'none';
		if ($option['twitter_id'] != ''){
		$output .= '
			<div class="share-single-twitter" style="margin-top:5px;float:right; height:21px;width:105px;">
			<a href="http'.(is_ssl()?'s':'').'://twitter.com/share" class="twitter-share-button" data-url="'. $post_link .'"  data-text="'. $post_title . '" data-count="'.$data_count.'" data-via="'. $option['twitter_id'] . '"></a>
			</div>';
		} else {
		$output .= '
			<div class="share-single-twitter" style="margin-top:5px;float:right; height:21px;width:105px;">
			<a href="http'.(is_ssl()?'s':'').'://twitter.com/share" class="twitter-share-button" data-url="'. $post_link .'"  data-text="'. $post_title . '" data-count="'.$data_count.'"></a>
			</div>';
		}
		}
		if ($option['active_buttons']['facebook_like']==true) {
		$output .= '
			<div class="share-single-facebook" style="margin-top:5px;float:right; height:21px;padding-right:10px;width:105px;">
			<iframe src="http'.(is_ssl()?'s':'').'://www.facebook.com/plugins/like.php?href=' . urlencode($post_link) . '&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:105px; height:21px;"></iframe></div>';
		}
		
		if ($option['custom_code']==true) {
		$output .= '<div style="float:left;padding-right:10px;">';
		
		$output .= $option['custom_code'];
		
		$output .='</div>';
		}

		$output .= '			
			</div><div style="clear:both"></div><div style="padding-bottom:4px;"></div>';
			
		return $output;

	}
	
	}
} 

}

function ppss_fb_like_thumbnails()
{

$thumb = tf_get_image();
if(!empty($thumb))
{
 echo "\n\n<!-- Facebook Like Thumbnail -->\n<link rel=\"image_src\" href=\"$thumb\" />\n<!-- End Facebook Like Thumbnail -->\n\n";
}

}

function tf_get_image($args = array() ) 
{
 global $post;
 
 $defaults = array('post_id' => $post->ID);
 $args = wp_parse_args( $args, $defaults );
 $final_img = get_image_from_post_thumbnail($args);

 if(!$final_img)
 $final_img = get_image_from_attachments($args);
 
 if(!$final_img)
 $final_img = get_image_in_post_content($args);
 
 $final_img = str_replace($url, '', $final_img);
 return $final_img;
}

function get_image_in_post_content($args = array() )
{
 $display_img = '';
 $url = get_bloginfo('url');
 ob_start();
 ob_end_clean();
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_field( 'post_content', $args['post_id'] ), $matches);
 $display_img = $matches [1] [0];
 return $display_img;
}

function get_image_from_post_thumbnail($args = array())
{
	if (function_exists('has_post_thumbnail')) {
		if (has_post_thumbnail( $args['post_id']))
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $args['post_id'] ), 'single-post-thumbnail' );
	}
 	return $image[0];

}

function get_image_from_attachments($args = array())
{
	if (function_exists('wp_get_attachment_image')) {
	$children = get_children(
	array(
	'post_parent'=> $args['post_id'],
	'post_type'=> 'attachment',
	'numberposts'=> 1,
	'post_status'=> 'inherit',
	'post_mime_type' => 'image',
	'order'=> 'ASC',
	'orderby'=> 'menu_order ASC'
	)
	);

	if ( empty( $children ))
		return false;

	$image = wp_get_attachment_image_src( $children[0], 'thumbnail');
	return $image;
	}
}
function is_mobile_device()
{
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'iPhone') ) 
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'iPad') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'iPod') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'Nokia') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'Opera Mini') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'Opera Mobi') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'SonyEricsson') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'BlackBerry') )
		return true;
if (strpos( $_SERVER['HTTP_USER_AGENT'] , 'Mobile Safari') )
		return true;
return false;
}
?>