<?php

if ( !function_exists('kemosite_wordpress_calculate_sri') ) :
	function kemosite_wordpress_calculate_sri( $url ) {

		$handle_hash = hash_file( "sha384", $url, true );
		return "sha384-" . base64_encode( $handle_hash );

	}
endif;
