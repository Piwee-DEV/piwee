<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $bd_data, $post;

$template = get_option('template');

$custom_fields = get_post_custom_values('_wp_page_template', $pageID);
if(is_array($custom_fields) && !empty($custom_fields)) {
	$page_template = $custom_fields[0];
} else {
	$page_template = '';
}

switch( $template ) {
	case 'twentyeleven' :
		echo '<div id="primary"><div id="content" role="main">';
		break;
	case 'twentytwelve' :
		echo '<div id="primary" class="site-content"><div id="content" role="main">';
		break;
	case 'twentythirteen' :
		echo '<div id="primary" class="site-content"><div id="content" role="main" class="entry-content twentythirteen">';
		break;
	case 'bd' :
		echo '<div class="woocommerce-container"><div id="content">';
		break;
	default :
		echo '<div class="woocommerce-container"><div id="content" class="content-wrapper">';
		break;
}
