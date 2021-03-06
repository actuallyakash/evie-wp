<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EvieWP WordPress theme
 */

get_header();
?>

	<main id="primary" class="single__post<?php echo esc_attr( getOption( 'defaults', 'post_sidebar' ) !== 'sidebar-none' ? ' sidebar' : '' ); ?>">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'header' );
			
			?>
			
			<div class="container text-container text-container--center">

				<!-- Article Section -->
				<div class="app__inner <?php echo esc_attr( getOption( 'defaults', 'post_sidebar' ) ); ?>">
					
					<?php
						if ( getOption( 'defaults', 'post_sidebar' ) !== 'sidebar-none' ) {
							get_sidebar();
						}
					?>

					<div class="app__main">
						<?php the_content(); ?>
					</div>
				</div>

				<!-- Tags -->
				<?php eviewp_get_tags(); ?>

				<!-- Author Card -->
				<div class="author__card">
					<img alt="<?php get_the_title(); ?>" src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 450 ) ) ); ?>" height="110" width="110">
					
					<span class="about-heading"><?php esc_html_e( 'About Author', 'eviewp' ); ?></span>

					<h4><a href="<?php echo esc_url(  get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="Posts by <?php echo esc_html( get_the_author() ); ?>" rel="author"> <?php echo esc_html( get_the_author() ); ?> </a></h4>

					<?php if( get_the_author_meta( 'description' ) ) : ?>
					<p><?php echo esc_html( nl2br( get_the_author_meta( 'description' ) ) ) ?></p>
					<?php endif; ?>
					
				</div>

				<?php
				eviewp_singular_pagination();
				
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
