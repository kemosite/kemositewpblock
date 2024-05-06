<?php

/**
 * [DROPCAPS SHORTCODE]
 */

function kemosite_shortcode_dropcaps($attributes, $content) {

    $output = "";
    $output .= '<span class="dropcap">'.$content.'</span>' . "\n";
    return $output;

}
add_shortcode('dropcaps', 'kemosite_shortcode_dropcaps');

?>