<?php

/**
 * [PROGRESS BARS]
 */

function kemosite_shortcode_progress_bars( $attributes, $content ) {

    $output = "";

    $output .= '<div class="progress" role="progressbar" tabindex="0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' . "\n";
    $output .= do_shortcode($content) . "\n";
    $output .= '</div>' . "\n";

    return $output;

}
add_shortcode('progress_bars', 'kemosite_shortcode_progress_bars');

function kemosite_shortcode_progress_bar( $attributes, $content ) {

    $output = "";

    if ($attributes !== null && is_numeric($attributes['percent_done'])): $output .= '<div class="progress-meter" style="width: '.$attributes['percent_done'].'%"></div>' . "\n"; endif;

    return $output;

}
add_shortcode('progress_bar', 'kemosite_shortcode_progress_bar');
