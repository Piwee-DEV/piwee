<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

    <!-- Place somewhere in the <body> of your page -->
    <div id="woo-slider" class="flexslider">
        <ul class="slides">
            <?php
            if ( has_post_thumbnail() ) {

                $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'full' ) );
                $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
                $attachment_count   = count( $product->get_gallery_attachment_ids() );
                $attachment_count   = count( $product->get_gallery_attachment_ids() );

                if ( $attachment_count > 0 ) {
                    $gallery = '[product-gallery]';
                } else {
                    $gallery = '';
                }

                $bd_img              = aq_resize($image_link, 300, 300, true);

                $gallery = 'woo';

                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '"> <img src="'.$bd_img.'" alt="" border="0"> </a></li>', $image_link, $image_title, $image ), $post->ID );

            }
            $attachment_ids = $product->get_gallery_attachment_ids();
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
                $bd_img              = aq_resize($attachment_url, 300, 300, true);

                $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'full' ) );
                $image_class = esc_attr( implode( ' ', $classes ) );
                $image_title = esc_attr( get_the_title( $attachment_id ) );
                $attachment_count   = count( $product->get_gallery_attachment_ids() );

                if ( $attachment_count > 0 ) {
                    $gallery = '[product-gallery]';
                } else {
                    $gallery = '';
                }

                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '"> <img src="'.$bd_img.'" alt="" border="0"> </a></li>', $image_link, $image_title, $image ), $post->ID );

                $loop++;
            }

            ?>
        </ul>
    </div>
    <?php
    if ( has_post_thumbnail() ) {

        $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'full' ) );
        $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
        $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
        $attachment_count   = count( $product->get_gallery_attachment_ids() );

        if ( $attachment_count > 0 ) {
            $gallery = '[product-gallery]';
        } else {
            $gallery = '';
        }

        //echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

    }
    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( has_post_thumbnail() ) {
    }
    ?>

    <?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
