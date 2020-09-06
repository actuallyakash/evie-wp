<?php
/**
 * Customizer settings for this theme.
 *
 * @package Evie
 * @since 1.0
 */

if ( ! class_exists( 'Evie_Customize' ) ) {
	/**
	 * CUSTOMIZER SETTINGS
	 */
	class Evie_Customize {

		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function register( $wp_customize ) {

			/**
			 * Site Title & Description.
			 * */
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.navbar__inner .navbar__logo',
					'render_callback' => 'evie_customize_partial_blogname',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.navbar__inner .site__description',
					'render_callback' => 'evie_customize_partial_blogdescription',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'custom_logo',
				array(
					'selector'        => '.navbar__inner .custom__logo',
				)
			);

			// Logo Size Control
			$wp_customize->add_setting( 'logo_size' , array(
				'default'   => '50',
				'transport' => 'postMessage',
			) );

			$wp_customize->add_control( 'logo_size', array(
				'type' => 'range',
				'section' => 'title_tagline',
				'label' => __( 'Logo Size (px)', 'evie' ),
				'input_attrs' => array(
					'min' => 0,
					'max' => 200,
					'step' => 1,
				),
				'priority' => 9
			) );

			// Hide Tagline
			$wp_customize->add_setting( 'display_tagline', array (
				'transport' => 'refresh',
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				'default' => true,
			));

			$wp_customize->add_control( 'display_tagline', array(
				'type' 		=> 'checkbox',
				'section' 	=> 'title_tagline',
				'label' 	=> __( 'Display Tagline' , 'evie' ),
				'priority' 	=> 12,
			) );
			
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param bool $checked Whether or not a box is checked.
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'Evie_Customize', 'register' ) );

}

/**
 * PARTIAL REFRESH FUNCTIONS
 * */
if ( ! function_exists( 'evie_customize_partial_blogname' ) ) {
	/**
	 * Render the site title for the selective refresh partial.
	 */
	function evie_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'evie_customize_partial_blogdescription' ) ) {
	/**
	 * Render the site description for the selective refresh partial.
	 */
	function evie_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

/**
 *
 * Contains refresh events for customizer
 */
function evie_customize_preview_js() {
	wp_enqueue_script( 'evie-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20200906', true );
}
add_action( 'customize_preview_init', 'evie_customize_preview_js' );

/**
 *
 * Contains event handlers (hide/show) for customizers
 */
function evie_customizer_events() {
	wp_enqueue_script( 'evie-customize-events', get_template_directory_uri() . '/assets/js/customizer-events.js', array(), '20200906', true );
}
add_action( 'customize_controls_enqueue_scripts', 'evie_customizer_events' );