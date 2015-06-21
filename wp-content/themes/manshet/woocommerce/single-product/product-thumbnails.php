<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
    ?>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            <!-- items mirrored twice, total of 12 -->
            <?php
            if ( has_post_thumbnail() ) {

                $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'full' ) );
                $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
                $attachment_count   = count( $product->get_gallery_attachment_ids() );
                $bd_img              = aq_resize($image_link, 56, 56, true);
                if ( $attachment_count > 0 ) {
                    $gallery = '[product-gallery]';
                } else {
                    $gallery = '';
                }

                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="image-'.get_post_thumbnail_id().'" title="%s"><img src="'.$bd_img.'" alt="" border="0"> </a></li>', $image_link, $image_title, $image ), $post->ID );

            }
            ?>
            <?php

            $loop = 0;
            //$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

            foreach ( $attachment_ids as $attachment_id ) {

                $image_link = wp_get_attachment_url( $attachment_id );

                if ( ! $image_link )
                    continue;

                $classes[] = 'image-'.$attachment_id;

                $attachment_url     = wp_get_attachment_url($attachment_id , 'full');
                $bd_img              = aq_resize($attachment_url, 56, 56, true);

                $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ) );
                $image_class = esc_attr( implode( ' ', $classes ) );
                $image_title = esc_attr( get_the_title( $attachment_id ) );

                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><a href="%s" class="%s" title="%s"><img src="'.$bd_img.'" alt="" border="0"> </a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

                $loop++;
            }

            ?>		</ul>
    </div>
<?php
}