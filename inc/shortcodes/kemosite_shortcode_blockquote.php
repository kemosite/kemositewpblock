<?php

/**
 * [BLOCKQUOTE SHORTCODE]
 */

function kemosite_shortcode_blockquote( $attributes, $content ) {

    $output = ""; 
    $output .= '<blockquote>' . do_shortcode($content) . '</blockquote>' . "\n";
    return $output;
}
add_shortcode( 'blockquote', 'kemosite_shortcode_blockquote' );

?>