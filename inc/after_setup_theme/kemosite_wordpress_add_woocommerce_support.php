<?php

/**
 * [Declare WooCommerce Support]
 */

function kemosite_wordpress_add_woocommerce_support() {

    add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 256,
		'single_image_width'    => 512,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 6,
        ),
	) );

    
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    
}
