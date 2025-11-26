function kemosite_calc_contrast( lum1, lum2 = 100 ) { // Assume lum2 is white, 100% luminance, unless specified differently.

		// https://www.w3.org/TR/WCAG20/
		return Math.round(
			( Math.max( lum1, lum2 ) + 5 ) / ( Math.min( lum1, lum2 ) + 5 ),
		0.1 ) // Minimum 4.5 / 7

}

function kemosite_adjust_contrast( eval_contrast = "", target_contrast = 3 ) {

	/*
	[CONTRAST INTENT]
	
	- Graphical Objects and User Interface Components, WCAG AA: 3:1
	
	- Large Text, WCAG AA: 3:1
	- Large Text, WCAG AAA: 4.5:1
	(Large text is defined as 14 point (typically 18.66px) and bold or larger, or 18 point (typically 24px) or larger.)

	- Normal Text, WCAG AA: 4.5:1
	- Normal Text, WCAG AAA: 7:1

	*/

	/*
	- Actual (Eval)
	- Target
	- Difference
	- Apply correction to LUMINANCE
	*/

	// The contrasts are DELTAS in their own right. We're trying to adjust the delta. How much delta are we keeping or removing?

	let contrast_delta = Math.max( eval_contrast, target_contrast ) - Math.min( eval_contrast, target_contrast );
	return contrast_delta / 20; // #000 to #FFF is 21:1; 21:1 -> 1:1 is 20 incremental steps.

}

function kemosite_adjust_lum_contrast( eval_contrast = "", target_contrast = 3, source_luminance = 100, background_luminance = 0 ) {

	let contrast_adjustment_ratio = kemosite_adjust_contrast( eval_contrast, target_contrast); // Ratio of 20 incremental steps from 1:1 to 21:1
	source_luminance = Math.round( source_luminance );
	background_luminance = Math.round( background_luminance );
	let lum_delta = 100 - source_luminance;

	/*
	if source_luminance > background_luminance, dark background, brighten result
	if source_luminance < background_luminance, light background, darken result
	*/

	let l = "";

	// Adjustment depends on whether we're adding or removing contrast from a darker or lighter colour!!
	if (
		source_luminance >= background_luminance // element is the same or brighter luminance than darker background. Make brighter to increase contrast.
	) {

		let delta_adjustment = lum_delta * contrast_adjustment_ratio;
		l = source_luminance + delta_adjustment;

	} else if ( 
		source_luminance < background_luminance // element is darker luminance than brighter background. Make darker to increase contrast.
	) {

		let delta_adjustment = lum_delta * contrast_adjustment_ratio;
		l = source_luminance - delta_adjustment;

	}

	return l;

}

