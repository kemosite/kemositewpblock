<?php

/**
 * [Defer and Async external scripts]
 */
// Defer = A script that will not run until after the page has loaded:
// Async = A script that will be run asynchronously as soon as it is available:

function kemosite_wordpress_defer_async_scripts( $tag, $handle, $src ) {

	// file gets downloaded asynchronously, but executed only when the document parsing is completed
	$defer = array(
	    'kemosite-wordpress-theme-accessibility',
	    'foundation-app',
	    'kemosite-wordpress-theme-gtag',
	    'chart-js-config',
	    'kemosite-url-handler'
  );

	// file gets downloaded asynchronously and then executed as soon as it's downloaded
	$async = array(
	  	//'chart-js',
	  	'mediaelement',
	  	'kemosite-wordpress-theme-navigation',
	  	'kemosite-wordpress-theme-skip-link-focus-fix',
	  	'foundation-what-input',
	);

	if ( in_array( $handle, $defer ) ):
		return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	endif;

	if ( in_array( $handle, $async ) ):
		return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
	endif;

	return $tag;

}
