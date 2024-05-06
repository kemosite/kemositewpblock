<?php

/**
 * Get the add to cart template for the loop.
 *
 * @param array $args Arguments.
 */

function kemosite_wordpress_woocommerce_template_loop_add_to_cart( $args = array() ) {

    global $product;

    if ( $product ) {
        
        /*
        $test_object = json_encode($product);
        echo "<script>console.log(".$test_object.");</script>";
        */
        

        $defaults = array(
            'quantity'   => 1,
            'class'      => implode( ' ', array_filter( array(
                'button',
                'product_type_' . $product->get_type(),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
            ) ) ),
            'attributes' => array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ),
        );

        $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

        /*
        $test_object = json_encode($args);
        echo "<script>console.log(".$test_object.");</script>";
        */

        if ( isset( $args['attributes']['aria-label'] ) ) {
            $args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
        }

        wc_get_template( 'loop/add-to-cart.php', $args );
        
    }
}

?>