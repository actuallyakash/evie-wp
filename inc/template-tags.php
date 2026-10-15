<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EvieWP WordPress theme
 */

if ( ! function_exists( 'eviewp_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function eviewp_posted_on() {
		/* translators: 1: published date & time 2: published date & time */
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			/* translators: 1: published date & time 2: published date & time */
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: 1: Post Link 2: Post Publish Time */
			'<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		);

		echo wp_kses_post( '<span class="date">' . $posted_on . '</span>' );

	}
endif;

if ( ! function_exists( 'eviewp_first_category' ) ) :
	/**
	 * Gets first category from the list of category
	 */
	function eviewp_first_category() {

		if( empty( get_the_category() ) ) {
			return;
		}
		
		$category      = get_the_category()[0];
		$category_name = $category->cat_name;
		$category_link = get_category_link( $category->term_id );

		if ( ! empty( $category_name ) ) {

			printf(
				'<span class="evie__category"><a href="%1$s">%2$s</a></span>',
				esc_url( $category_link ),
				esc_html( $category_name )
			);

		}
	}
endif;

if ( ! function_exists( 'eviewp_get_breadcrumbs' ) ) :
	/**
	 * Gets breadcrumbs for the page
	 */
	function eviewp_get_breadcrumbs() {
		
		printf(
			'<a href="%1$s" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			esc_html__( 'Home', 'eviewp' )
		);
		if ( is_category() || is_single() ) {
			esc_html_e( ' > ', 'eviewp' );
			echo wp_kses_post( get_the_category_list( ' &bull; ' ) );
				if ( is_single() ) {
					esc_html_e( ' > ', 'eviewp' );
					echo esc_html( get_the_title() );
				}
		} elseif ( is_page() ) {
			esc_html_e( ' > ', 'eviewp' );
			echo esc_html( get_the_title() );
		} elseif ( is_search() ) {
			esc_html_e( ' > Search Results for... ', 'eviewp' );
			echo '"<em>';
			echo esc_html( get_search_query( false ) );
			echo '</em>"';
		}
	
	}
endif;

if ( ! function_exists( 'eviewp_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function eviewp_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'eviewp' ),
			'<span class="author stress"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo wp_kses_post( '<span class="user__name"> ' . $byline . '</span>' );

	}
endif;

if ( ! function_exists( 'eviewp_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function eviewp_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
							'class' => 'featured-image'
						)
					);
				?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<div class="eviewp__img__container">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
						the_post_thumbnail(
							'post-thumbnail',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
								'class' => 'featured-image'
							)
						);
					?>
				</a>
			</div>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'eviewp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function eviewp_body_open() {
		do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
	}
endif;

if ( ! function_exists( 'eviewp_is_comment_by_post_author' ) ) :
	/**
	 * Check if the specified comment is written by the author of the post commented on
	 */
	function eviewp_is_comment_by_post_author( $comment = null ) {

		if ( is_object( $comment ) && $comment->user_id > 0 ) {

			$user = get_userdata( $comment->user_id );
			$post = get_post( $comment->comment_post_ID );
	
			if ( ! empty( $user ) && ! empty( $post ) ) {
	
				return $comment->user_id === $post->post_author;
	
			}
		}
		return false;
		
	}
endif;

if ( ! function_exists( 'eviewp_site_footer' ) ) {
	/**
	 * Display footer
	 */
	function eviewp_site_footer() {
		/* translators: 1: current year 2: site title 3: theme's dev URL 4: Powered by string 5: Theme name */
		printf(
			'&copy; %1$s %2$s &bull; %4$s <a href="%3$s" itemprop="url">%5$s</a>',
			esc_html( wp_date( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) ),
			esc_url( 'https://actuallyakash.github.io' ),
			esc_html_x( 'Powered by', 'EvieWP', 'eviewp' ),
			esc_html__( 'EvieWP', 'eviewp' )
		);
	}
}

if ( ! function_exists( 'eviewp_pagination' ) ) :
    /**
     * Display pagination for archives.
     */
    function eviewp_pagination() { ?>

		<?php
			the_posts_pagination( array(
				'mid_size'  => 1,
				'prev_text' => '< ' . esc_html__( 'Previous', 'eviewp' ),
				'next_text' => esc_html__( 'Next', 'eviewp' ).' >',
			) );
		?>

        <?php wp_reset_postdata();
    }
endif;

if ( ! function_exists( 'eviewp_get_tags' ) ) :
	/**
	 * Gets the tags for the post
	 */
	function eviewp_get_tags() {

		$tags = get_the_tags();

		echo '<div class="evie__tags">';
		
		if ( $tags && ! is_wp_error( $tags ) ) {
			foreach ($tags as $tag ) {
				printf(
					'<span class="evie__category"><a href="%1$s">%2$s</a></span>',
					esc_url( get_tag_link( $tag->term_id ) ),
					esc_html( ucfirst( $tag->name ) )
				);
			}
		}

		echo '</div>';

	}
endif;

if ( ! function_exists( 'eviewp_singular_pagination' ) ) :
	/**
	 * Gets the page for single post
	 */
	function eviewp_singular_pagination() {

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
							<small class="nav-label"><?php esc_html_e( '< Previous Article', 'eviewp' ); ?></small>
							<span class="nav-inner">
								<?php if ( ! empty( get_the_post_thumbnail_url( $prev_post->ID ) ) ) { ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( $prev_post->ID ) ) ?>" alt="<?php echo esc_attr( $prev_post->post_title ); ?>">	
								<?php } ?>
								
								<span class="nav-title"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
							</span>
						</a>
					</div>

					<?php
				}
				
				if( $next_post ) {
					?>

					<div class="nav-el nav-right">
						<a href="<?php echo esc_url(  get_permalink(  $next_post->ID  )  ); ?>" rel="next">
							<small class="nav-label"><?php esc_html_e( 'Next Article >', 'eviewp' ); ?> </small>
							<span class="nav-inner">
								<?php if ( ! empty( get_the_post_thumbnail_url( $next_post->ID ) ) ) { ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( $next_post->ID ) ) ?>" class="" alt="<?php echo esc_attr( $next_post->post_title ); ?>">	
								<?php } ?>
								
								<span class="nav-title"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
							</span>
						</a>
					</div>

					<?php
				}
				?>

			</nav>

		<?php }

	}
endif;
