<?php

if (!isset($kemosite_wordpress_base_primary_colour)):
	$kemosite_wordpress_base_primary_colour = get_theme_mod('kemosite_wordpress_base_primary_colour', $pantone_coty_colour_this_year_hex );
endif;

set_theme_mod( 'kemosite_wordpress_base_primary_colour', $kemosite_wordpress_base_primary_colour );

// Base Colour
$wp_customize->add_setting( 'kemosite_wordpress_base_primary_colour', array(
	'type' => 'theme_mod', // or 'option'
	'capability' => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
	'default' => $pantone_coty_colour_this_year_hex,
	'transport' => 'refresh', // or postMessage
	'sanitize_callback' => '',
	'sanitize_js_callback' => '' // Basically to_json.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_base_primary_colour', array(
	'priority' => 10, // Within the section.
	'label' => __( 'Base Colour', 'kemosite-wordpress-theme' ),
	'section' => 'kemosite_wordpress_global_colour_options',
	'description' => 'Also the Primary status colour',
	'default' => $pantone_coty_colour_this_year_hex,
) ) );

// Calculate Analogous of Primary for default secondary
$kemosite_wordpress_default_secondary_colour_hsl_source = kemosite_hex_to_hsl( $kemosite_wordpress_base_primary_colour );
$kemosite_wordpress_default_secondary_colour_hsl_source_array = explode( ",", $kemosite_wordpress_default_secondary_colour_hsl_source);

if ( $kemosite_wordpress_default_secondary_colour_hsl_source_array[0] - 30 < 0 ):
	$kemosite_wordpress_default_secondary_colour_hsl_h_adjust = 255 + ( $kemosite_wordpress_default_secondary_colour_hsl_source_array[0] - 30 );
else:
	$kemosite_wordpress_default_secondary_colour_hsl_h_adjust = $kemosite_wordpress_default_secondary_colour_hsl_source_array[0] - 30;
endif;

$kemosite_wordpress_default_secondary_colour_hsl_array = 	array(
																$kemosite_wordpress_default_secondary_colour_hsl_h_adjust,
																$kemosite_wordpress_default_secondary_colour_hsl_source_array[1],
																$kemosite_wordpress_default_secondary_colour_hsl_source_array[2],
															);
$kemosite_wordpress_default_secondary_colour_hsl = implode(",", $kemosite_wordpress_default_secondary_colour_hsl_array);

if (!isset($kemosite_wordpress_default_secondary_colour)):
	$kemosite_wordpress_default_secondary_colour = get_theme_mod('kemosite_wordpress_secondary_colour', kemosite_hsl_to_hex( $kemosite_wordpress_default_secondary_colour_hsl ) );
endif;
set_theme_mod( 'kemosite_wordpress_secondary_colour', $kemosite_wordpress_default_secondary_colour );

$wp_customize->add_setting( 'kemosite_wordpress_secondary_colour', array(
	'type' => 'theme_mod', // or 'option'
	'capability' => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
	'default' => kemosite_hsl_to_hex( $kemosite_wordpress_default_secondary_colour_hsl ),
	'transport' => 'refresh', // or postMessage
	'sanitize_callback' => '',
	'sanitize_js_callback' => '' // Basically to_json.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_secondary_colour', array(
	'priority' => 10, // Within the section.
	'label' => __( 'Secondary Colour', 'kemosite-wordpress-theme' ),
	'section' => 'kemosite_wordpress_global_colour_options',
	'description' => 'Default: Primary -30 Degrees (Analogous). See the Colour Variations panel for ideas!',
	'default' => kemosite_hsl_to_hex( $kemosite_wordpress_default_secondary_colour_hsl ),
) ) );
