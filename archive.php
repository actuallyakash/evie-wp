<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EvieWP WordPress theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
		
			<?php get_template_part( 'template-parts/content', 'header' ); ?>

			<div class="container">

				<div class="app__inner <?php echo esc_attr( eviewpGetOption( 'defaults', 'archive_sidebar' ) ); ?>">

					<?php
						if ( eviewpGetOption( 'defaults', 'archive_sidebar' ) !== 'sidebar-none' ) {
							get_sidebar();
						}
					?>

					<div class="main-section">

						<div class="evie-posts row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;
							?>
						</div>

						<?php eviewp_pagination(); ?>
						
					</div>

				</div>

			</div>

		<?php
		
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
