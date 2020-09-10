<?php
/**
 * Default Values for the Theme
 *
 * @package evie
 */

if ( ! function_exists( 'evie_get_defaults' ) ) {
	function evie_get_defaults() {
		return apply_filters( 'evie_option_defaults',
			array(
                'custom_logo' => '',
				'logo_size' => '50',
				'hide_tagline' => false,
				'retina_logo' => '',
			)
		);
	}
}

// Customizer Color Defaults
if ( ! function_exists( 'evie_get_color_defaults' ) ) {
	function evie_get_color_defaults() {
		return apply_filters( 'evie_color_option_defaults',
			array(
                'primary_color' => '#6C63FF',
                'secondary_color' => '',
				'background_color' => '#FFF',
				'header_background_color' => '#6C63FF',
				'header_logo_color' => '#FFF',
				'tagline_color' => '#FFF',
				'header_links_color' => '#FFF',
				'footer_background_color' => '#333C44',
				'footer_text_color' => '#FFF',
			)
		);
	}
}

if ( ! function_exists( 'getOption' ) ) {
    /**
	 * Returns customizer value
     * 
     * $type - Type of value ( defaults, colors )
     * $property - value requested
	 */

    function getOption($type, $property) {

        $defaults = evie_get_defaults();
        $defaultColors = evie_get_color_defaults();

        switch( $type ) {
            case 'defaults': return get_theme_mod( $property, $defaults[$property] );
            break;
            case 'colors': return esc_html( get_theme_mod( $property, $defaultColors[$property] ) );
            break;
            default: echo "<b>Notice: <big>" . $type . '</big></b> Property not found.';
        }

    }
}