<?php

/**
 * [TABLES]
 */

function kemosite_shortcode_table( $attributes, $content ) {

    $output = "";

    $output .= '<table>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</table>' . "\n";

    return $output;

}
add_shortcode('table', 'kemosite_shortcode_table');

function kemosite_shortcode_table_head( $attributes, $content ) {

    $output = "";

    $output .= '<thead>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</thead>' . "\n";

    return $output;

}
add_shortcode('table_head', 'kemosite_shortcode_table_head');

function kemosite_shortcode_table_body( $attributes, $content ) {

    $output = "";

    $output .= '<tbody>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</tbody>' . "\n";

    return $output;

}
add_shortcode('table_body', 'kemosite_shortcode_table_body');

function kemosite_shortcode_table_row( $attributes, $content ) {

    $output = "";

    $output .= '<tr>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</tr>' . "\n";

    return $output;

}
add_shortcode('table_row', 'kemosite_shortcode_table_row');

function kemosite_shortcode_table_cell_head( $attributes, $content ) {

    $output = "";

    $output .= '<th>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</th>' . "\n";

    return $output;

}
add_shortcode('table_cell_head', 'kemosite_shortcode_table_cell_head');

function kemosite_shortcode_table_cell_body( $attributes, $content ) {

    $output = "";

    $output .= '<td>' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</td>' . "\n";

    return $output;

}
add_shortcode('table_cell_body', 'kemosite_shortcode_table_cell_body');
