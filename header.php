<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evie
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'evie' ); ?></a>

	<header class="navbar<?php global $post; echo ( ! is_home() && ( ! has_post_thumbnail( $post->ID ) || is_archive() || is_search() ) ) ? ' navbar--extended' : ''; ?>">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				
				<?php the_custom_logo(); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span class="navbar__logo"><?php bloginfo( 'name' ); ?></span>
				<?php
				$evie_description = get_bloginfo( 'description', 'display' );
				if ( $evie_description || is_customize_preview() ) : ?>
					<small class="site__description"><?php echo $evie_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></small>
				<?php endif; ?>
				</a>

				<?php
				wp_nav_menu( array(
					'menu_class'        => "navbar__menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
					'menu_id'           => "primary-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
					'theme_location'    => "menu-1", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
				) );
				?>

				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</header>
