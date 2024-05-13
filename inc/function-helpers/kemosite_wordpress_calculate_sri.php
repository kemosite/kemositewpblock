<?php

if ( !function_exists('kemosite_wordpress_calculate_sri') ) :
function kemosite_wordpress_calculate_sri( $url ) {

	$handle_hash = hash_file( "sha384", $url, true );
	$handle_hash_64 = "sha384-" . base64_encode( $handle_hash );

	return $handle_hash_64;

}
endif;

?>