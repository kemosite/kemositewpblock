<?php

/* Integrity hashes should not be re-calculated every time automatically. They should only be calculated at the time of installation, and verified from a static value */

function kemosite_wordpress_calculate_sri( $url ) {

	if( $url ):

		// Generate new integrity hash if URL is missing, and Debug mode is on.
		
		// Retrieve Hashes from JSON file
		$sri_hashes_json = file_get_contents( get_template_directory() . '/inc/function-helpers/sri-hashes.json' );
		$sri_hashes_data = (array) json_decode( $sri_hashes_json );

		/*
		echo "<pre>";
		print_r( $sri_hashes_data );
		echo "</pre>";
		*/

		// Retrieve and use from supplied URL if available.
		if ( array_key_exists( $url, (array) $sri_hashes_data ) ):

			return "sha384-" . $sri_hashes_data[ $url ];

		// If lookup fails, and DEBUG mode is ON, then generate a new one and save it to the JSON file.
		elseif ( WP_DEBUG ):

			$handle_hash = base64_encode( hash_file( "sha384", $url, true ) );
			$sri_hashes_data[$url] = $handle_hash;
			file_put_contents( get_template_directory() . '/inc/function-helpers/sri-hashes.json', json_encode( $sri_hashes_data ) );

			return "sha384-" . $handle_hash;

		endif;

	endif;

}

// $attr['src'], 'cdnjs.cloudflare.com' ) ) {
// $attr['integrity']   = 'sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg==';
// $attr['crossorigin'] = 'anonymous';

// Add SRI to enqueued script tags (WP 6.1+)
add_filter('wp_script_attributes', function( $attributes ) {
	
	if( $attributes['src'] ):
		$attributes['integrity'] = kemosite_wordpress_calculate_sri( $attributes['src'] );
		$attributes['crossorigin'] = "anonymous";
		return $attributes;
	endif;

});

// Add SRI to inline script tags
/*
add_filter('wp_inline_script_attributes', function( $attributes ) {

	if( $attributes['src'] ):
		$attributes['integrity'] = kemosite_wordpress_calculate_sri( $attributes['src'] );
		$attributes['crossorigin'] = "anonymous";
		return $attributes;
	endif;

});
*/

// Add SRI to style tags
add_filter('wp_style_attributes', function( $attributes ) {

	if( $attributes['src'] ):
		$attributes['integrity'] = kemosite_wordpress_calculate_sri( $attributes['src'] );
		$attributes['crossorigin'] = "anonymous";
		return $attributes;
	endif;

});