<?php
/**
 * evie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package evie
 */

if ( ! defined( 'WP_EVIE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WP_EVIE_VERSION', '1.0.0' );
	define( 'WP_EVIE_DIR_PATH', plugin_dir_path( __FILE__ ) );
	define( 'WP_EVIE_PLG_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! function_exists( 'evie_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function evie_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on evie, use a find and replace
		 * to change 'evie' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'evie', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'evie' ),
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
				'evie_custom_background_args',
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
add_action( 'after_setup_theme', 'evie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function evie_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'evie_content_width', 640 );
}
add_action( 'after_setup_theme', 'evie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function evie_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'evie' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'evie' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'evie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function evie_scripts() {
	wp_enqueue_style( 'evie-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', [], WP_EVIE_VERSION );
	wp_enqueue_style( 'evie-bs-grid', get_template_directory_uri() . '/assets/css/bs-grid.css', [], WP_EVIE_VERSION );
	wp_enqueue_style( 'evie-style', get_stylesheet_uri(), [], WP_EVIE_VERSION );
	wp_style_add_data( 'evie-style', 'rtl', 'replace' );

	wp_enqueue_script( 'evie-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], WP_EVIE_VERSION, true );

	wp_enqueue_script( 'evie-app', get_template_directory_uri() . '/assets/js/app.js', [], WP_EVIE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'evie_scripts' );

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
