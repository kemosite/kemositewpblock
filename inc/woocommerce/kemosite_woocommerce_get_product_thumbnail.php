<?php

/**
 * [Get the product thumbnail, or the placeholder if not set.]
 *
 * @subpackage  Loop
 * @param string $size (default: 'shop_catalog')
 * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
 * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
 * @return string
 */

function kemosite_woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
    
    global $post;        

    if ( has_post_thumbnail($post->ID) ) {

        $props                  = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
        $image_size             = apply_filters( 'single_product_archive_thumbnail_size', $size );
        $small_thumbnail_size   = apply_filters( 'subcategory_archive_thumbnail_size', $image_size );
        $dimensions             = wc_get_image_size( $small_thumbnail_size );
        $thumbnail_id           = get_post_thumbnail_id();
    }

    if ( isset($thumbnail_id) ):
        $image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
        $image = $image[0];
        $srcset = wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size );
    
    elseif ( null !== get_post_meta($post->ID, 'amazon_product_image_large_src') ):
        $image = get_post_meta($post->ID, 'amazon_product_image_large_src');
        $image = $image[0];
        $dimensions['width'] = get_option('thumbnail_size_w');
        $dimensions['height'] = get_option('thumbnail_size_h');
        $dimensions['crop'] = get_option('thumbnail_crop');
        $props['alt'] = "Image thumbnail for " . $post->post_title;

    else:
        $image = wc_placeholder_img_src();

    endif;

    if ( isset($image) ) {

        if ( isset($srcset) ): $srcset_output = 'srcset="' . esc_attr( $srcset ) . '"'; else: $srcset_output = ''; endif;
        if ( isset($props) ): $props_output = 'alt="' . esc_attr( $props['alt'] ) . '"'; else: $props_output = ''; endif;

        // Prevent esc_url from breaking spaces in urls for image embeds
        // Ref: https://core.trac.wordpress.org/ticket/23605
        // $image = str_replace( ' ', '%20', $image );

        // return '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $props['alt'] ) . '"></div>';

        return '<div class="cropped image" style="width: 100%; max-width: ' . esc_attr( $dimensions['width'] ) . 'px; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img ' . $srcset_output . ' src="' . esc_url( $image ) . '" '. $props_output . '></div>';

    }
}