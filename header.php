<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EvieWP WordPress theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php eviewp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'eviewp' ); ?></a>

	<header class="navbar">
		<div class="container">
			<div class="navbar__inner">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
					if ( has_custom_logo() ) {
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
						echo '<img class="custom__logo" src="' . esc_url( $custom_logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
					} else {
						echo "<span class='navbar__logo'>" . esc_html( get_bloginfo( 'name' ) ) . "</span>";
					}

					if ( ! get_theme_mod( 'hide_tagline', false ) ) {
						$eviewp_description = get_bloginfo( 'description', 'display' );
						if ( $eviewp_description || is_customize_preview() ) : ?>
							<small class="site__description"><?php echo $eviewp_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></small>
						<?php endif;
					}
					
				?>
				</a>
				
				<div class="navbar-container">
					<?php
					wp_nav_menu( array(
						'menu_class'        => "navbar__menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
						'menu_id'           => "primary-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
						'theme_location'    => "menu-1", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
					) );
					?>

					<?php if ( eviewpGetOption( 'defaults', 'enable_header_search' ) ) : ?>
					<a id="searchBtn" class="search-btn" href="#">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
					</a>
					<?php endif; ?>
				</div>

				<div class="navbar__menu-mob">

					<?php if ( eviewpGetOption( 'defaults', 'enable_header_search_mobile' ) ) : ?>
					<a id="searchBtnMob" class="search-btn" href="#">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
					</a>
					<?php endif; ?>

					<a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a>
				</div>
			</div>
		</div>
		
		<nav class="nav__mobile"></nav>
	</header>
