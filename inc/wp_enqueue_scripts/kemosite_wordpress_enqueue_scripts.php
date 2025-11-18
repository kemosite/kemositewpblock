<?php

/**
 * [ENQUEUE SCRIPTS]
 */

function kemosite_wordpress_enqueue_scripts() {

	// Retrieve Custom Fields from post.
	$custom_fields = get_post_custom();
	$theme_version = "6.8.3.2";

	// Lazy Load Images
	wp_deregister_script('kemosite-lazy-load-images');
	wp_register_script('kemosite-lazy-load-images', get_template_directory_uri().'/js/kemosite-lazy-load-images.js', array(), $theme_version );
	wp_enqueue_script('kemosite-lazy-load-images');

	// Accessibility enhancements
	wp_deregister_script('kemosite-wordpress-theme-accessibility');
	wp_register_script('kemosite-wordpress-theme-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), $theme_version, array( 'footer' => true, 'strategy' => 'defer' ) );
	wp_enqueue_script('kemosite-wordpress-theme-accessibility');

	// URL Handler
	// wp_deregister_script('kemosite-url-handler');
	// wp_register_script('kemosite-url-handler', get_template_directory_uri().'/js/kemosite-url-handler.js', array(), $theme_version, array( 'footer' => true, 'strategy' => 'defer' ) );
	// wp_enqueue_script('kemosite-url-handler');

	// Typography
	// wp_deregister_script('kemosite-typography-orphans');
	// wp_register_script('kemosite-typography-orphans', get_template_directory_uri().'/js/kemosite-typography-orphans.js', array(), $theme_version, array( 'footer' => true ) );
	// wp_enqueue_script('kemosite-typography-orphans');

	/* wp_add_inline_script( 'kemosite-typography-orphans', '
		document.addEventListener("DOMContentLoaded", (event) => {
			document.fonts.ready.then( function() {
				kemosite_typography_orphans.init();
			});
		});
	'); */

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
		
		$chart_js_version = '4.4.3';

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
	wp_register_script('kemosite-wordpress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $theme_version, array( 'footer' => true, 'strategy' => 'async' ) );
	wp_enqueue_script('kemosite-wordpress-theme-navigation');

	wp_deregister_script('kemosite-wordpress-theme-skip-link-focus-fix');
	wp_register_script('kemosite-wordpress-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $theme_version, array( 'footer' => true, 'strategy' => 'async' ) );
	wp_enqueue_script('kemosite-wordpress-theme-skip-link-focus-fix');

	// Gtag
	wp_deregister_script('kemosite-wordpress-theme-gtag');
	wp_register_script('kemosite-wordpress-theme-gtag', get_template_directory_uri() . '/js/gtag.js', array(), $theme_version, array( 'footer' => true, 'strategy' => 'defer' ) );
	wp_enqueue_script('kemosite-wordpress-theme-gtag');
		
	// Add menus
	// add_action( 'init', 'register_my_menus' );	
	
	/*
	function remove_version_info() {
	     return '';
	}
	add_filter('the_generator', 'remove_version_info');
	*/

	if ( KEMOSITE_ENABLE_SRI ):
		add_filter( 'script_loader_tag', 'kemosite_wordpress_enqueue_scripts_sri', 10, 3 );
	endif;

}

function kemosite_wordpress_enqueue_scripts_sri( $html, $handle, $src ) {

	// Hardcoding values stops working when files are located to another server, line installing the theme.
	// The values have to be re-calculated for each server location.
	// For this reason, a PHP function to calculate this every time now makes more sense.

	/*
	echo "<pre>";
	print_r( 'hash: ' );
	print_r( kemosite_wordpress_calculate_sri( $src ) );
	echo "<br><br>";
	echo "</pre>";
	*/

	$sri = array(
		'jquery',
		'foundation',
		'foundation-app',
		'chart-js',
		'kemosite-wordpress-theme-accessibility',
		'kemosite-wordpress-theme-gtag',
		'chart-js-config',
		// 'kemosite-url-handler',
		'mediaelement',
	  	'kemosite-wordpress-theme-navigation',
	  	'kemosite-wordpress-theme-skip-link-focus-fix',
	  	'foundation-what-input',
	  	'kemosite-lazy-load-images'
	);

	if ( in_array( $handle, $sri ) ):
		$html = str_replace( '></script>', ' integrity="' . kemosite_wordpress_calculate_sri( $src ) . '" crossorigin="anonymous"></script>', $html );
		return $html;
	else:
		return $html;
	endif;

}

?>