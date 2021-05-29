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
		value.bind( function( val ) {
			$( '.navbar__logo' ).text( val );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( val ) {
			$( '.site__description' ).text( val );
		} );
	} );

	// Logo Resize
	wp.customize( 'logo_size', function( value ) {
		value.bind( function( val ) {
			$( '.navbar__inner .custom__logo' ).css({ 'width': val, 'height': val });
		} );
	} );


	/**
	 * Color Controls
	 */

	wp.customize( 'secondary_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_secondary_color', val );
		});
	});

	wp.customize( 'link_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_link_color', val );
		});
	});

	wp.customize( 'bg_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_bg_color', val );
		});
	});

	wp.customize( 'header_background_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_header_background_color', val );
		});
	});

	wp.customize( 'header_logo_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_header_logo_color', val );
		});
	});

	wp.customize( 'tagline_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_tagline_color', val );
		});
	});

	wp.customize( 'header_links_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_header_links_color', val );
		});
	});

	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_footer_background_color', val );
		});
	});

	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_footer_text_color', val );
		});
	});

	wp.customize( 'heading_color', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_heading_color', val );
		});
	});

	wp.customize( 'container_width', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_container_width', val + 'px' );
		});
	});

	wp.customize( 'sidebar_width', function( value ) {
		value.bind( function( val ) {
			document.documentElement.style.setProperty( '--evie_sidebar_width', val + 'px' );
		});
	});

	wp.customize( 'excerpt_lines', function( value ) {
		value.bind( function( val ) {
			$( '.post__content .excerpt' ).css({ '-webkit-line-clamp': val });
		} );
	} );
	
}( jQuery ) );
