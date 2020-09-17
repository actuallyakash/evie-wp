/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.navbar__logo' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site__description' ).text( to );
		} );
	} );

	// Logo Resize
	wp.customize( 'logo_size', function( value ) {
		value.bind( function( to ) {
			$( '.navbar__inner .custom__logo' ).css({ 'width': to, 'height': to });
		} );
	} );


	/**
	 * Color Controls
	 */

	wp.customize( 'secondary_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--secondary_color', val );
		});
	});

	wp.customize( 'bg_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--bg_color', val );
		});
	});

	wp.customize( 'header_background_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--header_background_color', val );
		});
	});

	wp.customize( 'header_logo_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--header_logo_color', val );
		});
	});

	wp.customize( 'tagline_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--tagline_color', val );
		});
	});

	wp.customize( 'header_links_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--header_links_color', val );
		});
	});

	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--footer_background_color', val );
		});
	});

	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--footer_text_color', val );
		});
	});

	wp.customize( 'heading_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--heading_color', val );
		});
	});

	wp.customize( 'container_width', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--container_width', val + 'px' );
		});
	});
	
}( jQuery ) );
