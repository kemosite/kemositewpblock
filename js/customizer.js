/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function() {

	// Wait until the customizer has finished loading.
	wp.customize.bind( 'ready', function() {

		/*
		** [SITE IDENTITY] **
		*/
		
		// Don't bother updating items that are (basically) hidden

		/*
		** [BASE COLOUR OPTIONS] **
		*/

		/*
		wp.customize( 'kemosite_wordpress_base_primary_colour_preselect', function( value ) {
			value.bind( function( to ) {
				// $( 'head title' ).text( to );
				wp.customize.control( 'kemosite_wordpress_base_primary_colour_preselect_display' ).default( kemosite_rgbToHex( to ) );
			} );
		}
		*/

		
		wp.customize( 'blogname', function( value ) {
			value.bind( function( to ) {
				$( 'head title' ).text( to );
			} );
		}
		

		/*
		wp.customize( 'blogdescription', function( value ) {
			value.bind( function( to ) {
				$( '.site-description' ).text( to );
			} );
		} );
		*/

		// Header text color.
		/*wp.customize( 'header_textcolor', function( value ) {
			value.bind( function( to ) {
				if ( 'blank' === to ) {
					$( '.site-title, .site-description' ).css( {
						'clip': 'rect(1px, 1px, 1px, 1px)',
						'position': 'absolute'
					} );
				} else {
					$( '.site-title, .site-description' ).css( {
						'clip': 'auto',
						'position': 'relative'
					} );
					$( '.site-title a, .site-description' ).css( {
						'color': to
					} );
				}
			} );
		} );
		*/

	} );

}() );