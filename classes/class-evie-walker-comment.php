<?php
/**
 * Custom comment walker for WP Evie.
 *
 * @package WordPress
 * @subpackage WP_Evie
 * @since WP Evie 1.0
 */

if ( ! class_exists( 'Evie_Walker_Comment' ) ) {
	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments, based on the walker in Twenty Nineteen.
	 */
	class Evie_Walker_Comment extends Walker_Comment {

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 * @see https://developer.wordpress.org/reference/functions/get_avatar/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function html5_comment( $comment, $depth, $args ) {

			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

			?>
			<<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment, 'comment' ); ?>>
				<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

					<div class="comment-header">
						<?php
						$comment_author     = get_comment_author( $comment );
						$avatar             = get_avatar( $comment, $args['avatar_size'] );
						$comment_timestamp 	= sprintf( __( '%1$s at %2$s', 'Evie' ), get_comment_date( '', $comment ), get_comment_time() );
						?>
						
						<div class="author-img">
							<?php echo $avatar; ?>
						</div>
						<div class="comment-author">
							<h6 class="author"><?php echo $comment_author; ?></h6>

							<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
								<span class="date"><?php echo esc_html( $comment_timestamp ); ?></span>
							</time>
						</div>
					</div>

					<div class="comment-text">
						<?php comment_text(); ?>
						
						<span class="reply">
							<i class="fa fa-reply"></i>
							
							<?php
							
							$comment_reply_link = get_comment_reply_link(
								array_merge(
									$args,
									array(
										'add_below' => 'div-comment',
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
										'before'    => '<span class="comment-reply">',
										'after'     => '</span>',
									)
								)
							);
		
							$by_post_author = evie_is_comment_by_post_author( $comment );
		
							if ( $comment_reply_link || $by_post_author ) {

								if ( $comment_reply_link ) {
									echo $comment_reply_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
								}
								if ( $by_post_author ) {
									echo '<span class="by-post-author">' . __( 'By Post Author', 'Evie' ) . '</span>';
								}

							}
							?>
						</span>
					</div>

					<?php

					if ( '0' === $comment->comment_approved ) {
						?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'Evie' ); ?></p>
						<?php
					}

						
					if ( get_edit_comment_link() ) {
						echo ' <span aria-hidden="true">&bull;</span> <a class="comment-edit-link" href="' . esc_url( get_edit_comment_link() ) . '">' . __( 'Edit', 'Evie' ) . '</a>';
					}

					?>

				</div><!-- .comment-body -->

			<?php
		}
	}
}
