<?php
/**
 * Default Values for the Theme
 *
 * @package EvieWP WordPress theme
 */

if ( ! function_exists( 'eviewp_get_defaults' ) ) {
	/**
	 * Return the default layout and feature settings.
	 *
	 * @return array<string, mixed> Theme defaults.
	 */
	function eviewp_get_defaults() {
		return apply_filters(
			'eviewp_option_defaults',
			array(
				'custom_logo'                 => '',
				'logo_size'                   => '50',
				'hide_tagline'                => false,
				'retina_logo'                 => '',

				'enable_header_search'        => true,
				'enable_header_search_mobile' => true,
				'container_width'             => '',
				'enable_excerpt'              => true,
				'excerpt_lines'               => 3,

				'post_sidebar'                => 'sidebar-none',
				'page_sidebar'                => 'sidebar-none',
				'archive_sidebar'             => 'sidebar-none',
				'sidebar_width'               => '300',
			)
		);
	}
}

// Customizer color defaults.
if ( ! function_exists( 'eviewp_get_color_defaults' ) ) {
	/**
	 * Return the default theme colors.
	 *
	 * @return array<string, string> Color defaults.
	 */
	function eviewp_get_color_defaults() {
		return apply_filters(
			'eviewp_color_option_defaults',
			array(
				'primary_color'           => '#6C63FF',
				'secondary_color'         => '#666',
				'link_color'              => '#6C63FF',
				'bg_color'                => '#fff',
				'header_background_color' => '#6C63FF',
				'header_logo_color'       => '#FFF',
				'tagline_color'           => '#FFF',
				'header_links_color'      => '#FFF',
				'footer_background_color' => '#333C44',
				'footer_text_color'       => '#FFF',
				'heading_color'           => '#111',
			)
		);
	}
}

if ( ! function_exists( 'eviewp_get_option' ) ) {
	/**
	 * Returns customizer value
	 *
	 * @param string $type     Option group: defaults or colors.
	 * @param string $property Option name.
	 * @return mixed|null The saved option, its default, or null for an unknown option.
	 */
	function eviewp_get_option( $type, $property ) {

		$defaults       = eviewp_get_defaults();
		$default_colors = eviewp_get_color_defaults();

		switch ( $type ) {
			case 'defaults':
				return array_key_exists( $property, $defaults ) ? get_theme_mod( $property, $defaults[ $property ] ) : null;
			case 'colors':
				return array_key_exists( $property, $default_colors ) ? get_theme_mod( $property, $default_colors[ $property ] ) : null;
			default:
				return null;
		}
	}
}
