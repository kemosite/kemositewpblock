<?php

/**
 * [Overwrite WooCommerce Functions, As Necessary]]
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// [ENABLE WOOCOMMERCE GUTENBERG PRODUCTS]
if ( !function_exists( 'kemosite_wplook_activate_gutenberg_products' ) ):
    require_once "use_block_editor_for_post_type/kemosite_wplook_activate_gutenberg_products.php";
endif;
add_filter( 'use_block_editor_for_post_type', 'kemosite_wplook_activate_gutenberg_products', 10, 2 );

if ( !function_exists( 'kemosite_woocommerce_custom_product_add_to_cart_text' ) ):
    require_once "woocommerce_product_add_to_cart_text/kemosite_woocommerce_custom_product_add_to_cart_text.php";
endif;
add_filter( 'woocommerce_product_add_to_cart_text', 'kemosite_woocommerce_custom_product_add_to_cart_text' );  // 2.1 +
add_filter( 'woocommerce_product_single_add_to_cart_text', 'kemosite_woocommerce_custom_product_add_to_cart_text' );


if ( ! function_exists( 'kemosite_wordpress_woocommerce_template_loop_add_to_cart' ) ):
    require_once "woocommerce_before_shop_loop_item_title/kemosite_wordpress_woocommerce_template_loop_add_to_cart.php";
endif;
add_action( 'woocommerce_before_shop_loop_item_title', 'kemosite_wordpress_woocommerce_template_loop_add_to_cart', 10 );

// CUSTOM WOOCOMMERCE ADJUSTMENTS]
if ( !function_exists( 'kemositeWoocommerceSubcategoryThumbnail' ) ):
    require_once "woocommerce_before_subcategory_title/kemositeWoocommerceSubcategoryThumbnail.php";
endif;
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
add_action( 'woocommerce_before_subcategory_title', 'kemositeWoocommerceSubcategoryThumbnail', 10 );

// Show the subcategory title in the product loop.
if ( !function_exists( 'kemosite_woocommerce_template_loop_category_title' ) ):
    require_once "kemosite_woocommerce_template_loop_category_title.php";
endif;

// Get the product thumbnail, or the placeholder if not set.
if ( !function_exists( 'kemosite_woocommerce_get_product_thumbnail' ) ):
    require_once "kemosite_woocommerce_get_product_thumbnail.php";
endif;

// Get the add to cart template for the loop
if ( !function_exists( 'kemosite_woocommerce_template_loop_add_to_cart' ) ):
    require_once "kemosite_woocommerce_template_loop_add_to_cart.php";
endif;

// Get HTML for a gallery image
if ( !function_exists( 'kemosite_woocommerce_get_gallery_image_html' ) ):

endif;

/**
 * [END WOOCOMMERCE ADJUSTMENTS]
 */
