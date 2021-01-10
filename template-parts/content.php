<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EvieWP WordPress theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4' ); ?>>
	<div class="evie__post">

	<?php eviewp_post_thumbnail(); ?>

	<div class="post__details">

		<div class="post__meta">
			<?php
			eviewp_first_category();

			if ( 'post' === get_post_type() ) :
				eviewp_posted_on();
			endif; 
			?>
		</div>
		

		<div class="post__content">
			<?php the_title( '<h3 class="post__heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			
			<?php if ( getOption('defaults', 'enable_excerpt' ) ) { ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<p class="excerpt"> <?php echo substr( get_the_excerpt(), 0, 260 ); ?> </p>
				</a>
			<?php } ?>
		</div>

		<div class="user__info">
			<div class="user__img__container">
				<img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 450 )); ?>" alt="<?php get_the_title(); ?>">
			</div>
			<?php if ( 'post' === get_post_type() ) :
				eviewp_posted_by();
			endif; ?>
		</div>

	</div>

	</div>

</article>

<?php
// Clearfix Fix
echo ( ( $wp_query->current_post + 1 ) % 3 == 0 ) ? '<div class="clearfix"></div>' : '';
?>