
<?php

/**
 * [ENQUEUE STYLES]
 */

function kemosite_wordpress_enqueue_styles() {
	
	$theme_version = "6.8.3.3";

    /* [Theme Style] */
    wp_deregister_style( 'kemosite-wp-block' );
    wp_register_style( 'kemosite-wp-block', get_template_directory_uri() . '/style.css', array(), $theme_version );
    wp_enqueue_style( 'kemosite-wp-block' );

    /* [The New CSS Reset] */
    wp_deregister_style( 'the-new-css-reset' );
    wp_register_style( 'the-new-css-reset', get_template_directory_uri() . '/css/reset.css', array(), '1.11.3' );
	wp_enqueue_style( 'the-new-css-reset' );

    /* [Foundation Assets] */
    wp_deregister_style( 'foundation' );
    wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css', array(), '6.8.1' );
	wp_enqueue_style( 'foundation' );

    /* [Foundation Icons] */
    wp_deregister_style( 'foundation-icons' );
    wp_register_style( 'foundation-icons', get_template_directory_uri() . '/css/foundation-icons/foundation-icons.css', array( 'foundation' ), '6.8.1' );
   	wp_enqueue_style( 'foundation-icons' );

    /* [Master Style Sheet] */
    wp_deregister_style( 'kemosite-master-styles' );
	wp_register_style( 'kemosite-master-styles', get_template_directory_uri() . '/css/kemosite-wordpress-master.css', array( 'kemosite-wp-block' ), $theme_version );
	wp_enqueue_style( 'kemosite-master-styles' );

	/* [Mediaelement CSS] */
	wp_deregister_style( 'mediaelement-css' );
    wp_register_style( 'mediaelement-css', get_template_directory_uri() . '/css/mediaelementplayer.min.css', array(), '7.0.5' );
    wp_enqueue_style( 'mediaelement-css' );

	/* [Add Woocommerce Styles if plugin active] */
	if ( defined( KEMOSITE_WOOCOMMERCE_ACTIVE ) && KEMOSITE_WOOCOMMERCE_ACTIVE == true ):
	    wp_deregister_style( 'kemosite-woocommerce' );
	    wp_register_style( 'kemosite-woocommerce', get_template_directory_uri() . '/css/kemosite-woocommerce-master.css', array(), $theme_version );
	    wp_enqueue_style( 'kemosite-woocommerce' );
	endif;

	/* [Add Learnpress Styles if plugin active] */
	if ( defined( KEMOSITE_LEARNPRESS_ACTIVE ) && KEMOSITE_LEARNPRESS_ACTIVE == true ):
	    wp_deregister_style( 'learnpress' );
	    wp_register_style( 'learnpress', get_template_directory_uri() . '/css/learnpress.css', array(), "4.2.6.5" );
	    wp_enqueue_style( 'learnpress' );
	endif;

	if ( defined( KEMOSITE_ENABLE_SRI )&& KEMOSITE_ENABLE_SRI == true ):
		add_filter( 'style_loader_tag', 'kemosite_wordpress_enqueue_styles_sri', 10, 4 );
	endif;

}

function kemosite_wordpress_enqueue_styles_sri( $html, $handle, $src, $media ) {

	$sri = array(
		'kemosite-wp-block',
		'the-new-css-reset',
		'foundation',
		'foundation-icons',
		'kemosite-master-styles',
		'mediaelement-css',
		'kemosite-woocommerce',
		'learnpress'
	);

	if ( in_array( $handle, $sri ) ):
		$html = str_replace( '<link ', '<link integrity="' . kemosite_wordpress_calculate_sri( $src ) . '" crossorigin="anonymous" ', $html );
		return $html;
	else:
		return $html;
	endif;

}

?>