<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package EvieWP WordPress theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eviewp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'eviewp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function eviewp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		/* translators: %s: pingback URL */
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'eviewp_pingback_header' );

/**
 * Customizes the title of the Archive Page
 *
 * Credits: https://wordpress.stackexchange.com/a/179590
 *
 * @param string $title The archive title.
 * @return string The customized archive title.
 */
function eviewp_get_archive_title( $title ) {
	if ( is_category() ) {
		$title = '<small>' . esc_html__( 'Browsing category', 'eviewp' ) . '</small><h1 class="page__header__title">' . esc_html( single_cat_title( '', false ) ) . '</h1>';
	} elseif ( is_tag() ) {
		$title = '<small>' . esc_html__( 'Browsing tag', 'eviewp' ) . '</small><h1 class="page__header__title">' . esc_html( single_tag_title( '', false ) ) . '</h1>';
	} elseif ( is_search() ) {
		$title = '<small>' . esc_html__( 'Search Results for', 'eviewp' ) . '</small><h1 class="page__header__title">' . esc_html( get_search_query( false ) ) . '</h1>';
	} elseif ( is_author() ) {
		$title = '<small>' . esc_html__( 'All Posts by', 'eviewp' ) . '</small><h1 class="page__header__title">' . esc_html( get_the_author() ) . '</h1>';
	} elseif ( is_tax() ) { // For custom post types.
		$title = '<small>' . esc_html__( 'Browsing', 'eviewp' ) . '</small><h1 class="page__header__title">' . esc_html( single_term_title( '', false ) ) . '</h1>';
	} elseif ( is_post_type_archive() ) {
		$title = '<small>' . esc_html__( 'Browsing', 'eviewp' ) . '</small><h1 class="page__header__title">' . esc_html( post_type_archive_title( '', false ) ) . '</h1>';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'eviewp_get_archive_title' );

/**
 * Returns the bright shade for a HEX color
 *
 * @param string    $color   HEX color value.
 * @param int|float $percent Brightness adjustment percentage.
 * @return string Adjusted six-digit HEX color.
 */
function eviewp_color_shade( $color, $percent ) {
	$color = sanitize_hex_color( $color );

	if ( ! $color ) {
		return '#000000';
	}

	$number = hexdec( ltrim( $color, '#' ) );
	$amount = round( 2.55 * $percent );
	$red    = max( 0, min( 255, ( $number >> 16 ) + $amount ) );
	$green  = max( 0, min( 255, ( ( $number >> 8 ) & 0x00ff ) + $amount ) );
	$blue   = max( 0, min( 255, ( $number & 0x0000ff ) + $amount ) );

	return sprintf( '#%02x%02x%02x', $red, $green, $blue );
}

/**
 * Render the search dialog in the site footer.
 */
function eviewp_search_modal() {
	?>
	<!-- Search Modal -->
	<div role="dialog" aria-modal="true" aria-labelledby="eviewp-search-title" aria-hidden="true" id="eviewpSearchModal" class="modal">
		<div class="modal-content">
			<h2 id="eviewp-search-title" class="screen-reader-text"><?php esc_html_e( 'Search this site', 'eviewp' ); ?></h2>
			<?php get_search_form( array( 'aria_label' => esc_attr__( 'Search this site', 'eviewp' ) ) ); ?>
			<button type="button" class="close" aria-label="<?php echo esc_attr__( 'Close search', 'eviewp' ); ?>">&times;</button>
		</div>
	</div>
	<?php
}
add_action( 'wp_footer', 'eviewp_search_modal' );
