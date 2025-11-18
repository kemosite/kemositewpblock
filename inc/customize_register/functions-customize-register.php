<?php

/* [Customizations] */
function kemosite_customize_register( $wp_customize ) {
	
	/*
	** [REMOVE UNNEEDED SECTIONS AND CONTROLS] **
	*/
	$wp_customize->remove_control("header_image"); // replaced with theme function
	$wp_customize->remove_section("header_image"); // replaced with theme function
	$wp_customize->remove_control("background_image");
	$wp_customize->remove_section("background_image");
	$wp_customize->remove_control("background_color");
	$wp_customize->remove_section("colors");

 	/* [SECTIONS] *
 	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
 	**	Title				ID								Priority (Order)
	**	Site 				Title & Tagline	title_tagline	20
	**	Colors				colors							40
	**	Header Image		header_image					60
	**	Background Image	background_image				80
	**	Menus (Panel)		nav_menus						100
	**	Widgets (Panel)		widgets							110
	**	Static Front Page	static_front_page				120
	**	default												160
	**	Additional CSS		custom_css						200
	*/

	// Include Pantone COTY history
	require get_template_directory() . '/inc/customize_register/customize-register-coty.php'; // returns $pantone_coty_colours

	// Include Universal Colours
	require get_template_directory() . '/inc/customize_register/customize-register-universal-colours.php'; // returns $kemosite_wordpress_universal_colours

	/* [ADD GLOBAL COLOUR OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_global_colour_options' , array(
	  'title' => __( 'Global Colour Options', 'kemositewpblock' ),
	  'description' => 'Publish base colour for the theme. Variations and accessibility contrast adjustments will be created after publishing in Colour Variations panel.',
	  'priority' => 40, // Same as Colour.
	  'capability' => 'edit_theme_options'
	) );
	require get_template_directory() . '/inc/customize_register/kemosite-wordpress-global-colour-options.php';

	/* [ADD A HEADER OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_header' , array(
	  'title' => __( 'Header Options', 'kemositewpblock' ),
	  'description' => 'Header options for the theme.',
	  'priority' => 90, // Before Menus.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_header_bg_color', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $kemosite_wordpress_base_primary_colour,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_header_bg_color', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Header Background Colour', 'kemositewpblock' ),
			'description' => 'Header text will automatically be black/white to maximize contrast with background colour.',
			'section' => 'kemosite_wordpress_header',
			'default' => $kemosite_wordpress_base_primary_colour
		) ) );

		$wp_customize->add_setting( 'kemosite_wordpress_header_bg_image', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kemosite_wordpress_header_bg_image', array(
		   'priority' => 10, // Within the section.
		   'label'      => __( 'Header Background Image', 'kemositewpblock' ),
		   'section'    => 'kemosite_wordpress_header'
	    ) ) );

	    $wp_customize->add_setting( 'kemosite_wordpress_header_bg_image_presentation', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_header_bg_image_presentation', array(
			'type' => 'radio',
			'priority' => 10, // Within the section.
			'section' => 'kemosite_wordpress_header', // Required, core or custom.
			'label' => __( 'Header Background Image Presentation', 'kemositewpblock' ),
			'description' => __( 'Should the header image be presented in full-colour, or duotone?' ),
			'choices' => array(
                'full-colour' => __( 'Full Colour' ),
                'duotone' => __( 'Duotone' ),
            ),
	    ) ) );



    /* [ADD A MAIN CONTENT OPTIONS SECTION] */
	$wp_customize->add_section( 'kemosite_wordpress_main_content' , array(
	  'title' => __( 'Main Content Options', 'kemositewpblock' ),
	  'description' => 'Main content options for the theme.',
	  'priority' => 105, // Before Menus.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_main_content_bg_color_light_mode', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '#efeff0',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_main_content_bg_color_light_mode', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Light Mode Main Content Background Colour', 'kemositewpblock' ),
			'section' => 'kemosite_wordpress_main_content',
			'description' => __( 'Default: Cool white (not pure white, to improve cognative accessibility' ),
			'default' => '#efeff0',
		) ) );

		$wp_customize->add_setting( 'kemosite_wordpress_main_content_bg_color_dark_mode', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '#242400',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_main_content_bg_color_dark_mode', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Dark Mode Main Content Background Colour', 'kemositewpblock' ),
			'section' => 'kemosite_wordpress_main_content',
			'description' => __( 'Default: 100% black ink at 60 degrees (no blue light), ' ),
			'default' => '#242400',
		) ) );

	/* [ADD A FOOTER OPTIONS SECTION] */
	$wp_customize->add_section( 'kemosite_wordpress_footer' , array(
	  'title' => __( 'Footer Options', 'kemositewpblock' ),
	  'description' => 'Footer options for the theme.',
	  'priority' => 130, // Before Menus.
	  'capability' => 'edit_theme_options'
	) );

		$kemosite_wordpress_base_primary_chroma = kemosite_lum_to_hex( kemosite_hex_to_chroma( $kemosite_wordpress_base_primary_colour ) );

		$wp_customize->add_setting( 'kemosite_wordpress_footer_bg_color', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $kemosite_wordpress_base_primary_chroma,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_footer_bg_color', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Footer Background Colour', 'kemositewpblock' ),
			'section' => 'kemosite_wordpress_footer',
			'default' => $kemosite_wordpress_base_primary_chroma,
		) ) );

	/* [COMPONENT STYLE OPTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_component_styles' , array(
	  'title' => __( 'Component Styles', 'kemositewpblock' ),
	  'description' => 'Hue and saturation targets, and font options for the theme components (buttons, callout boxes, alerts, etc.).'.
	  '<br><br>'.
	  'Luminance is subject to automatic adjustment to meet an accessibility contrast minimum of 3:1.<br><br>Colours for the header, main, and footer sections of the theme are <em>not</em> set here.',
	  'priority' => 121, // After Static Front Page Options.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_component_colour', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $kemosite_wordpress_base_primary_colour,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_component_colour', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Component Colour', 'kemositewpblock' ),
			'description' => 'The colour target for all components.',
			'section' => 'kemosite_wordpress_component_styles',
			'default' => $kemosite_wordpress_base_primary_colour
		) ) );

}

add_action('customize_register','kemosite_customize_register');

/* [Output Theme Mod Options] */
function mytheme_output_mod_options_console() {

	remove_theme_mod('kemosite_wordpress_fonts_buttons');

}
add_action( 'after_setup_theme', 'mytheme_output_mod_options_console' );
