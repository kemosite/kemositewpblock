<?php

/**
 * [ACCORDIAN SHORTCODES]
 */

// Accordian
function kemosite_shortcode_accordian($attributes, $content) {

    $output = "";
    $output .= '<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</ul>' . "\n";
    return $output;

}
add_shortcode('accordion', 'kemosite_shortcode_accordian');

// Accordion Item and Full Width
function kemosite_shortcode_accordion_item( $attributes, $content ) {
    
    if ($attributes !== NULL):

        $output = "";
        $output .= '<li class="accordian-item" data-accordion-item>' . "\n";
        
        if ( array_key_exists('title', $attributes) && $attributes['title'] !== NULL ): $output .= '<a href="#" class="accordion-title">'.$attributes['title'].'</a>' . "\n"; endif;
        if ($attributes['caption'] !== NULL): $output .= '<a href="#" class="accordion-title">'.$attributes['caption'].'</a>' . "\n"; endif;

        $output .= '<div class="accordion-content" data-tab-content>' . "\n";
        
        $output .= do_shortcode($content) . "\n";

        $output .= '</div>' . "\n";
        $output .= '</li>' . "\n";

    endif;

    return $output;

}
add_shortcode('accordion_item', 'kemosite_shortcode_accordion_item');
add_shortcode('accordion_full_width', 'kemosite_shortcode_accordion_item');

?>