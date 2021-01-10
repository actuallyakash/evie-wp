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
					
					<!-- Author links -->
					<div class="author-links">

						<?php if( getOption( 'defaults', 'facebook' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'facebook' ) ); ?>" target="_blank">
								<i class="fab fa-facebook-f" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'twitter' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'twitter' ) ); ?>" target="_blank">
								<i class="fab fa-twitter" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'instagram' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'instagram' ) ); ?>" target="_blank">
								<i class="fab fa-instagram" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'youtube' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'youtube' ) ); ?>" target="_blank">
								<i class="fab fa-youtube" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'linkedin' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'linkedin' ) ); ?>" target="_blank">
								<i class="fab fa-linkedin-in" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'spotify' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'spotify' ) ); ?>" target="_blank">
								<i class="fab fa-spotify" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'github' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'github' ) ); ?>" target="_blank">
								<i class="fab fa-github" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'whatsapp' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'whatsapp' ) ); ?>" target="_blank">
								<i class="fab fa-whatsapp" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'telegram' ) ) : ?>
							<a href="<?php echo esc_url( getOption( 'defaults', 'telegram' ) ); ?>" target="_blank">
								<i class="fab fa-telegram-plane" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if( getOption( 'defaults', 'email' ) ) : ?>
							<a href="mailto: <?php echo esc_url( getOption( 'defaults', 'email' ) ); ?>" target="_blank">
								<i class="far fa-envelope" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

					</div>
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
