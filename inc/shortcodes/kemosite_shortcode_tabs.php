<?php

/**
 * [TABS]
 */

function kemosite_shortcode_tabs( $attributes, $content ) {

    if ($attributes !== NULL && 
    $attributes['id']):

        $output = "";
        $output .= '<ul class="tabs" data-tabs id="'.$attributes['id'].'">' . "\n";
        
        if ($attributes['panels']):

            $panel_names = explode(",", $attributes['panels']);

            foreach($panel_names as $id => $panel_name):

                $output .= '<li class="tabs-title"><a data-tabs-target="#'.$id.'" href="#'.$id.'">'.$panel_name.'</a></li>' . "\n";

            endforeach;

        endif;
        
        $output .= '</ul>' . "\n";
        $output .= '<div class="tabs-content" data-tabs-content="'.$attributes['id'].'">' . "\n";
        $output .= do_shortcode($content) . "\n";
        $output .= '</div>' . "\n";
        return $output;

    endif;

}
add_shortcode('tabs', 'kemosite_shortcode_tabs');

function kemosite_shortcode_tab($attributes, $content) {

    if ($attributes !== NULL && 
    $attributes['id']):

        $output = "";

        $output .= '<div class="tabs-panel" id="'.$attributes['id'].'">' . "\n";
        $output .= do_shortcode($content) . "\n";
        $output .= '</div>' . "\n";

        return $output;

    endif;

}
add_shortcode('tab', 'kemosite_shortcode_tab');

?>