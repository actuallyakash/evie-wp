<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package evie
 */

get_header();
?>

	<main id="primary" class="site-main container error-404">

		<section class="not-found center ">
			<img class="img-fluid" src="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/images/undraw_page_not_found.svg" alt="404">

			<h3>The page you were looking for doesn't exist.</h3>
			<p>Go Back to <a class="stress link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		</section>

	</main>

<?php
