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
			$defaults = evie_get_defaults();
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
				'default'   => $defaults['logo_size'],
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
			$wp_customize->add_setting( 'hide_tagline', array(
				'transport' => 'refresh',
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				'default' => $defaults['hide_tagline'],
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
					'sanitize_callback' => 'sanitize_hex_color'
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
				'bg_color',
				array(
					'default'           => $colorDefaults['bg_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'bg_color',
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

			// Heading Color.
			$wp_customize->add_setting(
				'heading_color',
				array(
					'default'           => $colorDefaults['heading_color'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'heading_color',
					array(
						'label'   => __( 'Heading Color (H1 - H6)', 'evie' ),
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

			// Enable Header Search
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
					'type'     => 'checkbox',
					'section'  => 'options',
					'label'    => __( 'Show search in header', 'evie' ),
				)
			);

			// Mobile search
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
					'type'     => 'checkbox',
					'section'  => 'options',
					'label'    => __( 'Show search in header (mobile)', 'evie' ),
				)
			);

			// Container Width
			$wp_customize->add_setting(
				'container_width',
				array(
					'default' => $defaults['container_width'],
					'transport' => 'postMessage'
				)
			);
			
			$wp_customize->add_control(
				'container_width',
				array(
					'type' => 'number',
					'section' => 'options',
					'label' => __( 'Container Width (px)' ),
				)
			);

			// Enable excerpt
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
					'type'     => 'checkbox',
					'section'  => 'options',
					'label'    => __( 'Enable Excerpt', 'evie' ),
				)
			);

			// Excerpt Length
			$wp_customize->add_setting(
				'excerpt_lines',
				array(
					'default' => $defaults['excerpt_lines'],
					'transport' => 'postMessage'
				)
			);
			
			$wp_customize->add_control(
				'excerpt_lines',
				array(
					'type' => 'number',
					'section' => 'options',
					'label' => __( 'Excerpt Lines' ),
				)
			);

			/**
			 * Sidebar
			 */

			$wp_customize->add_section(
				'sidebar_options',
				array(
					'title'      => __( 'Sidebar', 'evie' ),
					'priority'   => 50,
					'capability' => 'edit_theme_options',
				)
			);

			$wp_customize->add_setting(
				'post_sidebar',
				array(
					'default' => $defaults['post_sidebar'],
					'transport' => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'post_sidebar',
				array(
					'label' => __( 'Post Sidebar', 'mtwriter' ),
					'section' => 'sidebar_options',
					'type' => 'select',
					'choices' => array(
						'sidebar-none' => 'None',
						'sidebar-left' => 'Left',
						'sidebar-right' => 'Right',
					)
				)
			);

			$wp_customize->add_setting(
				'page_sidebar',
				array(
					'default' => $defaults['page_sidebar'],
					'transport' => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'page_sidebar',
				array(
					'label' => __( 'Page Sidebar', 'mtwriter' ),
					'section' => 'sidebar_options',
					'type' => 'select',
					'choices' => array(
						'sidebar-none' => 'None',
						'sidebar-left' => 'Left',
						'sidebar-right' => 'Right',
					)
				)
			);

			$wp_customize->add_setting(
				'archive_sidebar',
				array(
					'default' => $defaults['archive_sidebar'],
					'transport' => 'refresh',
					'sanitize_callback' => array( __CLASS__, 'sanitize_select' ),
				)
			);

			$wp_customize->add_control(
				'archive_sidebar',
				array(
					'label' => __( 'Archive Sidebar', 'mtwriter' ),
					'section' => 'sidebar_options',
					'type' => 'select',
					'choices' => array(
						'sidebar-none' => 'None',
						'sidebar-left' => 'Left',
						'sidebar-right' => 'Right',
					)
				)
			);

			// Sidebar Width
			$wp_customize->add_setting(
				'sidebar_width',
				array(
					'default' => $defaults['sidebar_width'],
					'transport' => 'postMessage'
				)
			);
			
			$wp_customize->add_control(
				'sidebar_width',
				array(
					'type' => 'number',
					'section' => 'sidebar_options',
					'label' => __( 'Sidebar Width (px)' ),
				)
			);

			/**
			 * Social Icons
			 */

			$wp_customize->add_section(
				'social_icons_options',
				array(
					'title'      => __( 'Social Icons', 'evie' ),
					'priority'   => 50,
					'capability' => 'edit_theme_options',
				)
			);

			// Facebook
			$wp_customize->add_setting(
				'facebook',
				array(
					'default' => $defaults['facebook']
				)
			);
			
			$wp_customize->add_control(
				'facebook',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Facebook' ),
				)
			);

			// Twitter
			$wp_customize->add_setting(
				'twitter',
				array(
					'default' => $defaults['twitter']
				)
			);
			
			$wp_customize->add_control(
				'twitter',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Twitter' ),
				)
			);

			// Instagram
			$wp_customize->add_setting(
				'instagram',
				array(
					'default' => $defaults['instagram']
				)
			);
			
			$wp_customize->add_control(
				'instagram',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Instagram' ),
				)
			);

			// Youtube
			$wp_customize->add_setting(
				'youtube',
				array(
					'default' => $defaults['youtube']
				)
			);
			
			$wp_customize->add_control(
				'youtube',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Youtube' ),
				)
			);

			// Github
			$wp_customize->add_setting(
				'github',
				array(
					'default' => $defaults['github']
				)
			);
			
			$wp_customize->add_control(
				'github',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Github' ),
				)
			);

			// LinkedIn
			$wp_customize->add_setting(
				'linkedin',
				array(
					'default' => $defaults['linkedin']
				)
			);
			
			$wp_customize->add_control(
				'linkedin',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'LinkedIn' ),
				)
			);

			// Spotify
			$wp_customize->add_setting(
				'spotify',
				array(
					'default' => $defaults['spotify']
				)
			);
			
			$wp_customize->add_control(
				'spotify',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Spotify' ),
				)
			);

			// WhatsApp
			$wp_customize->add_setting(
				'whatsapp',
				array(
					'default' => $defaults['whatsapp']
				)
			);
			
			$wp_customize->add_control(
				'whatsapp',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'WhatsApp' ),
				)
			);

			// Telegram
			$wp_customize->add_setting(
				'telegram',
				array(
					'default' => $defaults['telegram']
				)
			);
			
			$wp_customize->add_control(
				'telegram',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Telegram' ),
				)
			);

			// Email
			$wp_customize->add_setting(
				'email',
				array(
					'default' => $defaults['email'],
					'placeholder' => __( 'Your Email' ),
				)
			);
			
			$wp_customize->add_control(
				'email',
				array(
					'type' => 'url',
					'section' => 'social_icons_options',
					'label' => __( 'Email' ),
				)
			);
		}

		/**
		 * Sanitize boolean for checkbox.
		 */
		public static function sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

		/**
		 * Sanitize select field.
		 */
		public static function sanitize_select( $input, $setting ) {
			$input = sanitize_text_field( $input );
			return $input;
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