window.addEventListener("DOMContentLoaded", function() {

	try {

		// LCH RegEx
		// let lchRegEx = /oklch\(([0-9]*\.[0-9]+) [0-9]*\.[0-9]+ [0-9]*\.[0-9]+\)/i;
		let lchRegEx = /oklch\(([0-9]*(?:[.0-9]+)) [0-9]*(?:[.0-9]+) [0-9]*(?:[.0-9]+)\)/i;
		let rootVariables = document.documentElement;
		let bodyVariables = getComputedStyle( document.body );

		// Body Background Colour
		let bodyBackgroundColour = bodyVariables.getPropertyValue("background-color");
		let bodyBackgroundColourLCHArray = bodyBackgroundColour.match(lchRegEx);
		let bodyBackgroundColourLum = bodyBackgroundColourLCHArray[1] * 100;
		
		// Body Font Colour
		let bodyColour = bodyBackgroundColourLum >= 50 ? 'var(--kemosite-base-black)' : 'var(--kemosite-cool-white)';
		document.body.style.setProperty("--kemosite_wordpress_body_color", bodyColour);

		// Header Colour
		let headerBackgroundSelector = document.querySelector( "div.kemosite-grid-area-section" );
		let headerBackgroundColour = getComputedStyle( headerBackgroundSelector ).getPropertyValue("background-color");
		headerBackgroundSelector.setAttribute('style', 'background-color: oklch( from ' + headerBackgroundColour + ' l c h) !important');
		let lchHeaderBackgroundColour = getComputedStyle( headerBackgroundSelector ).getPropertyValue("background-color");
		let headerBackgroundColourLCHArray = lchHeaderBackgroundColour.match(lchRegEx);
		let headerBackgroundColourLum = headerBackgroundColourLCHArray[1] * 100;
		
		// Header Font Colour
		let headerFontColour = headerBackgroundColourLum >= 50 ? 'var(--kemosite-base-black)' : 'var(--kemosite-cool-white)';
		document.body.style.setProperty("--kemosite_wordpress_header_font_color", headerFontColour);

		// Evaluate relative luminance between Header and Body Background
		// round( ( max( $l1, $l2 ) + 5 ) / ( min( $l1, $l2 ) + 5 ), 1);
		let headerBackgroundRelativeLuminance = kemosite_calc_contrast( bodyBackgroundColourLum, headerBackgroundColourLum );

		// WCAG 2.1 requires a contrast ratio of at least 3:1 for graphics and user interface components (such as form input borders)

		// If headerBackgroundRelativeLuminance < 3, make adjustments.
		if ( headerBackgroundRelativeLuminance < 3 ) {

			let adjust_lum = kemosite_adjust_lum_contrast(
				headerBackgroundRelativeLuminance,
				3,
				headerBackgroundColourLum,
				bodyBackgroundColourLum
			) / 100;

			// When new value determined, overwrite existing
			headerBackgroundSelector.setAttribute('style', 'background-color: oklch( from ' + headerBackgroundColour + ' ' + adjust_lum + ' c h) !important');

		}

		// Footer Colour
		let footerBackgroundSelector = document.querySelector( "div.kemosite-grid-area-footer" );
		let footerBackgroundColour = getComputedStyle( footerBackgroundSelector ).getPropertyValue("background-color");
		let footerBackgroundColourLCHArray = footerBackgroundColour.match(lchRegEx);
		let footerBackgroundColourLum = footerBackgroundColourLCHArray[1] * 100;

		// Footer Font Colour
		let footerFontColour = footerBackgroundColourLum >= 50 ? 'var(--kemosite-base-black)' : 'var(--kemosite-cool-white)';
		document.body.style.setProperty("--kemosite_wordpress_footer_font_color", footerFontColour);

		// Primary Colour via Swatch
		let primaryBackgroundSelector = document.querySelector( "div.swatch-kemosite-wordpress-base-primary-colour" );
		let lchPrimaryBackgroundColour = getComputedStyle( primaryBackgroundSelector ).getPropertyValue("background-color");
		let primaryBackgroundColourLCHArray = lchPrimaryBackgroundColour.match(lchRegEx);
		let primaryBackgroundColourLum = primaryBackgroundColourLCHArray[1] * 100;

		// Evaluate relative luminance between Primary and Body Background
		// round( ( max( $l1, $l2 ) + 5 ) / ( min( $l1, $l2 ) + 5 ), 1);
		let primaryBackgroundRelativeLuminance = kemosite_calc_contrast( bodyBackgroundColourLum, primaryBackgroundColourLum );

		// If primaryBackgroundRelativeLuminance < 4.5, make adjustments.
		if ( primaryBackgroundRelativeLuminance < 4.5 ) {

			let adjust_lum = kemosite_adjust_lum_contrast(
				primaryBackgroundRelativeLuminance,
				4.5,
				primaryBackgroundColourLum,
				bodyBackgroundColourLum
			) / 100;

			// When new value determined, overwrite existing
			rootVariables.style.setProperty("--kemosite_wordpress_base_primary_colour", "oklch( from " + lchPrimaryBackgroundColour + " " + adjust_lum + " c h)");

		}

		// Secondary Colour via Swatch
		let secondaryBackgroundSelector = document.querySelector( "div.swatch-kemosite-wordpress-secondary-colour" );
		let lchSecondaryBackgroundColour = getComputedStyle( secondaryBackgroundSelector ).getPropertyValue("background-color");
		let secondaryBackgroundColourLCHArray = lchSecondaryBackgroundColour.match(lchRegEx);
		let secondaryBackgroundColourLum = secondaryBackgroundColourLCHArray[1] * 100;

		// Evaluate relative luminance between Primary and Body Background
		// round( ( max( $l1, $l2 ) + 5 ) / ( min( $l1, $l2 ) + 5 ), 1);
		let secondaryBackgroundRelativeLuminance = kemosite_calc_contrast( bodyBackgroundColourLum, secondaryBackgroundColourLum );

		// If primaryBackgroundRelativeLuminance < 4.5, make adjustments.
		if ( secondaryBackgroundRelativeLuminance < 4.5 ) {

			let adjust_lum = kemosite_adjust_lum_contrast(
				secondaryBackgroundRelativeLuminance,
				4.5,
				secondaryBackgroundColourLum,
				bodyBackgroundColourLum
			) / 100;

			// When new value determined, overwrite existing
			rootVariables.style.setProperty("--kemosite_wordpress_secondary_colour", "oklch( from " + lchSecondaryBackgroundColour + " " + adjust_lum + " c h)");

		}

	} catch(e) {

		console.log( e );

	}
	
});