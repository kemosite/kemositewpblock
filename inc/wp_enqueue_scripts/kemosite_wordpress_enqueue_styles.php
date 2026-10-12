<?php

/**
 * [ENQUEUE STYLES]
 */

function kemosite_wordpress_enqueue_styles_sri( $html, $handle, $src, $media ) {

	$sri = array(
		'kemosite-wp-layers',
		'kemosite-wp-block',
		'kemosite-master-styles',
		'kemosite-woocommerce',
		'kemosite-learnpress'
	);

	if ( in_array( $handle, $sri ) ):
		// $html = str_replace( '<link ', '<link integrity="' . kemosite_wordpress_calculate_sri( $src ) . '" crossorigin="anonymous" ', $html );
		// $html = str_replace( '<link ', '<link nonce="' . kemosite_wordpress_csp_get_nonce() . '" crossorigin="anonymous" ', $html );
		$html = str_replace( '<link ', '<link integrity="' . kemosite_wordpress_calculate_sri( $src ) . '" nonce="' . kemosite_wordpress_csp_get_nonce() . '" crossorigin="anonymous" ', $html );
		return $html;
	else:
		return $html;
	endif;

}

function kemosite_wordpress_enqueue_styles() {
	
	$theme_version = "7.1.3.1";

	// WP lazy load is problematic.
	wp_dequeue_style( 'wp-img-auto-sizes-contain' );

    /* [Initialize Style Layers] */
    wp_deregister_style( 'kemosite-wp-layers' );
    wp_register_style( 'kemosite-wp-layers', get_template_directory_uri() . '/css/kemosite-wordpress-layers.css', array(), $theme_version );
    wp_enqueue_style( 'kemosite-wp-layers' );

    /* [Theme Style] */
    wp_deregister_style( 'kemosite-wp-block' );
    wp_register_style( 'kemosite-wp-block', get_template_directory_uri() . '/style.css', array(), $theme_version );
    wp_enqueue_style( 'kemosite-wp-block' );

    /* [Master Style Sheet] */
    wp_deregister_style( 'kemosite-master-styles' );
	wp_register_style( 'kemosite-master-styles', get_template_directory_uri() . '/css/kemosite-wordpress-master.css', array( 'kemosite-wp-block' ), $theme_version );
	wp_enqueue_style( 'kemosite-master-styles' );

	/* [Add Woocommerce Styles if plugin active] */
	if ( defined( KEMOSITE_WOOCOMMERCE_ACTIVE ) && KEMOSITE_WOOCOMMERCE_ACTIVE == true ):
	    wp_deregister_style( 'kemosite-woocommerce' );
	    wp_register_style( 'kemosite-woocommerce', get_template_directory_uri() . '/css/kemosite-woocommerce-master.css', array(), $theme_version );
	    wp_enqueue_style( 'kemosite-woocommerce' );
	endif;

	/* [Add Learnpress Styles if plugin active] */
	if ( defined( KEMOSITE_LEARNPRESS_ACTIVE ) && KEMOSITE_LEARNPRESS_ACTIVE == true ):
	    wp_deregister_style( 'kemosite-learnpress' );
	    wp_register_style( 'kemosite-learnpress', get_template_directory_uri() . '/css/kemosite-learnpress-master.css', array(), $theme_version );
	    wp_enqueue_style( 'kemosite-learnpress' );
	endif;

	if ( defined( KEMOSITE_ENABLE_SRI ) && KEMOSITE_ENABLE_SRI == true ):
		add_filter( 'style_loader_tag', 'kemosite_wordpress_enqueue_styles_sri', 10, 4 );
	endif;

}

?>