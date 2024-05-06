<?php

/**
 * [Remove Paragraph Tags from Shortcodes]
 */

function kemosite_shortcode_wpautop_fix($content) {   
    $wpautop_elements = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $wpautop_elements);

    return $content;
}
add_filter('the_content', 'kemosite_shortcode_wpautop_fix');

?>