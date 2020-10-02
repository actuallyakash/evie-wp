<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package evie
 */

get_header();
?>

	<main id="primary" class="single__post">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'header' );
			
			?>
			
			<div class="container">

				<!-- Article Section -->
				<div class="app__inner <?php echo getOption( 'defaults', 'post_sidebar' ); ?>">
					
					<?php
						if ( getOption( 'defaults', 'post_sidebar' ) !== 'sidebar-none' ) {
							get_sidebar();
						}
					?>

					<div class="app__main">
						<?php the_content(); ?>
					</div>
				</div>

				<!-- Author Card -->
				<div class="author__card">
					<img alt="<?php get_the_title(); ?>" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 450 )); ?>" height="110" width="110">
					
					<span class="about-heading">About Author</span>

					<h4><a href="<?php echo esc_url(  get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="Posts by <?php echo esc_html( get_the_author() ); ?>" rel="author"> <?php echo esc_html( get_the_author() ); ?> </a></h4>

					<?php if( get_the_author_meta( 'description' ) ) : ?>
					<p><?php echo nl2br( get_the_author_meta( 'description' ) ); ?></p>
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
				// Article Navigation
				$next_post = get_next_post();
				$prev_post = get_previous_post();
				
				if ( $next_post || $prev_post ) { ?>

					<nav class="article-navigation">
						<?php 
						if ( $prev_post ) { 
							?>

							<div class="nav-el nav-left">
								<a href="<?php echo esc_url(  get_permalink(  $prev_post->ID  )  ); ?>" rel="prev">
									<small class="nav-label">< Previous Article</small>
									<span class="nav-inner">
										<img src="<?php echo get_the_post_thumbnail_url( $prev_post->ID ) ?>" class="" alt="<?php echo $prev_post->post_title; ?>">		
										
										<span class="nav-title"><?php echo wordwrap( $prev_post->post_title, 40, "<br>" ); ?></span>
									</span>
								</a>
							</div>

							<?php
						}
						
						if( $next_post ) {
							?>

							<div class="nav-el nav-right">
								<a href="<?php echo esc_url(  get_permalink(  $next_post->ID  )  ); ?>" rel="next">
									<small class="nav-label">Next Article ></small>
									<span class="nav-inner">
										<img src="<?php echo get_the_post_thumbnail_url( $next_post->ID ) ?>" class="" alt="<?php echo $next_post->post_title; ?>">		
										
										<span class="nav-title"><?php echo wordwrap( $next_post->post_title, 40, "<br>" ); ?></span>
									</span>
								</a>
							</div>

							<?php
						}
						?>

					</nav>

				<?php }
				
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
