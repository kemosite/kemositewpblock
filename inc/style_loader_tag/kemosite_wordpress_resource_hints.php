<?php

/**
 * [kemosite_wordpress_resource_hints]
 */



function kemosite_wordpress_resource_hints($hints, $relation_type) {
	
	global $wp_styles;
	global $wp_scripts;

	/* IN ORDER OF COMMITMENT */
	// dns-prefetch - used to indicate an origin that will be used to fetch required resources, and that the user agent SHOULD resolve as early as possible. Helpful when you know you’ll connect to a domain soon, and you want to speed up the initial connection.
	// preconnect - used to indicate an origin that will be used to fetch required resources. Initiating an early connection. Helpful when you know you’ll download something from a third-party domain soon, but you don’t know what exactly.
	// prefetch - used to identify a resource that might be required by the next navigation. Asks the browser to download and cache a resource (like, a script or a stylesheet) in the background.
	// prerender - used to identify a resource that might be required by the next navigation. Helpful when you’re really sure a user will visit a specific page next, and you want to render it faster.

	/* PRELOAD DIRECTIVES */
	// audio
	// video
	// track
	// script
	// style
	// font
	// image
	// fetch crossorigin
	// embed
	// object
	// document

	/*
	<link rel="dns-prefetch" href="//widget.com">
	<link rel="preconnect" href="//cdn.example.com">
	<link rel="prefetch" href="//example.com/logo-hires.jpg" as="image">
	<link rel="preload" href="//example.com/foundation-icons.css" as="style">
	<link rel="prerender" href="//example.com/next-page.html">
	*/

    $dns_prefetch_domains = array(
    	// 'https://fonts.googleapis.com'
	);

	$preconnect_domains = array(
    	//'https://fonts.googleapis.com'
	);

	$preconnect_domains_cors = array(
    	// 'https://fonts.gstatic.com'
	);

    $prefetch_style = array(
    	'the-new-css-reset',
    	'foundation',
		'kemosite-master-styles',
	);

    // Make sure JS declarations are not already declared assets for deferred or async loading.
	$prefetch_script = array(
    	'jquery',
    	'foundation',
    	// 'kemosite-url-handler',
	);

	switch ($relation_type) {

		case 'dns-prefetch':

			foreach($dns_prefetch_domains as $tag):

	    		$hints[] = array(
		    		'href' => $tag
		    	);

	    	endforeach;

			break;

		case 'preconnect':

			foreach($preconnect_domains as $tag):

	    		$hints[] = array(
		    		'href' => $tag
		    	);

	    	endforeach;

	    	foreach($preconnect_domains_cors as $tag):

	    		$hints[] = array(
		    		'href' => $tag,
		    		'crossorigin' => 'same-origin'
		    	);

	    	endforeach;
			
			break;

		case 'prefetch':

			// Prefetch theme logo
	    	$hints[] = array(
	    		'as' => 'image',
	    		'href' => KEMOSITE_THEME_LOGO
	    	);

	    	foreach($prefetch_style as $tag):

	    		$hints[] = array(
		    		'as' => 'style',
		    		'href' => $wp_styles->registered[$tag]->src,
		    		'crossorigin' => 'anonymous'
		    	);

	    	endforeach;

	    	foreach($prefetch_script as $tag):

	    		$hints[] = array(
		    		'as' => 'script',
		    		'href' => $wp_scripts->registered[$tag]->src,
		    		'crossorigin' => 'anonymous'
		    	);

	    	endforeach;

			break;

		default:

			break;

	}

    return $hints;

}
