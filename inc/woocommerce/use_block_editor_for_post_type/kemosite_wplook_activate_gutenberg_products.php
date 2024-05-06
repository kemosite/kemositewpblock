<?php

/**
 * [kemosite_wplook_activate_gutenberg_products]
 */

function kemosite_wplook_activate_gutenberg_products( $can_edit, $post_type ) {
	if($post_type == 'product'): $can_edit = true; endif;
	return $can_edit;
}

?>