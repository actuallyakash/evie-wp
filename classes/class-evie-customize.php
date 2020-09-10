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
			$optionDefaults = evie_get_defaults();
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
				'default'   => $optionDefaults['logo_size'],
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
			$wp_customize->add_setting( 'hide_tagline', array (
				'transport' => 'refresh',
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				'default' => $optionDefaults['hide_tagline'],
			));

			$wp_customize->add_control( 'hide_tagline', array(
				'type' 		=> 'checkbox',
				'section' 	=> 'title_tagline',
				'label' 	=> __( 'Hide Tagline' , 'evie' ),
				'priority' 	=> 12,
			) );

			/**
			 * Color Controls
			 */
			$colorDefaults = evie_get_color_defaults();

			// Primary Color.
			$wp_customize->add_setting(
				'primary_color',
				array(
					'default'           => $colorDefaults['primary_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color',
					array(
						'label'   => __( 'Primary Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Secondary Color.
			$wp_customize->add_setting(
				'secondary_color',
				array(
					'default'           => $colorDefaults['secondary_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'secondary_color',
					array(
						'label'   => __( 'Secondary Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Background Color.
			$wp_customize->add_setting(
				'background_color',
				array(
					'default'           => $colorDefaults['background_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'background_color',
					array(
						'label'   => __( 'Background Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);
			
			// Header Background Color.
			$wp_customize->add_setting(
				'header_background_color',
				array(
					'default'           => $colorDefaults['header_background_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_background_color',
					array(
						'label'   => __( 'Header Background Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Header Logo Color
			$wp_customize->add_setting(
				'header_logo_color',
				array(
					'default'           => $colorDefaults['header_logo_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_logo_color',
					array(
						'label'   => __( 'Logo Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Tagline Color
			$wp_customize->add_setting(
				'tagline_color',
				array(
					'default'           => $colorDefaults['tagline_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'tagline_color',
					array(
						'label'   => __( 'Tagline Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Header Links Color
			$wp_customize->add_setting(
				'header_links_color',
				array(
					'default'           => $colorDefaults['header_links_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_links_color',
					array(
						'label'   => __( 'Header Links Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Footer Background Color.
			$wp_customize->add_setting(
				'footer_background_color',
				array(
					'default'           => $colorDefaults['footer_background_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_background_color',
					array(
						'label'   => __( 'Footer Background Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			// Footer Text Color.
			$wp_customize->add_setting(
				'footer_text_color',
				array(
					'default'           => $colorDefaults['footer_text_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_text_color',
					array(
						'label'   => __( 'Footer Text Color', 'evie' ),
						'section' => 'colors',
					)
				)
			);

			/**
			 * Theme Options
			 */

			$wp_customize->add_section(
				'options',
				array(
					'title'      => __( 'Theme Options', 'evie' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
				)
			);

			/* Enable Header Search ----------------------------------------------- */

			$wp_customize->add_setting(
				'enable_header_search',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'enable_header_search',
				array(
					'type'     => 'checkbox',
					'section'  => 'options',
					'priority' => 10,
					'label'    => __( 'Show search in header', 'evie' ),
				)
			);
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