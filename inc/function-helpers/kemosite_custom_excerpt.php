<?php

function kemosite_custom_excerpt( $post_id = null) {

    if (!empty(get_post_meta($post_id, 'page_excerpt'))):
    	$page_excerpt = get_post_meta($post_id, 'page_excerpt');
    	$excerpt = esc_textarea($page_excerpt[0]);
    elseif ( has_excerpt($post_id) ):
		$excerpt = get_the_excerpt($post_id);
	else:
		$excerpt = the_excerpt();
	endif;

  return $excerpt;

}
