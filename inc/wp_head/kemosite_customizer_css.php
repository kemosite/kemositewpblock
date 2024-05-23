<?php

// Include Pantone COTY history
require_once get_template_directory() . '/inc/customize_register/customize-register-coty.php'; // returns $pantone_coty_colours

function kemosite_customizer_css() {

	global $kemosite_wordpress_universal_colours;
	global $pantone_coty_colour_this_year_hex;

	$kemosite_wordpress_cool_white = $kemosite_cool_white = $kemosite_wordpress_universal_colours['cool_white'];
	$kemosite_base_black = $kemosite_wordpress_universal_colours['base_black'];
	$kemosite_base_black_minus_blue = $kemosite_wordpress_universal_colours['base_black_minus_blue'];

	/* [GLOBAL COLOUR OPTIONS] */
	$kemosite_wordpress_base_primary_colour = get_theme_mod('kemosite_wordpress_base_primary_colour', $pantone_coty_colour_this_year_hex );
	$kemosite_wordpress_base_primary_chroma = kemosite_lum_to_hex( kemosite_hex_to_chroma( $kemosite_wordpress_base_primary_colour ) );
	$kemosite_wordpress_base_primary_colour_lum = kemosite_hex_to_lum($kemosite_wordpress_base_primary_colour) * 100;
	$kemosite_wordpress_main_content_font_color = ( $kemosite_wordpress_base_primary_colour_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;
	$kemosite_wordpress_base_black = $kemosite_base_black;

	/* [HEADER OPTIONS] */
	$kemosite_wordpress_header_bg_image = get_theme_mod('kemosite_wordpress_header_bg_image');
	$kemosite_wordpress_header_bg_image_presentation = get_theme_mod('kemosite_wordpress_header_bg_image_presentation');
	$kemosite_wordpress_header_bg_color = get_theme_mod( 'kemosite_wordpress_header_bg_color', $kemosite_wordpress_base_primary_colour );

	$kemosite_wordpress_header_font_color = ( kemosite_hex_to_lum( $kemosite_wordpress_header_bg_color ) >= 0.5 ) ? $kemosite_base_black : $kemosite_cool_white;

	/* [MAIN CONTENT OPTIONS] */
		
	/* Light Mode (Default) */
	$kemosite_wordpress_main_content_bg_color_light_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_light_mode', $kemosite_cool_white );
	$kemosite_wordpress_main_content_bg_color_light_mode_lum = kemosite_hex_to_lum($kemosite_wordpress_main_content_bg_color_light_mode) * 100;
	$kemosite_wordpress_main_content_font_color_light_mode = ( $kemosite_wordpress_main_content_bg_color_light_mode_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	/* Dark Mode */
	$kemosite_wordpress_main_content_bg_color_dark_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_dark_mode', $kemosite_base_black_minus_blue );
	$kemosite_wordpress_main_content_bg_color_dark_mode_lum = kemosite_hex_to_lum($kemosite_wordpress_main_content_bg_color_dark_mode) * 100;
	$kemosite_wordpress_main_content_font_color_dark_mode = ( $kemosite_wordpress_main_content_bg_color_dark_mode_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	/* [PRODUCT COLUMNS] */
	/*
	if (is_plugin_active('woocommerce/woocommerce.php')):
		$thumbnail_column_count = esc_attr( wc_get_loop_prop( 'columns' ) );
		$thumbnail_column_width = 100 / $thumbnail_column_count;
		$set_column_margin = 1; // %
		$set_column_width = $thumbnail_column_width - ($set_column_margin * 2);
		$set_double_column_width = ($thumbnail_column_width * 2) - ($set_column_margin * 2);
		$set_full_column_width = 100 - ($set_column_margin * 2);

		?>

		<style type="text/css">

			:root {

				--set_column_margin: <?php echo $set_column_margin; ?>%;
				--set_column_width: <?php echo $set_column_width; ?>%;
				--set_double_column_width: <?php echo $set_double_column_width; ?>%;
				--set_full_column_width: <?php echo $set_full_column_width; ?>%;

			}

		</style>

		<?php

	endif;
	*/

	/* [FOOTER OPTIONS] */
	$kemosite_wordpress_footer_bg_color = get_theme_mod( 'kemosite_wordpress_footer_bg_color', $kemosite_wordpress_base_primary_chroma );
	$kemosite_wordpress_footer_font_color = ( kemosite_hex_to_lum( $kemosite_wordpress_footer_bg_color ) >= 0.5 ) ? $kemosite_base_black : $kemosite_cool_white;

	/* [LASTLY: COMPONENT STYLES, AUTOMATICALLY CONTRAST-ADJUSTED] */
	
	// Selection Colour

	$kemosite_wordpress_selection_colour_source = get_theme_mod( 'kemosite_wordpress_component_colour', $kemosite_wordpress_base_primary_chroma );
	$kemosite_wordpress_selection_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_selection_colour_source );
	$kemosite_wordpress_selection_colour_source_hsl_array = explode( ",", $kemosite_wordpress_selection_colour_source_hsl );
	$kemosite_wordpress_selection_colour_source_lum = kemosite_hex_to_lum($kemosite_wordpress_selection_colour_source) * 100;
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_selection_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_selection_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_selection_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_selection_colour_dark_mode = $kemosite_wordpress_selection_colour_light_mode = $kemosite_wordpress_selection_colour_source;
	$kemosite_wordpress_selection_font_colour_dark_mode = $kemosite_wordpress_selection_font_colour_light_mode = ( $kemosite_wordpress_selection_colour_source_lum >= 50) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_selection_colour_source_bg_contrast_light_mode < 3 || $kemosite_wordpress_selection_colour_source_bg_contrast_light_mode > 4.5):

		$kemosite_wordpress_selection_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_selection_colour_source_lum, 3 );

		$kemosite_wordpress_selection_colour_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_selection_colour_source_hsl_array,
			$kemosite_wordpress_selection_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_selection_colour_source_lum
		);

		$kemosite_wordpress_selection_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_selection_colour_hsl_light_mode );
		$kemosite_wordpress_selection_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_selection_colour_light_mode) * 100;
		$kemosite_wordpress_selection_font_colour_light_mode = ( $kemosite_wordpress_selection_colour_lum_light_mode >= 50) ? $kemosite_base_black : $kemosite_cool_white;
		
	endif; if ( $kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode < 3 || $kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode > 4.5 ):

		$kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_selection_colour_source_lum, 3 );
		
		$kemosite_wordpress_selection_colour_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_selection_colour_source_hsl_array,
			$kemosite_wordpress_selection_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_selection_colour_source_lum
		);

		$kemosite_wordpress_selection_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_selection_colour_hsl_dark_mode );
		$kemosite_wordpress_selection_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_selection_colour_dark_mode) * 100;
		$kemosite_wordpress_selection_font_colour_dark_mode = ( $kemosite_wordpress_selection_colour_lum_dark_mode >= 50) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	// Component Colour

	$kemosite_wordpress_component_colour_source = get_theme_mod( 'kemosite_wordpress_component_colour', $kemosite_wordpress_base_primary_colour );
	$kemosite_wordpress_component_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_component_colour_source );
	$kemosite_wordpress_component_colour_source_hsl_array = explode( ",", $kemosite_wordpress_component_colour_source_hsl );
	$kemosite_wordpress_component_hover_colour_source_hsl = "$kemosite_wordpress_component_colour_source_hsl_array[0], 100, 51";
	$kemosite_wordpress_component_colour_source_lum = round( kemosite_hex_to_lum($kemosite_wordpress_component_colour_source) * 100 );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_colour_dark_mode = $kemosite_wordpress_component_colour_light_mode = $kemosite_wordpress_component_colour_source;
	$kemosite_wordpress_component_font_colour_dark_mode = $kemosite_wordpress_component_font_colour_light_mode = ( $kemosite_wordpress_component_colour_source_lum >= 50) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_colour_source_bg_contrast_light_mode < 4.5 ):

		$kemosite_wordpress_component_colour_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_colour_source_hsl_array,
			$kemosite_wordpress_component_colour_source_bg_contrast_light_mode,
			4.5,
			$kemosite_wordpress_component_colour_source_lum
		);

		$kemosite_wordpress_component_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_colour_hsl_light_mode );
		$kemosite_wordpress_component_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_colour_light_mode) * 100;
		$kemosite_wordpress_component_font_colour_light_mode = ( $kemosite_wordpress_component_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_colour_source_bg_contrast_dark_mode < 4.5 ):

		$kemosite_wordpress_component_colour_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_colour_source_hsl_array,
			$kemosite_wordpress_component_colour_source_bg_contrast_dark_mode,
			4.5,
			$kemosite_wordpress_component_colour_source_lum
		);

		$kemosite_wordpress_component_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_colour_hsl_dark_mode );
		$kemosite_wordpress_component_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_colour_dark_mode) * 100;
		$kemosite_wordpress_component_font_colour_dark_mode = ( $kemosite_wordpress_component_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	$kemosite_wordpress_component_hover_colour = kemosite_hsl_to_hex( $kemosite_wordpress_component_hover_colour_source_hsl );



	// Secondary Colour

	$kemosite_wordpress_secondary_colour_source = get_theme_mod( 'kemosite_wordpress_secondary_colour', $kemosite_base_black );
	$kemosite_wordpress_secondary_colour_source_hsl = kemosite_hex_to_hsl( $kemosite_wordpress_secondary_colour_source );
	$kemosite_wordpress_secondary_colour_source_hsl_array = explode( ",", $kemosite_wordpress_secondary_colour_source_hsl );
	$kemosite_wordpress_secondary_hover_colour_source_hsl = "$kemosite_wordpress_secondary_colour_source_hsl_array[0], 100, 51";
	$kemosite_wordpress_secondary_colour_source_lum = kemosite_hex_to_lum($kemosite_wordpress_secondary_colour_source) * 100;

	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_secondary_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_secondary_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_secondary_colour_light_mode = $kemosite_wordpress_secondary_colour_dark_mode = $kemosite_wordpress_secondary_colour_source;
	$kemosite_wordpress_secondary_font_colour_light_mode = $kemosite_wordpress_secondary_font_colour_dark_mode = ( $kemosite_wordpress_secondary_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode < 3):

		$kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_secondary_colour_source_lum, 3 );

		$kemosite_wordpress_secondary_colour_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_secondary_colour_source_hsl_array,
			$kemosite_wordpress_secondary_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_secondary_colour_source_lum
		);

		$kemosite_wordpress_secondary_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_secondary_colour_hsl_light_mode );
		$kemosite_wordpress_secondary_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_secondary_colour_light_mode) * 100;
		$kemosite_wordpress_secondary_font_colour_light_mode = ( $kemosite_wordpress_secondary_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode < 3 ):

		$kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_secondary_colour_source_lum, 3 );
		
		$kemosite_wordpress_secondary_colour_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_secondary_colour_source_hsl_array,
			$kemosite_wordpress_secondary_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_secondary_colour_source_lum
		);

		$kemosite_wordpress_secondary_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_secondary_colour_hsl_dark_mode );
		$kemosite_wordpress_secondary_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_secondary_colour_dark_mode) * 100;
		$kemosite_wordpress_secondary_font_colour_dark_mode = ( $kemosite_wordpress_secondary_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	$kemosite_wordpress_secondary_hover_colour = kemosite_hsl_to_hex( $kemosite_wordpress_secondary_hover_colour_source_hsl );

	// Success, Warning, and Alert Colours
	
	// Success
	$kemosite_wordpress_component_success_colour_source_hsl_array 	= 	array( 
																			120,
																			$kemosite_wordpress_component_colour_source_hsl_array[1],
																			$kemosite_wordpress_component_colour_source_hsl_array[2]
																		);
	$kemosite_wordpress_component_success_colour_source_hsl = implode( ",", $kemosite_wordpress_component_success_colour_source_hsl_array );
	$kemosite_wordpress_component_success_hover_colour_source_hsl = "$kemosite_wordpress_component_success_colour_source_hsl_array[0], 100, 51";
	$kemosite_wordpress_component_success_colour_source_rgb = kemosite_hsl_to_rgb( $kemosite_wordpress_component_success_colour_source_hsl );
	$kemosite_wordpress_component_success_colour_source_lum = kemosite_rgb_to_lum( $kemosite_wordpress_component_success_colour_source_rgb );
	$kemosite_wordpress_component_success_colour_source = kemosite_rgb_to_hex( $kemosite_wordpress_component_success_colour_source_rgb );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_success_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_success_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_success_colour_light_mode = $kemosite_wordpress_component_success_colour_dark_mode = $kemosite_wordpress_component_success_colour_source;
	$kemosite_wordpress_component_success_colour_lum_light_mode = $kemosite_wordpress_component_success_colour_lum_dark_mode = ( $kemosite_wordpress_component_success_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	// Root CSS Colour
	$kemosite_wordpress_component_success_font_colour_root = ( $kemosite_wordpress_component_success_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode < 3 ):

		$kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_success_colour_source_lum, 3 );

		$kemosite_wordpress_component_success_colour_source_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_success_colour_source_hsl_array,
			$kemosite_wordpress_component_success_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_component_success_colour_source_lum
		);

		$kemosite_wordpress_component_success_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_success_colour_source_hsl_light_mode );
		$kemosite_wordpress_component_success_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_success_colour_light_mode) * 100;
		$kemosite_wordpress_component_success_font_colour_light_mode = ( $kemosite_wordpress_component_success_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode < 3):

		$kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_success_colour_source_lum, 3 );

		$kemosite_wordpress_component_success_colour_source_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_success_colour_source_hsl_array,
			$kemosite_wordpress_component_success_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_component_success_colour_source_lum
		);

		$kemosite_wordpress_component_success_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_success_colour_source_hsl_dark_mode );
		$kemosite_wordpress_component_success_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_success_colour_dark_mode) * 100;
		$kemosite_wordpress_component_success_font_colour_dark_mode = ( $kemosite_wordpress_component_success_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	$kemosite_wordpress_component_success_hover_colour = kemosite_hsl_to_hex( $kemosite_wordpress_component_success_hover_colour_source_hsl );

	// Warning
	$kemosite_wordpress_component_warning_colour_source_hsl_array =	array( 
																	60,
																	$kemosite_wordpress_component_colour_source_hsl_array[1],
																	$kemosite_wordpress_component_colour_source_hsl_array[2]
																);
	$kemosite_wordpress_component_warning_colour_source_hsl = implode( ",", $kemosite_wordpress_component_warning_colour_source_hsl_array );
	$kemosite_wordpress_component_warning_hover_colour_source_hsl = "$kemosite_wordpress_component_warning_colour_source_hsl_array[0], 100, 51";
	$kemosite_wordpress_component_warning_colour_source_rgb = kemosite_hsl_to_rgb( $kemosite_wordpress_component_warning_colour_source_hsl );
	$kemosite_wordpress_component_warning_colour_source_lum = kemosite_rgb_to_lum( $kemosite_wordpress_component_warning_colour_source_rgb );
	$kemosite_wordpress_component_warning_colour_source = kemosite_rgb_to_hex( $kemosite_wordpress_component_warning_colour_source_rgb );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_warning_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_warning_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_warning_colour_light_mode = $kemosite_wordpress_component_warning_colour_dark_mode = $kemosite_wordpress_component_warning_colour_source;
	$kemosite_wordpress_component_warning_colour_lum_light_mode = $kemosite_wordpress_component_warning_colour_lum_dark_mode = ( $kemosite_wordpress_component_warning_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;
	$kemosite_wordpress_component_warning_font_colour_light_mode = ( $kemosite_wordpress_component_warning_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	// Root CSS Colour
	$kemosite_wordpress_component_warning_font_colour_root = ( $kemosite_wordpress_component_warning_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode < 3 ):

		$kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_warning_colour_source_lum, 3 );

		$kemosite_wordpress_component_warning_colour_source_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_warning_colour_source_hsl_array,
			$kemosite_wordpress_component_warning_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_component_warning_colour_source_lum
		);

		$kemosite_wordpress_component_warning_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_warning_colour_source_hsl_light_mode );
		$kemosite_wordpress_component_warning_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_warning_colour_light_mode) * 100;
		$kemosite_wordpress_component_warning_font_colour_light_mode = ( $kemosite_wordpress_component_warning_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode < 3):

		$kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_warning_colour_source_lum, 3 );

		$kemosite_wordpress_component_warning_colour_source_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_warning_colour_source_hsl_array,
			$kemosite_wordpress_component_warning_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_component_warning_colour_source_lum
		);

		$kemosite_wordpress_component_warning_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_warning_colour_source_hsl_dark_mode );
		$kemosite_wordpress_component_warning_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_warning_colour_dark_mode) * 100;
		$kemosite_wordpress_component_warning_font_colour_dark_mode = ( $kemosite_wordpress_component_warning_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	$kemosite_wordpress_component_warning_hover_colour = kemosite_hsl_to_hex( $kemosite_wordpress_component_warning_hover_colour_source_hsl );

	// Alert
	$kemosite_wordpress_component_alert_colour_source_hsl_array =	array( 
																	0,
																	$kemosite_wordpress_component_colour_source_hsl_array[1],
																	$kemosite_wordpress_component_colour_source_hsl_array[2]
																);
	$kemosite_wordpress_component_alert_colour_source_hsl = implode( ",", $kemosite_wordpress_component_alert_colour_source_hsl_array );
	$kemosite_wordpress_component_alert_hover_colour_source_hsl = "$kemosite_wordpress_component_alert_colour_source_hsl_array[0], 100, 51";
	$kemosite_wordpress_component_alert_colour_source_rgb = kemosite_hsl_to_rgb( $kemosite_wordpress_component_alert_colour_source_hsl );
	$kemosite_wordpress_component_alert_colour_source_lum = kemosite_rgb_to_lum( $kemosite_wordpress_component_alert_colour_source_rgb );
	$kemosite_wordpress_component_alert_colour_source = kemosite_rgb_to_hex( $kemosite_wordpress_component_alert_colour_source_rgb );
	
	// Calculate contrast for selection colour again main background
	$kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_alert_colour_source_lum, $kemosite_wordpress_main_content_bg_color_light_mode_lum
	);
	$kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode = kemosite_calc_contrast(
		$kemosite_wordpress_component_alert_colour_source_lum, $kemosite_wordpress_main_content_bg_color_dark_mode_lum
	);

	$kemosite_wordpress_component_alert_colour_light_mode = $kemosite_wordpress_component_alert_colour_dark_mode = $kemosite_wordpress_component_alert_colour_source;
	$kemosite_wordpress_component_alert_colour_lum_light_mode = $kemosite_wordpress_component_alert_colour_lum_dark_mode = ( $kemosite_wordpress_component_alert_colour_source_lum >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	$kemosite_wordpress_component_alert_font_colour_root = ( $kemosite_wordpress_component_alert_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	if ( $kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode < 3 ):

		$kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_alert_colour_source_lum, 3 );

		$kemosite_wordpress_component_alert_colour_source_hsl_light_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_alert_colour_source_hsl_array,
			$kemosite_wordpress_component_alert_colour_source_bg_contrast_light_mode,
			3,
			$kemosite_wordpress_component_alert_colour_source_lum
		);

		$kemosite_wordpress_component_alert_colour_light_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_alert_colour_source_hsl_light_mode );
		$kemosite_wordpress_component_alert_colour_lum_light_mode = kemosite_hex_to_lum($kemosite_wordpress_component_alert_colour_light_mode) * 100;
		$kemosite_wordpress_component_alert_font_colour_light_mode = ( $kemosite_wordpress_component_alert_colour_lum_light_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif; if ( $kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode < 3):

		$kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode_contrast_ratio = kemosite_adjust_contrast( $kemosite_wordpress_component_alert_colour_source_lum, 3 );

		$kemosite_wordpress_component_alert_colour_source_hsl_dark_mode = kemosite_adjust_hsl_l_contrast(
			$kemosite_wordpress_component_alert_colour_source_hsl_array,
			$kemosite_wordpress_component_alert_colour_source_bg_contrast_dark_mode,
			3,
			$kemosite_wordpress_component_alert_colour_source_lum
		);

		$kemosite_wordpress_component_alert_colour_dark_mode = kemosite_hsl_to_hex( $kemosite_wordpress_component_alert_colour_source_hsl_dark_mode );
		$kemosite_wordpress_component_alert_colour_lum_dark_mode = kemosite_hex_to_lum($kemosite_wordpress_component_alert_colour_dark_mode) * 100;
		$kemosite_wordpress_component_alert_font_colour_dark_mode = ( $kemosite_wordpress_component_alert_colour_lum_dark_mode >= 50 ) ? $kemosite_base_black : $kemosite_cool_white;

	endif;

	$kemosite_wordpress_component_alert_hover_colour = kemosite_hsl_to_hex( $kemosite_wordpress_component_alert_hover_colour_source_hsl );

	?>

	<style type="text/css">	

	<?php // KEEP get_theme_mod OUT OF HERE. ECHO DEFINED VARIABLES ONLY. ?>

	:root {

		/* [GLOBAL COLOUR OPTIONS] */
		--kemosite_wordpress_cool_white: <?php echo $kemosite_cool_white; ?>;
		--kemosite_wordpress_base_primary_colour: <?php echo $kemosite_wordpress_base_primary_colour; ?>;
		--kemosite_wordpress_base_black: <?php echo $kemosite_wordpress_base_black; ?>;

		/* [HEADER OPTIONS] */
		--kemosite_wordpress_header_bg_image: <?php echo $kemosite_wordpress_header_bg_image; ?>;
		--kemosite_wordpress_header_bg_color:  <?php echo $kemosite_wordpress_header_bg_color; ?>;
		--kemosite_wordpress_header_font_color:  <?php echo $kemosite_wordpress_header_font_color; ?>;

		/* [MAIN CONTENT OPTIONS] */
		
		/* Light Mode (Default) */
		--kemosite_wordpress_main_content_bg_color_light_mode:  <?php echo $kemosite_wordpress_main_content_bg_color_light_mode; ?>;
		--kemosite_wordpress_main_content_font_color_light_mode:  <?php echo $kemosite_wordpress_main_content_font_color_light_mode; ?>;

		/* Dark Mode */
		--kemosite_wordpress_main_content_bg_color_dark_mode:  <?php echo $kemosite_wordpress_main_content_bg_color_dark_mode; ?>;
		--kemosite_wordpress_main_content_font_color_dark_mode:  <?php echo $kemosite_wordpress_main_content_font_color_dark_mode; ?>;

		/* [FOOTER OPTIONS] */
		--kemosite_wordpress_footer_bg_color:  <?php echo $kemosite_wordpress_footer_bg_color; ?>;
		--kemosite_wordpress_footer_font_color:  <?php echo $kemosite_wordpress_footer_font_color; ?>;
	}

	/*
	 * Custom Properties are ideal for working with prefers-color-scheme
	 * https://stuffandnonsense.co.uk/blog/redesigning-your-product-and-website-for-dark-mode
	 */

	/* No preferences */
	:root {
		--kemosite_wordpress_colour_scheme: "no preference (light)";
		--kemosite_wordpress_body_background_color: <?php echo $kemosite_wordpress_main_content_bg_color_light_mode; ?>;
		--kemosite_wordpress_body_color: <?php echo $kemosite_wordpress_main_content_font_color_light_mode; ?>;
		--kemosite_wordpress_placeholder_color: <?php echo $kemosite_wordpress_component_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;

		/* [LASTLY: COMPONENT STYLES, AUTOMATICALLY CONTRAST-ADJUSTED] */		
		--kemosite_wordpress_selection_colour: <?php echo $kemosite_wordpress_selection_colour_light_mode; ?>;
		--kemosite_wordpress_selection_font_colour: <?php echo $kemosite_wordpress_selection_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_colour: <?php echo $kemosite_wordpress_component_colour_light_mode; ?>;
		--kemosite_wordpress_component_hover_colour: <?php echo $kemosite_wordpress_component_hover_colour; ?>;
		--kemosite_wordpress_component_font_colour: <?php echo $kemosite_wordpress_component_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;
		--kemosite_wordpress_secondary_colour: <?php echo $kemosite_wordpress_secondary_colour_light_mode; ?>;
		--kemosite_wordpress_secondary_hover_colour: <?php echo $kemosite_wordpress_secondary_hover_colour; ?>;
		--kemosite_wordpress_secondary_font_colour: <?php echo $kemosite_wordpress_secondary_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_success_colour: <?php echo $kemosite_wordpress_component_success_colour_light_mode; ?>;
		--kemosite_wordpress_component_success_hover_colour: <?php echo $kemosite_wordpress_component_success_hover_colour; ?>;
		--kemosite_wordpress_component_success_font_colour: <?php echo $kemosite_wordpress_component_success_font_colour_root; ?>;
		--kemosite_wordpress_component_warning_colour: <?php echo $kemosite_wordpress_component_warning_colour_light_mode; ?>;
		--kemosite_wordpress_component_warning_hover_colour: <?php echo $kemosite_wordpress_component_warning_hover_colour; ?>;
		--kemosite_wordpress_component_warning_font_colour: <?php echo $kemosite_wordpress_component_warning_font_colour_light_mode; ?>;
		--kemosite_wordpress_component_alert_colour: <?php echo $kemosite_wordpress_component_alert_colour_light_mode; ?>;
		--kemosite_wordpress_component_alert_hover_colour: <?php echo $kemosite_wordpress_component_alert_hover_colour; ?>;
		--kemosite_wordpress_component_alert_font_colour: <?php echo $kemosite_wordpress_component_alert_font_colour_root; ?>;
		--kemosite_wordpress_table_border_colour: <?php echo $kemosite_wordpress_base_black; ?>;
		--kemosite_wordpress_table_font_colour: <?php echo $kemosite_cool_white; ?>;
	}

	@media (prefers-color-scheme: light) {

		:root {
			--kemosite_wordpress_colour_scheme: "light";
		}

	}

	@media (prefers-color-scheme: dark) {

		:root {
			--kemosite_wordpress_colour_scheme: "dark";
			--kemosite_wordpress_body_background_color: <?php echo $kemosite_wordpress_main_content_bg_color_dark_mode; ?>;
			--kemosite_wordpress_body_color: <?php echo $kemosite_wordpress_main_content_font_color_dark_mode; ?>;
			--kemosite_wordpress_placeholder_color: <?php echo $kemosite_wordpress_component_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;
			--footer-background-color: hsl(0, 0%, 15%);

			/* [LASTLY: COMPONENT STYLES, AUTOMATICALLY CONTRAST-ADJUSTED] */		
			--kemosite_wordpress_selection_colour: <?php echo $kemosite_wordpress_selection_colour_dark_mode; ?>;
			--kemosite_wordpress_selection_font_colour: <?php echo $kemosite_wordpress_selection_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_colour: <?php echo $kemosite_wordpress_component_colour_dark_mode; ?>;
			--kemosite_wordpress_component_hover_colour: <?php echo $kemosite_wordpress_component_hover_colour; ?>;
			--kemosite_wordpress_component_font_colour: <?php echo $kemosite_wordpress_component_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_shadow_colour: <?php echo $kemosite_wordpress_base_black; ?>;
			--kemosite_wordpress_secondary_colour: <?php echo $kemosite_wordpress_secondary_colour_dark_mode; ?>;
			--kemosite_wordpress_secondary_font_colour: <?php echo $kemosite_wordpress_secondary_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_success_colour: <?php echo $kemosite_wordpress_component_success_colour_dark_mode; ?>;
			--kemosite_wordpress_component_success_font_colour: <?php echo $kemosite_wordpress_component_success_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_warning_colour: <?php echo $kemosite_wordpress_component_warning_colour_dark_mode; ?>;
			--kemosite_wordpress_component_warning_font_colour: <?php echo $kemosite_wordpress_component_warning_font_colour_dark_mode; ?>;
			--kemosite_wordpress_component_alert_colour: <?php echo $kemosite_wordpress_component_alert_colour_dark_mode; ?>;
			--kemosite_wordpress_component_alert_font_colour: <?php echo $kemosite_wordpress_component_alert_font_colour_dark_mode; ?>;
		}

	}

	.background.kemosite_wordpress_base_primary_colour {
		background-color: var(--kemosite_wordpress_base_primary_colour);
		color:  var(--kemosite_wordpress_main_content_font_color);
	}
	.background.kemosite_wordpress_base_black {
		background-color: var(--kemosite_wordpress_base_black);
		color:  white;
	}

	<?php if ( !is_null( $kemosite_wordpress_header_bg_image ) ): ?>
	div.kemosite-grid-area-section { 
		background-image: url(<?php echo $kemosite_wordpress_header_bg_image; ?>);
		background-position: center; /* Center the image */
		background-repeat: no-repeat; /* Do not repeat the image */
		background-size: cover; /* Resize the background image to cover the entire container */
		<?php if ( $kemosite_wordpress_header_bg_image_presentation == "duotone"): ?>background-blend-mode: luminosity;<?php endif; ?>
	}
	<?php endif; ?>

	</style>

<?php } ?>