<?php

/**
 * [kemosite_woocommerce_custom_product_add_to_cart_text]
 */

function kemosite_woocommerce_custom_product_add_to_cart_text( $default_button_text ) {
      
   global $product;

   if ($product && $product->get_type() === 'external'):

        if ($product->get_button_text()):
            return __( $product->get_button_text(), 'woocommerce' );
        elseif ($product->get_type() === 'external'):
            return __( $default_button_text, 'woocommerce' );
        else:
            return __( 'Buy on Amazon', 'woocommerce' );
        endif;

    else:        

        /*
        $test_object = json_encode($default_button_text);
        echo "<script>console.log(".$test_object.");</script>";
        */

        return __( $default_button_text, 'woocommerce' );

    endif;
 
}

?>