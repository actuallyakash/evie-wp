<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package evie
 */

if ( ! function_exists( 'evie_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function evie_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="date">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'evie_first_category' ) ) :
	/**
	 * Gets first category from the list of category
	 */
	function evie_first_category() {
		
		$category_name = get_the_category()[0]->cat_name;
		$category_link = get_category_link( get_cat_ID( $category_name ) );

		echo '<span class="evie__category"><a href="'. esc_url( $category_link ) .'" title="'. $category_name .'">'. $category_name .'</a></span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'evie_get_breadcrumbs' ) ) :
	/**
	 * Gets breadcrumbs for the page
	 */
	function evie_get_breadcrumbs() {
		
		echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
		if ( is_category() || is_single() ) {
			echo " > ";
			the_category(' &bull; ');
				if ( is_single() ) {
					echo " > ";
					the_title();
				}
		} elseif ( is_page() ) {
			echo " > ";
			echo the_title();
		} elseif ( is_search() ) {
			echo " > Search Results for... ";
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
		}
	
	}
endif;

if ( ! function_exists( 'evie_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function evie_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'evie' ),
			'<span class="author stress"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="user__name"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'evie_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function evie_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'evie' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'evie' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'evie' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'evie' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'evie' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'evie' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'evie_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function evie_post_thumbnail() {
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

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'evie_is_comment_by_post_author' ) ) :
	/**
	 * Check if the specified comment is written by the author of the post commented on
	 */
	function evie_is_comment_by_post_author( $comment = null ) {

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

if ( ! function_exists( 'evie_site_footer' ) ) {
	/**
	 * Display footer
	 */
	function evie_site_footer() {
		$footerText = sprintf( '&copy; %1$s %2$s &bull; %4$s <a href="%3$s" itemprop="url">%5$s</a>',
			date( 'Y' ),
			get_bloginfo( 'name' ),
			esc_url( 'http://akashgupta.xyz' ),
			_x( 'Powered by', 'Evie', 'evie' ),
			__( 'Evie', 'evie' )
        );
        
        echo $footerText; // phpcs:ignore.
	}
}

if ( ! function_exists( 'evie_pagination' ) ) :
    /**
     * Display pagination for archives.
     */
    function evie_pagination() { ?>
		<div class="pagination">

		<?php
			the_posts_pagination( array(
				'mid_size'  => 1,
				'prev_text' => '< ' . esc_html__( 'Previous', 'mtminimag' ),
				'next_text' => esc_html__( 'Next', 'mtminimag' ).' >',
			) );
		?>
		</div>

        <?php wp_reset_postdata();
    }
endif;