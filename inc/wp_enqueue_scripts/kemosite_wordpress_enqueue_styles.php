
<?php

/**
 * [ENQUEUE STYLES]
 */

function kemosite_wordpress_enqueue_styles() {
	
	$theme_version = "6.5.2";

    /* [Theme Style] */
    wp_deregister_style( 'kemosite-wp-block' );
    wp_register_style( 'kemosite-wp-block', get_template_directory_uri() . '/style.css', array(), $theme_version );
    wp_enqueue_style( 'kemosite-wp-block' );

    /* [Foundation Assets] */
    wp_deregister_style( 'foundation' );
    wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css', array(), '6.8.1' );
	wp_enqueue_style( 'foundation' );

    /* [Foundation Icons] */
    wp_deregister_style( 'foundation-icons' );
    wp_register_style( 'foundation-icons', get_template_directory_uri() . '/css/foundation-icons/foundation-icons.css', array( 'foundation' ), '6.8.1' );
   	wp_enqueue_style( 'foundation-icons' );

    /* [Pictograms] */
    wp_deregister_style( 'modern-pictograms' );
    wp_register_style( 'modern-pictograms', get_template_directory_uri() . '/css/modern-pictograms/stylesheet.css', array( 'kemosite-wp-block' ), $theme_version );
    wp_enqueue_style( 'modern-pictograms' );

    /* [Master Style Sheet] */
    wp_deregister_style( 'kemosite-master-styles' );
	wp_register_style( 'kemosite-master-styles', get_template_directory_uri() . '/css/kemosite-wordpress-master.css', array( 'kemosite-wp-block' ), $theme_version );
	wp_enqueue_style( 'kemosite-master-styles' );

	/* [Mediaelement CSS] */
	wp_deregister_style( 'mediaelement-css' );
    wp_register_style( 'mediaelement-css', get_template_directory_uri() . '/css/mediaelementplayer.min.css', array(), '7.0.5' );
    wp_enqueue_style( 'mediaelement-css' );

	/* [Add Woocommerce Styles if plugin active] */
	if ( defined(KEMOSITE_WOOCOMMERCE_ACTIVE) && KEMOSITE_WOOCOMMERCE_ACTIVE == true):
	    wp_deregister_style( 'kemosite-woocommerce' );
	    wp_register_style( 'kemosite-woocommerce', get_template_directory_uri() . '/css/kemosite-woocommerce-master.css', array(), $theme_version );
	    wp_enqueue_style( 'kemosite-woocommerce' );
	endif;

	/* [Add Learnpress Styles if plugin active] */
	if ( defined(KEMOSITE_LEARNPRESS_ACTIVE) && KEMOSITE_LEARNPRESS_ACTIVE == true):
	    wp_deregister_style( 'learnpress' );
	    wp_register_style( 'learnpress', get_template_directory_uri() . '/css/learnpress.css', array(), "4.2.6.5" );
	    wp_enqueue_style( 'learnpress' );
	endif;

	add_filter( 'style_loader_tag', 'kemosite_wordpress_enqueue_styles_sri', 10, 2 );

}

function kemosite_wordpress_enqueue_styles_sri( $html, $handle ) {

	$sri = array(
		'kemosite-wp-block' => "sha384-dMO/1Wj3b+7f75OIVri0Pu3OoHWABKOd/KdAlfrd5/oAWo/ffYogtXFw8MCw7F2D",
		'foundation' => "sha384-2ZAo6d0r9zxtxn7DvMBmpd3hscGP+LkxQ/kMShaUz/TqqsBPtbtZ1K3+3/CgndDu",
		'foundation-icons' => "sha384-7bXLCxCHaev6+cHdA4uI++Z62NQccdKvHttwhapeDp4M7A/80ZupYyEwBZOXcdaz",
		'modern-pictograms' => "sha384-B+1c6f0W8mTBldSZyPVKZtJW/ZobnyN+KsdI+Pwqv04GHYjKiYEdvHkVgexZpLG2",
		'kemosite-master-styles' => "sha384-d+AhL+XKF2yjoO+JshESVesIKwWBKIBAf/94UiRFEk0e76gkHJ5d9+R7BAx0UHGA",
		'mediaelement-css' => "sha384-yMPTCKNeqdVDbMfSmKl/Ug2z9XZA4eYi8vI67Ul0BNNH47Nfjbk6FWfTESPuEB3+",
		'kemosite-woocommerce' => "sha384-ekHC+gfLJ9pPG93dFxFH/fnSNDEXdgTms6Fw+EJ2sfwsJTXnC90JF9DyvvpWBtyM",
		'learnpress' => "sha384-Dx/vtXUPumpb0x/snikgWb2NdTdrQYsADLC1wUjSebk6Cf+xu8wSS/P5O5fdhpj+"
	);

	if ( array_key_exists( $handle, $sri ) ):
		$html = str_replace( '<link ', '<link integrity="' . $sri["$handle"] . '" crossorigin="anonymous" ', $html );
		return $html;
	else:
		return $html;
	endif;

}

?>