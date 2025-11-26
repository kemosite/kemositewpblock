<?php

/* [Customizations] */
function kemosite_customize_register( $wp_customize ) {
	
	/*
	** [REMOVE UNNEEDED SECTIONS AND CONTROLS] **
	*/
	$wp_customize->remove_control("title_tagline");
	$wp_customize->remove_section("title_tagline");
	$wp_customize->remove_control("header_image"); // replaced with theme function
	$wp_customize->remove_section("header_image"); // replaced with theme function
	$wp_customize->remove_control("background_image");
	$wp_customize->remove_section("background_image");
	$wp_customize->remove_control("background_color");
	$wp_customize->remove_section("colors");
	$wp_customize->remove_section("nav_menus");
	$wp_customize->remove_section("static_front_page");
	$wp_customize->remove_section("custom_css");

}

add_action('customize_register','kemosite_customize_register');

/* [Output Theme Mod Options] */
function mytheme_output_mod_options_console() {

	remove_theme_mod('kemosite_wordpress_fonts_buttons');
	remove_theme_mod('kemosite_wordpress_base_primary_colour');
	remove_theme_mod('kemosite_wordpress_secondary_colour');
	remove_theme_mod('kemosite_wordpress_header_bg_color');
	remove_theme_mod('kemosite_wordpress_header_bg_image');
	remove_theme_mod('kemosite_wordpress_header_bg_image_presentation');
	remove_theme_mod('kemosite_wordpress_main_content_bg_color_light_mode');
	remove_theme_mod('kemosite_wordpress_main_content_bg_color_dark_mode');
	remove_theme_mod('kemosite_wordpress_component_colour');
	remove_theme_mod('kemosite_wordpress_footer_bg_color');

}
add_action( 'after_setup_theme', 'mytheme_output_mod_options_console' );
