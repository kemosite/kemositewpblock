<?php

/**
 * [DEFINE SITE DESCRIPTION]
 */

function kemosite_site_description() {
	
	$wordpress_seo = true; // define default
	if ( !is_plugin_active('wordpress-seo/wp-seo.php') ): $wordpress_seo = false; endif;

	if ( get_the_excerpt() && $wordpress_seo === false ):
		$kemosite_site_description = esc_html( get_the_excerpt() );
	elseif ( category_description() && $wordpress_seo === false ):
		$kemosite_site_description = esc_html( category_description() );
	elseif ( get_bloginfo('description') && $wordpress_seo === false ):
		$kemosite_site_description = esc_html( get_bloginfo('description') );
	endif;

	if ( $wordpress_seo === false ):
		echo '<meta name="description" content="' . $kemosite_site_description . '">';
	endif;

}

?>
