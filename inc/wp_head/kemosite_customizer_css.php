<?php

// Used in functions.php

// Include Pantone COTY history
require_once get_template_directory() . '/inc/customize_register/customize-register-coty.php'; // returns $pantone_coty_colours

function kemosite_customizer_css() {

	/**
	 * [METHOD]
	 * Retrieve values from Wordpress Presets and Customizer
	 * Wordpress functions and calculations are being executed in support of defining root CSS variables.
	 * Where feasible, these functions should be migrated to CSS functions and filters.
	 */

	/* [GLOBAL OBJECTS] */
	global $kemosite_wordpress_universal_colours;
	global $pantone_coty_colour_this_year_hex; // HEX values are needed for Wordpress defaults

	/* [GLOBAL COLOUR OPTIONS] */
	$kemosite_wordpress_cool_white = $kemosite_cool_white = $kemosite_wordpress_universal_colours['cool_white'];
	$kemosite_base_black = $kemosite_wordpress_universal_colours['base_black'];
	$kemosite_base_black_minus_blue = $kemosite_wordpress_universal_colours['base_black_minus_blue'];
	$kemosite_wordpress_base_black = $kemosite_base_black;
	$kemosite_wordpress_base_primary_colour = get_theme_mod('kemosite_wordpress_base_primary_colour', $pantone_coty_colour_this_year_hex );
	
	/* [COMPONENTS, SELECTIONS, AND SECONDARY COLOUR] */
	$kemosite_wordpress_component_colour_source = get_theme_mod( 'kemosite_wordpress_component_colour', $kemosite_wordpress_base_primary_colour );
	$kemosite_wordpress_selection_colour_source = get_theme_mod( 'kemosite_wordpress_component_colour', $pantone_coty_colour_this_year_hex );
	$kemosite_wordpress_secondary_colour_source = get_theme_mod( 'kemosite_wordpress_secondary_colour', $kemosite_base_black );

	/* [BODY COLOUR] */
	$kemosite_wordpress_body_background_color_light_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_light_mode', $kemosite_cool_white );
	$kemosite_wordpress_body_background_color_dark_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_dark_mode', $kemosite_base_black_minus_blue );

	/* [HEADER OPTIONS] */
	$kemosite_wordpress_header_bg_image = get_theme_mod('kemosite_wordpress_header_bg_image');
	$kemosite_wordpress_header_bg_image_presentation = get_theme_mod('kemosite_wordpress_header_bg_image_presentation');
	$kemosite_wordpress_header_bg_color = get_theme_mod( 'kemosite_wordpress_header_bg_color', $kemosite_wordpress_base_primary_colour );

	/* [MAIN CONTENT OPTIONS] */
		
	/* Light Mode (Default) */
	$kemosite_wordpress_main_content_bg_color_light_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_light_mode', $kemosite_cool_white );

	/* Dark Mode */
	$kemosite_wordpress_main_content_bg_color_dark_mode = get_theme_mod( 'kemosite_wordpress_main_content_bg_color_dark_mode', $kemosite_base_black_minus_blue );

	?>

	<style type="text/css">

	/*
	 * Custom Properties are ideal for working with prefers-color-scheme
	 * https://stuffandnonsense.co.uk/blog/redesigning-your-product-and-website-for-dark-mode
	 */

	/* Establish default options. Can be changed later via JavaScript */
	:root {

		--kemosite_wordpress_colour_scheme: "No Theme Preference";

		/* [GLOBAL AND SECONDARY COLOUR OPTIONS] */
		--kemosite_wordpress_cool_white: <?php echo $kemosite_wordpress_cool_white; ?>;
		--kemosite_wordpress_base_primary_colour: <?php echo $kemosite_wordpress_base_primary_colour; ?>;
		--kemosite_wordpress_base_black: <?php echo $kemosite_wordpress_base_black; ?>;
		--kemosite_wordpress_secondary_colour: <?php echo $kemosite_wordpress_secondary_colour_source; ?>;
		--kemosite_wordpress_secondary_font_colour: var(--kemosite_wordpress_base_black);
		--kemosite_wordpress_secondary_hover_colour: oklch(from var(--kemosite_wordpress_secondary_colour) 51% 100% h);

		/* [BODY COLOUR] */
		--kemosite_wordpress_body_background_color: light-dark(
			oklch( from <?php echo $kemosite_wordpress_body_background_color_light_mode; ?> l c h ), /* Light Mode */
			oklch( from <?php echo $kemosite_wordpress_body_background_color_dark_mode; ?> l c h )  /* Dark Mode */
		);
		--kemosite_wordpress_body_color: light-dark(
				var(--kemosite_wordpress_base_black), /* Light Mode */
				var(--kemosite_wordpress_cool_white) /* Dark Mode */
		);

		/* [COMPONENTS AND SELECTIONS] */
		--kemosite_wordpress_table_border_colour: <?php echo $kemosite_wordpress_base_black; ?>;
		--kemosite_wordpress_table_font_colour: <?php echo $kemosite_cool_white; ?>;
		--kemosite_wordpress_component_colour: <?php echo $kemosite_wordpress_component_colour_source; ?>;
		--kemosite_wordpress_component_font_colour: var(--kemosite_wordpress_cool_white);
		--kemosite_wordpress_component_shadow_colour: var(--kemosite_wordpress_base_black);
		--kemosite_wordpress_component_hover_colour: oklch(from var(--kemosite_wordpress_component_colour) 51% 100% h );
		--kemosite_wordpress_placeholder_color: var(--kemosite_wordpress_component_font_colour);
		--kemosite_wordpress_selection_colour: <?php echo $kemosite_wordpress_selection_colour_source; ?>;
		--kemosite_wordpress_selection_font_colour: var(--kemosite_wordpress_cool_white);
		--kemosite_wordpress_component_success_colour: oklch(from var(--kemosite_wordpress_component_colour) l c 140);
		--kemosite_wordpress_component_success_hover_colour: oklch( 51% 100% 140);
		--kemosite_wordpress_component_success_font_colour: var(--kemosite_wordpress_cool_white);
		--kemosite_wordpress_component_warning_colour: oklch(from var(--kemosite_wordpress_component_colour) l c 30);
		--kemosite_wordpress_component_warning_hover_colour: oklch( 51% 100% 30);
		--kemosite_wordpress_component_warning_font_colour: var(--kemosite_wordpress_cool_white);
		--kemosite_wordpress_component_alert_colour: oklch(from var(--kemosite_wordpress_component_colour) l c 110);
		--kemosite_wordpress_component_alert_hover_colour: oklch( 51% 100% 110);
		--kemosite_wordpress_component_alert_font_colour: var(--kemosite_wordpress_cool_white);

		/* [HEADER OPTIONS] */
		--kemosite_wordpress_header_bg_image: <?php echo $kemosite_wordpress_header_bg_image; ?>;
		--kemosite_wordpress_header_bg_color:  oklch( from <?php echo $kemosite_wordpress_header_bg_color; ?> l c h);
		--kemosite_wordpress_header_font_color: light-dark( var(--kemosite_wordpress_base_black), var(--kemosite_wordpress_cool_white) );

		/* [MAIN CONTENT OPTIONS] */
		
		/* Light Mode (Default) */
		--kemosite_wordpress_main_content_bg_color_light_mode:  <?php echo $kemosite_wordpress_main_content_bg_color_light_mode; ?>;
		--kemosite_wordpress_main_content_font_color_light_mode:  <?php echo $kemosite_base_black; ?>;

		/* Dark Mode */
		--kemosite_wordpress_main_content_bg_color_dark_mode:  <?php echo $kemosite_wordpress_main_content_bg_color_dark_mode; ?>;
		--kemosite_wordpress_main_content_font_color_dark_mode:  <?php echo $kemosite_cool_white; ?>;

		/* [FOOTER OPTIONS] */
		--kemosite_wordpress_footer_bg_color:  <?php echo $kemosite_wordpress_footer_bg_color; ?>;
		--kemosite_wordpress_footer_font_color:  <?php echo $kemosite_wordpress_footer_font_color; ?>;

	}

	@media screen and (prefers-contrast: more) and (forced-colors: none) {
		/*
		:root {
			--body-bg: #f2f2f2;
			--title-font-weight: 800;
			--body-font-weight: 500;
			--link-font-weight: 600;
		}
		*/
	}
	@media screen and (prefers-contrast: less) {
		/*
		:root {
			--body-bg: #e6e6e6;
			--body-text: #4d4d4d;
			--brand-color: #c12525;
			--brand-accent: #e6e6e6;
			--title-font-weight: 500;
			--body-font-weight: 300;
			--link-font-weight: 400;
			--outline-style: dashed; /* This custom property affects the :focus-visible global rule to create focus styles **
		}
		*/
	}

	@media (prefers-color-scheme: light) {

		:root {
			
			--kemosite_wordpress_colour_scheme: "Light Theme";
			
			/* [BODY COLOUR] */
			--kemosite_wordpress_body_background_color: oklch( from <?php echo $kemosite_wordpress_body_background_color_light_mode; ?> l c h );
			--kemosite_wordpress_body_color: var(--kemosite_wordpress_base_black);
			
			/* [HEADER OPTIONS] */
			--kemosite_wordpress_header_font_color: var(--kemosite_wordpress_base_black);

		}

	}

	@media (prefers-color-scheme: dark) {

		:root {

			--kemosite_wordpress_colour_scheme: "Dark Theme";

			/* [BODY COLOUR] */
			--kemosite_wordpress_body_background_color: oklch( from <?php echo $kemosite_wordpress_body_background_color_dark_mode; ?> l c h );
			--kemosite_wordpress_body_color: var(--kemosite_wordpress_cool_white);

			/* [HEADER OPTIONS] */
			--kemosite_wordpress_header_font_color: var(--kemosite_wordpress_cool_white);

		}

	}

	</style>

	<script>

	window.addEventListener("DOMContentLoaded", function() {

		try {


			// LCH RegEx
			let lchRegEx = /oklch\(([0-9]*\.[0-9]+) [0-9]*\.[0-9]+ [0-9]*\.[0-9]+\)/i;
			let rootVariables = getComputedStyle( document.body );

			// Body Background Colour
			let bodyBackgroundColour = rootVariables.getPropertyValue("background-color");
			let bodyBackgroundColourLCHArray = bodyBackgroundColour.match(lchRegEx);
			let bodyBackgroundColourLum = bodyBackgroundColourLCHArray[1] * 100;
			
			// Body Font Colour
			let bodyColour = bodyBackgroundColourLum >= 50 ? 'var(--kemosite_wordpress_base_black)' : 'var(--kemosite_wordpress_cool_white)';
			document.body.style.setProperty("--kemosite_wordpress_body_color", bodyColour);

			// Header Colour
			let headerBackgroundSelector = document.querySelector( "div.kemosite-grid-area-section" );
			let headerBackgroundColour = getComputedStyle( headerBackgroundSelector ).getPropertyValue("background-color");
			let headerBackgroundColourLCHArray = headerBackgroundColour.match(lchRegEx);
			let headerBackgroundColourLum = headerBackgroundColourLCHArray[1] * 100;

			// Evaluate relative luminance between Header and Body Background
			// round( ( max( $l1, $l2 ) + 5 ) / ( min( $l1, $l2 ) + 5 ), 1);
			let headerBackgroundRelativeLuminance = Math.round(
				( Math.max( bodyBackgroundColourLum, headerBackgroundColourLum ) + 5 ) / ( Math.min( bodyBackgroundColourLum, headerBackgroundColourLum ) + 5 ),
			0.1 );

			/*
			console.log( "headerBackgroundRelativeLuminance" );
			console.log(bodyBackgroundColourLum);
			console.log(headerBackgroundColourLum);
			console.log(headerBackgroundRelativeLuminance);
			*/

			// WCAG 2.1 requires a contrast ratio of at least 3:1 for graphics and user interface components (such as form input borders)
			
			// Header Font Colour
			let headerFontColour = headerBackgroundColourLum >= 50 ? 'var(--kemosite_wordpress_base_black)' : 'var(--kemosite_wordpress_cool_white)';
			document.body.style.setProperty("--kemosite_wordpress_header_font_color", headerFontColour);

		} catch(e) {

			console.log( e );

		}
		
	});

	</script>

<?php } ?>