<?php

/**
 * [kemosite_woocommerce_subcategory_thumbnail]
 */

function kemosite_woocommerce_subcategory_thumbnail( $category ) {
    
    $small_thumbnail_size   = apply_filters( 'subcategory_archive_thumbnail_size', 'shop_catalog' );
    $dimensions             = wc_get_image_size( $small_thumbnail_size );
    $thumbnail_id           = get_term_meta( $category->term_id, 'thumbnail_id', true  );

    // echo "<script>console.log('kemosite_woocommerce_subcategory_thumbnail');</script>";

    if ( isset($thumbnail_id) ):
        if ( $image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  ) ): $image = $image[0]; endif;
        $srcset = wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size );
    
    elseif ( null !== get_post_meta($post->ID, 'amazon_product_image_large_src') ):
        if ( $image = get_post_meta($post->ID, 'amazon_product_image_large_src') ) : $image = $image[0]; endif;
        $dimensions['width'] = get_option('thumbnail_size_w');
        $dimensions['height'] = get_option('thumbnail_size_h');
        $dimensions['crop'] = get_option('thumbnail_crop');

    else:
        $image = wc_placeholder_img_src();

    endif;

    if ( $image ) {
        // Prevent esc_url from breaking spaces in urls for image embeds
        // Ref: https://core.trac.wordpress.org/ticket/23605
        // $image = str_replace( ' ', '%20', $image );

        // echo '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';

        echo '<div class="cropped image" style="width: 100%; max-width: ' . esc_attr( $dimensions['width'] ) . 'px; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img srcset="' . esc_attr( $srcset ) . '" src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';

    }
}

?>