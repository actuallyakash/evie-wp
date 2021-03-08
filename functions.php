<?php
/**
 * EvieWP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EvieWP WordPress theme
 */

if ( ! defined( 'EVIEWP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'EVIEWP_VERSION', '1.0.2' );
	define( 'EVIEWP_DIR_PATH', plugin_dir_path( __FILE__ ) );
	define( 'EVIEWP_PLG_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! function_exists( 'eviewp_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eviewp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EvieWP, use a find and replace
		 * to change 'eviewp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eviewp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'eviewp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'eviewp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
}
add_action( 'after_setup_theme', 'eviewp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $eviewp_content_width
 */
function eviewp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	$GLOBALS['content_width'] = apply_filters( 'eviewp_content_width', 640 ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}
add_action( 'after_setup_theme', 'eviewp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eviewp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eviewp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eviewp' ),
			/* translators: 1: section id 2: widget class */
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'eviewp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eviewp_scripts() {
	wp_enqueue_style( 'eviewp-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', [], EVIEWP_VERSION );
	wp_enqueue_style( 'eviewp-bs-grid', get_template_directory_uri() . '/assets/css/bs-grid.css', [], EVIEWP_VERSION );
	wp_enqueue_style( 'eviewp-lato-font', 'https://fonts.googleapis.com/css?family=Lato:400', [], EVIEWP_VERSION );
	wp_enqueue_style( 'eviewp-style', get_stylesheet_uri(), [], EVIEWP_VERSION );
	wp_style_add_data( 'eviewp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'eviewp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], EVIEWP_VERSION, true );

	wp_enqueue_script( 'eviewp-app', get_template_directory_uri() . '/assets/js/app.js', [], EVIEWP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'eviewp_scripts' );

/**
 * Theme defaults
 */

require get_template_directory() . '/inc/defaults.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom comment walker.
 */
require get_template_directory() . '/classes/class-evie-walker-comment.php';

/**
 * Customizer Options
 */
require get_template_directory() . '/classes/class-evie-customize.php';

/**
 * Styles for Live Preview
 */
require get_template_directory() . '/inc/customizer-css.php';
