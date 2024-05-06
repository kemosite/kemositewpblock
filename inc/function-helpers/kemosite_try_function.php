<?php
function kemosite_try_function( $function ) {
    try {
    	$function();
	} catch (ErrorException $e) {
	   kemosite_debug_to_console( $e->getMessage() );
	}
}
?>