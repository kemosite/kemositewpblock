<?php

/**
 * [LISTS]
 */

function kemosite_shortcode_list( $attributes, $content ) {

    if (@$attributes['list_id'] && @$attributes['list_id'] !== null): @$list_id = $attributes['list_id']; endif;
    @$columns = ($attributes['columns'] > 1) ? $attributes['columns'] : 1;

    $output = "";

    $output .= '<style>';
    $output .= '#list_'.$list_id.' ul, #list_'.$list_id.' ol { ';
    $output .= 'columns: '.$columns.' auto;';
    $output .= 'margin-top: 1em;';
    $output .= '}';
     $output .= '#list_'.$list_id.' ul li, #list_'.$list_id.' ol li { ';
    $output .= 'margin-top: 0';
    $output .= '}';
    $output .= '</style>';

    $output .= '<div id="list_'.$list_id.'">';
    $output .= do_shortcode($content) . "\n";
    $output .= '</div>';
    return $output;

}
add_shortcode('unordered_list', 'kemosite_shortcode_list');
add_shortcode('ordered_list', 'kemosite_shortcode_list');
