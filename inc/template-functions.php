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
function evie_body_classes( $classes ) {
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
add_filter( 'body_class', 'evie_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function evie_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'evie_pingback_header' );

/**
 * Customizes the title of the Archive Page
 * 
 * Credits: https://wordpress.stackexchange.com/a/179590
 */
function evie_get_archive_title( $title ) {    
	if ( is_category() ) {    
		$title = '<small>Browsing category</small>' . '<h1 class="page__header__title">' . single_cat_title( '', false ) . '</h1>';    
	} elseif ( is_tag() ) {    
		$title = '<small>Browsing tag</small>' . '<h1 class="page__header__title">' . single_tag_title( '', false ) . '</h1>';    
	} elseif ( is_search() ) {    
		$title = '<small>Search Results for</small>' . '<h1 class="page__header__title">' . get_search_query() . '</h1>';    
	} elseif ( is_author() ) {    
		$title = '<small>All Posts by</small>' . '<h1 class="page__header__title">' . get_the_author() . '</h1>' ;    
	} elseif ( is_tax() ) { //for custom post types
		$title = '<small>Browsing</small>' . '<h1 class="page__header__title">' . sprintf( __( '%1$s', 'eviewp' ), single_term_title( '', false ) ) . '</h1>';
	} elseif ( is_post_type_archive() ) {
		$title = '<small>Browsing</small>' . '<h1 class="page__header__title">' . post_type_archive_title( '', false ) . '</h1>';
	}
	return $title;    
}
add_filter( 'get_the_archive_title', 'evie_get_archive_title' );

/**
 * Returns the bright shade for a HEX color
 * 
 * $color - HEX value
 * $percent - percent of brightness/dullness
 */
function colorShade( $color, $percent ) {

	$num = base_convert(substr($color, 1), 16, 10);
	$amt = round(2.55 * $percent);
	$r = ($num >> 16) + $amt;
	$b = ($num >> 8 & 0x00ff) + $amt;
	$g = ($num & 0x0000ff) + $amt;
    
	$partialColor = '#' . substr( base_convert(0x1000000 + ($r<255?$r<1?0:$r:255)*0x10000 + ($b<255?$b<1?0:$b:255)*0x100 + ($g<255?$g<1?0:$g:255), 10, 16), 1 );
	
    $colorPostfix = substr( $color, 5 );
    
    $finalColor = substr( $partialColor, 0, 5 ) . $colorPostfix;
    
    return $finalColor;
}

// Search Modal at the bottom
function searchModal() {
	?>
    <!-- Search Modal -->
	<div id="searchModal" class="modal">
		<div class="modal-content">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-input" placeholder="Search …" value="" name="s">
			</form>
			<div class="close">&times;</div>
		</div>
	</div>
	<?php
}
add_action( 'wp_footer', 'searchModal' );