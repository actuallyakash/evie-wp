<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evie
 */

?>

<section class="no-results not-found">

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'evie' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() || is_404() ) :
			?>

			<main id="primary" class="site-main container error-404">

				<section class="not-found center ">
					<img class="img-fluid" src="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/images/undraw_page_not_found.svg" alt="404">

					<h3>
					<?php if ( is_search() ) {
						esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'evie' );
					} else {
						esc_html_e( 'The page you were looking for doesn\'t exist.', 'evie' );
					} ?>
					</h3>

					<p><?php esc_html_e( 'Go Back to ', 'evie' ); ?><a class="stress link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

					<?php if ( is_search() ) {
						get_search_form(); 
					} ?>
				</section>
				
			</main>

			<?php
		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'evie' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

<?php wp_footer(); ?>