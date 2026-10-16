<?php
/**
 * Customizer settings for this theme.
 *
 * @package EvieWP WordPress theme
 * @since 1.0
 */

if ( ! class_exists( 'EvieWP_Customize' ) ) {
	/**
	 * CUSTOMIZER SETTINGS
	 */
	class EvieWP_Customize {

		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function register( $wp_customize ) {

			/**
			 * Site Title & Description.
			 * */
			$defaults = eviewp_get_defaults();
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.navbar__inner .navbar__logo',
					'render_callback' => 'eviewp_customize_partial_blogname',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.navbar__inner .site__description',
					'render_callback' => 'eviewp_customize_partial_blogdescription',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'custom_logo',
				array(
					'selector' => '.navbar__inner .custom__logo',
				)
			);

			// Logo size control.
			$wp_customize->add_setting(
				'logo_size',
				array(
					'default'           => $defaults['logo_size'],
					'transport'         => 'postMessage',
					'sanitize_callback' => array( __CLASS__, 'sanitize_number_range' ),
				)
			);

			$wp_customize->add_control(
				'logo_size',
				array(
					'type'        => 'range',
					'section'     => 'title_tagline',
					'label'       => __( 'Logo Size (px)', 'eviewp' ),
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
					'priority'    => 9,
				)
			);

			// Hide tagline.
			$wp_customize->add_setting(
				'hide_tagline',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
					'default'           => $defaults['hide_tagline'],
				)
			);

			$wp_customize->add_control(
				'hide_tagline',
				array(
					'type'     => 'checkbox',
					'section'  => 'title_tagline',
					'label'    => __( 'Hide Tagline', 'eviewp' ),
					'priority' => 12,
				)
			);

			/**
			 * Color Controls
			 */
			$color_defaults = eviewp_get_color_defaults();

			// Primary Color.
			$wp_customize->add_setting(
				'primary_color',
				array(
					'default'           => $color_defaults['primary_color'],
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color',
					array(
						'label'   => __( 'Primary Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Secondary Color.
			$wp_customize->add_setting(
				'secondary_color',
				array(
					'default'           => $color_defaults['secondary_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'secondary_color',
					array(
						'label'   => __( 'Secondary Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Link color.
			$wp_customize->add_setting(
				'link_color',
				array(
					'default'           => $color_defaults['link_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'link_color',
					array(
						'label'   => __( 'Link Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Background Color.
			$wp_customize->add_setting(
				'bg_color',
				array(
					'default'           => $color_defaults['bg_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'bg_color',
					array(
						'label'   => __( 'Background Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Header Background Color.
			$wp_customize->add_setting(
				'header_background_color',
				array(
					'default'           => $color_defaults['header_background_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_background_color',
					array(
						'label'   => __( 'Header Background Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Header logo color.
			$wp_customize->add_setting(
				'header_logo_color',
				array(
					'default'           => $color_defaults['header_logo_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_logo_color',
					array(
						'label'   => __( 'Logo Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Tagline color.
			$wp_customize->add_setting(
				'tagline_color',
				array(
					'default'           => $color_defaults['tagline_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'tagline_color',
					array(
						'label'   => __( 'Tagline Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Header links color.
			$wp_customize->add_setting(
				'header_links_color',
				array(
					'default'           => $color_defaults['header_links_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_links_color',
					array(
						'label'   => __( 'Header Links Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Footer Background Color.
			$wp_customize->add_setting(
				'footer_background_color',
				array(
					'default'           => $color_defaults['footer_background_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_background_color',
					array(
						'label'   => __( 'Footer Background Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Footer Text Color.
			$wp_customize->add_setting(
				'footer_text_color',
				array(
					'default'           => $color_defaults['footer_text_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_text_color',
					array(
						'label'   => __( 'Footer Text Color', 'eviewp' ),
						'section' => 'colors',
					)
				)
			);

			// Heading Color.
			$wp_customize->add_setting(
				'heading_color',
				array(
					'default'           => $color_defaults['heading_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'heading_color',
					array(
						'label'   => __( 'Heading Color (H1 - H6)', 'eviewp' ),
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
					'title'      => __( 'Theme Options', 'eviewp' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
				)
			);

			// Enable header search.
			$wp_customize->add_setting(
				'enable_header_search',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => $defaults['enable_header_search'],
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'enable_header_search',
				array(
					'type'    => 'checkbox',
					'section' => 'options',
					'label'   => __( 'Show search in header', 'eviewp' ),
				)
			);

			// Mobile search.
			$wp_customize->add_setting(
				'enable_header_search_mobile',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => $defaults['enable_header_search_mobile'],
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'enable_header_search_mobile',
				array(
					'type'    => 'checkbox',
					'section' => 'options',
					'label'   => __( 'Show search in header (mobile)', 'eviewp' ),
				)
			);

			// Container width.
			$wp_customize->add_setting(
				'container_width',
				array(
					'default'           => $defaults['container_width'],
					'transport'         => 'postMessage',
					'sanitize_callback' => array( __CLASS__, 'sanitize_number_range' ),
				)
			);

			$wp_customize->add_control(
				'container_width',
				array(
					'type'        => 'number',
					'section'     => 'options',
					'label'       => __( 'Container Width (px)', 'eviewp' ),
					'input_attrs' => array(
						'min'  => 720,
						'max'  => 1920,
						'step' => 1,
					),
				)
			);

			// Enable excerpt.
			$wp_customize->add_setting(
				'enable_excerpt',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => $defaults['enable_excerpt'],
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			$wp_customize->add_control(
				'enable_excerpt',
				array(
					'type'    => 'checkbox',
					'section' => 'options',
					'label'   => __( 'Enable Excerpt', 'eviewp' ),
				)
			);

			// Excerpt length.
			$wp_customize->add_setting(
				'excerpt_lines',
				array(
					'default'           => $defaults['excerpt_lines'],
					'transport'         => 'postMessage',
					'sanitize_callback' => array( __CLASS__, 'sanitize_number_range' ),
				)
			);

			$wp_customize->add_control(
				'excerpt_lines',
				array(
					'type'        => 'number',
					'section'     => 'options',
					'label'       => __( 'Excerpt Lines', 'eviewp' ),
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 12,
						'step' => 1,
					),
				)
			);

			/**
			 * Sidebar
			 */

			$wp_customize->add_section(
				'sidebar_options',
				array(
					'title'      => __( 'Sidebar', 'eviewp' ),
					'priority'   => 50,
					'capability' => 'edit_theme_options',
				)
			);

			$wp_customize->add_setting(
				'post_sidebar',
				array(
					'default'           => $defaults['post_sidebar'],
					'transport'         => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'post_sidebar',
				array(
					'label'   => __( 'Post Sidebar', 'eviewp' ),
					'section' => 'sidebar_options',
					'type'    => 'select',
					'choices' => array(
						'sidebar-none'  => 'None',
						'sidebar-left'  => 'Left',
						'sidebar-right' => 'Right',
					),
				)
			);

			$wp_customize->add_setting(
				'page_sidebar',
				array(
					'default'           => $defaults['page_sidebar'],
					'transport'         => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'page_sidebar',
				array(
					'label'   => __( 'Page Sidebar', 'eviewp' ),
					'section' => 'sidebar_options',
					'type'    => 'select',
					'choices' => array(
						'sidebar-none'  => 'None',
						'sidebar-left'  => 'Left',
						'sidebar-right' => 'Right',
					),
				)
			);

			$wp_customize->add_setting(
				'archive_sidebar',
				array(
					'default'           => $defaults['archive_sidebar'],
					'transport'         => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'archive_sidebar',
				array(
					'label'   => __( 'Archive Sidebar', 'eviewp' ),
					'section' => 'sidebar_options',
					'type'    => 'select',
					'choices' => array(
						'sidebar-none'  => 'None',
						'sidebar-left'  => 'Left',
						'sidebar-right' => 'Right',
					),
				)
			);

			// Sidebar width.
			$wp_customize->add_setting(
				'sidebar_width',
				array(
					'default'           => $defaults['sidebar_width'],
					'transport'         => 'postMessage',
					'sanitize_callback' => array( __CLASS__, 'sanitize_number_range' ),
				)
			);

			$wp_customize->add_control(
				'sidebar_width',
				array(
					'type'        => 'number',
					'section'     => 'sidebar_options',
					'label'       => __( 'Sidebar Width (px)', 'eviewp' ),
					'input_attrs' => array(
						'min'  => 200,
						'max'  => 600,
						'step' => 1,
					),
				)
			);
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param mixed $checked Submitted checkbox value.
		 * @return bool Sanitized checkbox value.
		 */
		public static function sanitize_checkbox( $checked ) {
			return (bool) $checked;
		}

		/**
		 * Sanitize a numeric setting against its control constraints.
		 *
		 * @param mixed                $number  Submitted numeric value.
		 * @param WP_Customize_Setting $setting Customizer setting instance.
		 * @return int Sanitized value constrained to the control range.
		 */
		public static function sanitize_number_range( $number, $setting ) {
			$number  = absint( $number );
			$control = $setting->manager->get_control( $setting->id );
			$attrs   = $control ? $control->input_attrs : array();

			if ( isset( $attrs['min'] ) && $number < $attrs['min'] ) {
				$number = $attrs['min'];
			}

			if ( isset( $attrs['max'] ) && $number > $attrs['max'] ) {
				$number = $attrs['max'];
			}

			return $number;
		}

		/**
		 * Sanitize select field.
		 *
		 * @param mixed                $input   Submitted option value.
		 * @param WP_Customize_Setting $setting Customizer setting instance.
		 * @return string Sanitized allowed value or the setting default.
		 */
		public static function sanitize_select( $input, $setting ) {
			$input   = sanitize_text_field( $input );
			$control = $setting->manager->get_control( $setting->id );

			if ( $control && array_key_exists( $input, $control->choices ) ) {
				return $input;
			}

			return $setting->default;
		}
	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'EvieWP_Customize', 'register' ) );

}

/**
 * PARTIAL REFRESH FUNCTIONS
 * */
if ( ! function_exists( 'eviewp_customize_partial_blogname' ) ) {
	/**
	 * Render the site title for the selective refresh partial.
	 */
	function eviewp_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'eviewp_customize_partial_blogdescription' ) ) {
	/**
	 * Render the site description for the selective refresh partial.
	 */
	function eviewp_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

/**
 *
 * Contains refresh events for customizer
 */
function eviewp_customize_preview_js() {
	wp_enqueue_script( 'eviewp-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20200906', true );
}
add_action( 'customize_preview_init', 'eviewp_customize_preview_js' );

/**
 *
 * Contains event handlers (hide/show) for customizers
 */
function eviewp_customizer_events() {
	wp_enqueue_script( 'eviewp-customize-events', get_template_directory_uri() . '/assets/js/customizer-events.js', array(), '20200906', true );
}
add_action( 'customize_controls_enqueue_scripts', 'eviewp_customizer_events' );
