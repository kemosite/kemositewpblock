<?php

/**
 * [ENQUEUE SCRIPTS]
 */

function kemosite_wordpress_enqueue_scripts() {

	// Retrieve Custom Fields from post.
	$custom_fields = get_post_custom();

	// Accessibility enhancements
	wp_deregister_script('kemosite-wordpress-theme-accessibility');
	wp_register_script('kemosite-wordpress-theme-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), '20200525', array( 'footer' => true, 'strategy' => 'defer' ) );
	wp_enqueue_script('kemosite-wordpress-theme-accessibility');

	// URL Handler
	wp_deregister_script('kemosite-url-handler');
	wp_register_script('kemosite-url-handler', get_template_directory_uri().'/js/kemosite-url-handler.js', array(), '20220113', array( 'footer' => true, 'strategy' => 'defer' ) );
	wp_enqueue_script('kemosite-url-handler');

	// Typography
	wp_deregister_script('kemosite-typography-orphans');
	wp_register_script('kemosite-typography-orphans', get_template_directory_uri().'/js/kemosite-typography-orphans.js', array(), '20240426', array( 'footer' => true ) );
	wp_enqueue_script('kemosite-typography-orphans');

	wp_add_inline_script( 'kemosite-typography-orphans', '
		document.addEventListener("DOMContentLoaded", (event) => {
			document.fonts.ready.then( function() {
				kemosite_typography_orphans.init();
			});
		});
	');

	// Foundation JS Files
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery.min.js', array(), '3.7.1', array( 'footer' => true ) );
	wp_enqueue_script('jquery');

	wp_deregister_script('foundation-what-input');
	wp_register_script('foundation-what-input', get_template_directory_uri().'/js/vendor/what-input.min.js', array(), '5.2.12', array( 'footer' => true, 'strategy' => 'async' ) );
	wp_enqueue_script('foundation-what-input');

	wp_deregister_script('foundation');
	wp_register_script('foundation', get_template_directory_uri().'/js/vendor/foundation.min.js', array('jquery'), '6.8.1', array( 'footer' => true ) );
	wp_enqueue_script('foundation');

	wp_deregister_script('foundation-app');
	wp_register_script('foundation-app', get_template_directory_uri().'/js/app.js', array('foundation'), '6.8.1', array( 'footer' => true, 'strategy' => 'defer' ) );
	wp_enqueue_script('foundation-app');

	// Load Graph.js if declared in page Custom Fields
	// print_r($custom_fields['load-graph-js'][0]);

	if(isset($custom_fields['load-chart-js'][0]) && $custom_fields['load-chart-js'][0] == "true"):
		
		$chart_js_version = '4.4.2';

		// Chart JS
		wp_deregister_script('chart-js');
		wp_register_script('chart-js', get_template_directory_uri().'/js/vendor/Chart.min.js', array(), $chart_js_version, array() );
		wp_enqueue_script('chart-js');

		// Chart JS Config
		wp_deregister_script('chart-js-config');
		wp_register_script('chart-js-config', get_template_directory_uri().'/js/chart-js-config.js', array(), $chart_js_version, array( 'strategy' => 'defer' ) );
		wp_enqueue_script('chart-js-config');

	endif;

	// Mediaelement
	wp_deregister_script('mediaelement');
	wp_register_script('mediaelement', get_template_directory_uri().'/js/vendor/mediaelement-and-player.min.js', array(), '7.0.5', array( 'footer' => true, 'strategy' => 'async' ) );
	wp_enqueue_script('mediaelement');

	// Underscores Navigation
	wp_deregister_script('kemosite-wordpress-theme-navigation');
	wp_register_script('kemosite-wordpress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', array( 'footer' => true, 'strategy' => 'async' ) );
	wp_enqueue_script('kemosite-wordpress-theme-navigation');

	wp_deregister_script('kemosite-wordpress-theme-skip-link-focus-fix');
	wp_register_script('kemosite-wordpress-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', array( 'footer' => true, 'strategy' => 'async' ) );
	wp_enqueue_script('kemosite-wordpress-theme-skip-link-focus-fix');

	// Gtag
	wp_deregister_script('kemosite-wordpress-theme-gtag');
	wp_register_script('kemosite-wordpress-theme-gtag', get_template_directory_uri() . '/js/gtag.js', array(), '20210515', array( 'footer' => true, 'strategy' => 'defer' ) );
	wp_enqueue_script('kemosite-wordpress-theme-gtag');
		
	// Add menus
	// add_action( 'init', 'register_my_menus' );	
	
	/*
	function remove_version_info() {
	     return '';
	}
	add_filter('the_generator', 'remove_version_info');
	*/

	add_filter( 'script_loader_tag', 'kemosite_wordpress_enqueue_scripts_sri', 10, 2 );

}

function kemosite_wordpress_enqueue_scripts_sri( $html, $handle ) {

	$sri = array(
		'jquery' => "sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs",
		'foundation' => "sha384-aIzMo8wrK01Ha4yHuRC7+ttQyih1mBL9y+g0q06AvY1ZYU+lQpYeOS340JDX0gPM",
		'foundation-app' => "sha384-OLBgp1GsljhM2TJ+sbHjaiH9txEUvgdDTAzHv2P24donTt6/529l+9Ua0vFImLlb",
		'chart-js' => "sha384-e0Ld33+NYCtr348mTKmGXxuXo8Pq1tiaN2zrO6oxfkwrnpuS7qPnLM4BX78E5CaV",
		'kemosite-wordpress-theme-accessibility' => "sha384-2PX/4v63APKDtWeHFC/+vmmJLDBJRMu8fjkk5vobB4CFP0ig5SKEmEMYiwnq4TFT",
		'kemosite-wordpress-theme-gtag' => "sha384-6Vl5/q/l+7NKrJUXfnPuS9gu9tHAFTKVK8ZpNpkMaQKOOGY3hXvRjWkl5qMput/W",
		'chart-js-config' => "sha384-zhfO1pIWyfI9B1PrCbWqkX9j5iy6/KmuKSDvDJv/WxePyKq4rrl09Ok+ICRmzWi9",
		'kemosite-url-handler' => "sha384-U0Tv7uETrtS4M1SKukSpJKLGJBGlQUfhUDYU7+40+HsBnZWoJ8ZRplprsTPeCBuH",
		'mediaelement' => "sha384-rbUYuYu+32P4C+iccuLEQM+QAAEM30BcUwPzjmy4SaV5A9ffKR5z0boQW+MDrjbB",
	  	'kemosite-wordpress-theme-navigation' => "sha384-5+KMzUo/+Cfac+crZz8CNYLqSFupzQjmLzz8xUuneXs8GrMwAF3DoRwby2THar6j",
	  	'kemosite-wordpress-theme-skip-link-focus-fix' => "sha384-e8jCVY5/XCGnhFgS9HOz0wQIzMB1UrCZW26/lY8+6PtFh5r1cQVRXgqcO297wY+X",
	  	'foundation-what-input' => "sha384-Pdwt+Fh32egoLW6Sa3WsD60SGn4PhylHf0H9v9CLVkXtv3sNSZqKBQPZAApb8VJY"
	);

	if ( array_key_exists( $handle, $sri ) ):
		$html = str_replace( '></script>', ' integrity="' . $sri["$handle"] . '" crossorigin="anonymous"></script>', $html );
		return $html;
	else:
		return $html;
	endif;

}

?>