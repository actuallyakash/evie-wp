<?php
/**
 * Default Values for the Theme
 *
 * @package EvieWP WordPress theme
 */

if ( ! function_exists( 'evie_get_defaults' ) ) {
	function evie_get_defaults() {
		return apply_filters( 'evie_option_defaults',
			array(
                'custom_logo' => '',
				'logo_size' => '50',
				'hide_tagline' => false,
				'retina_logo' => '',
				
				'enable_header_search' => true,
				'enable_header_search_mobile' => true,
				'container_width' => '1335',
				'enable_excerpt' => true,
				'excerpt_lines' => 3,

				'post_sidebar' => 'sidebar-none',
				'page_sidebar' => 'sidebar-none',
				'archive_sidebar' => 'sidebar-none',
				'sidebar_width' => '300',

				'facebook' => '#',
				'twitter' => '#',
				'instagram' => '#',
				'youtube' => '#',
				'github' => '#',
				'linkedin' => '#',
				'spotify' => '#',
				'whatsapp' => '#',
				'telegram' => '#',
				'email' => '#',
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
                'secondary_color' => '#666',
				'link_color' => '#6C63FF',
				'bg_color' => '#fff',
				'header_background_color' => '#6C63FF',
				'header_logo_color' => '#FFF',
				'tagline_color' => '#FFF',
				'header_links_color' => '#FFF',
				'footer_background_color' => '#333C44',
				'footer_text_color' => '#FFF',
				'heading_color' => '#111',
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

    function getOption( $type, $property ) {

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