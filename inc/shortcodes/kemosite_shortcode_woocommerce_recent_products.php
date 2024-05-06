<?php

/**
 * [WOOCOMMERCE RECENT PRODUCTS]
 */

function kemosite_shortcode_woocommerce_recent_products( $attributes, $content ) {

    $limit = (int) $attributes['limit'];

    $args = array(
        'limit' => $limit,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $shortcode = new WC_Shortcode_Products( $args );

    return $shortcode->get_content();

}
add_shortcode('recent_products', 'kemosite_shortcode_woocommerce_recent_products');

?>