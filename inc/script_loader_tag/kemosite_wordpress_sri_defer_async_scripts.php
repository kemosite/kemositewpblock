<?php

/**
 * [SRI, Defer and Async external scripts]
 */

// SRI = Use Subresource Integrity feature.
// Defer = A script that will not run until after the page has loaded:
// Async = A script that will be run asynchronously as soon as it is available:

function kemosite_wordpress_sri_defer_async_scripts( $tag, $handle, $src ) {

	$sri = array(
		'kemosite-wordpress-theme-accessibility' => "sha384-2PX/4v63APKDtWeHFC/+vmmJLDBJRMu8fjkk5vobB4CFP0ig5SKEmEMYiwnq4TFT",
		'foundation-app' => "sha384-OLBgp1GsljhM2TJ+sbHjaiH9txEUvgdDTAzHv2P24donTt6/529l+9Ua0vFImLlb",
		'kemosite-wordpress-theme-gtag' => "sha384-6Vl5/q/l+7NKrJUXfnPuS9gu9tHAFTKVK8ZpNpkMaQKOOGY3hXvRjWkl5qMput/W",
		'chart-js-config' => "sha384-zhfO1pIWyfI9B1PrCbWqkX9j5iy6/KmuKSDvDJv/WxePyKq4rrl09Ok+ICRmzWi9",
		'kemosite-url-handler' => "sha384-U0Tv7uETrtS4M1SKukSpJKLGJBGlQUfhUDYU7+40+HsBnZWoJ8ZRplprsTPeCBuH",
		'mediaelement' => "sha384-bwjzLXvhE87pnYFqPHptKMB6vnbY3dutBRLtpUPxyIA0aevgyfKnTBwmpNwvCUs+",
	  	'kemosite-wordpress-theme-navigation' => "sha384-5+KMzUo/+Cfac+crZz8CNYLqSFupzQjmLzz8xUuneXs8GrMwAF3DoRwby2THar6j",
	  	'kemosite-wordpress-theme-skip-link-focus-fix' => "sha384-e8jCVY5/XCGnhFgS9HOz0wQIzMB1UrCZW26/lY8+6PtFh5r1cQVRXgqcO297wY+X",
	  	'foundation-what-input' => "sha384-Pdwt+Fh32egoLW6Sa3WsD60SGn4PhylHf0H9v9CLVkXtv3sNSZqKBQPZAApb8VJY"
	);

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
		if ( array_key_exists( $handle, $sri ) ):
			return '<script src="' . $src . '" defer="defer" type="text/javascript" integrity="' . $sri["$handle"] . '" crossorigin="anonymous"></script>' . "\n";
		else:
			return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
		endif;
	endif;

	if ( in_array( $handle, $async ) ):
		if ( array_key_exists( $handle, $sri ) ):
			return '<script src="' . $src . '" async="async" type="text/javascript" integrity="' . $sri[$handle] . '" crossorigin="anonymous"></script>' . "\n";
		else:
			return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
		endif;
	endif;

	return $tag;

}

?>