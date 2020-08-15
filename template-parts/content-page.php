<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evie
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/content', 'header' ); ?>

	<div class="page">
		<div class="article-container">
			<div class="page__inner">
				
				<!-- Sidebar -->
				<?php get_sidebar(); ?>

				<div class="page__main">
					
					<?php 
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evie' ),
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
										__( 'Edit <span class="screen-reader-text stress">%s</span>', 'evie' ),
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
		</div>
	</div>
	

	
</article><!-- #post-<?php the_ID(); ?> -->
