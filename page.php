<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EvieWP WordPress theme
 */

get_header();
?>

	<main id="primary" class="single__page<?php echo esc_attr( getOption( 'defaults', 'page_sidebar' ) !== 'sidebar-none' ? ' sidebar' : '' ); ?>">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'header' ); 
			
			?>

			<div id="post-<?php the_ID(); ?>" <?php post_class( 'page container text-container text-container--center' ); ?>>
			
				<div class="page__inner <?php echo esc_attr( getOption( 'defaults', 'page_sidebar' ) ); ?>">

					<?php
						if ( getOption( 'defaults', 'page_sidebar' ) !== 'sidebar-none' ) {
							get_sidebar();
						}
					?>

					<div class="page__main">
						
						<?php 
							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eviewp' ),
									'after'  => '</div>',
								)
							);
						
						if ( get_edit_post_link() ) : ?>
							<footer class="entry-footer">
								<?php
								edit_post_link(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Edit <span class="screen-reader-text stress">%s</span>', 'eviewp' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										wp_kses_post( get_the_title() )
									),
									'<code class="edit-link stress">',
									'</code>'
								);
								?>
							</footer><!-- .entry-footer -->
						<?php endif; ?>
						
					</div>
				</div>
				
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			</div>

			<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
