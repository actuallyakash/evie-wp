<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EvieWP WordPress theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<aside class="comment-box-wrap">
	<div id="comments" class="comments-area comment-box-content">

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>

			<h3 class="center"><?php esc_html_e( 'Comments', 'eviewp' ); ?></h3>

			<div class="comments">
				<ul>
					<?php
					wp_list_comments(
						array(
							'walker'      => new EvieWP_Walker_Comment(),
							'avatar_size' => 60,
							'style'       => 'ul',
						)
					);
					?>
				</ul><!-- .comment-list -->
			</div>

			<?php

			the_comments_navigation();

		endif; // Check for have_comments().
		
		// Comment Form
		if ( comments_open() || pings_open() ) {

			$comments_args = array(
				'fields' => array(
					'author' => '<div class="col-md-4">
									<p class="comment-form-author"><label for="author">'. __( 'Name', 'eviewp' ) .'<span class="required">*</span></label>
										<input placeholder="Name" id="author" name="author" aria-required="true" type="text" size="30" maxlength="245" required="required">
									</p>
								</div>',
					'email' => '<div class="col-md-4">
									<p class="comment-form-email"><label for="email">'. __( 'Email', 'eviewp' ) .'<span class="required">*</span></label>
										<input placeholder="you@example.com" id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required">
									</p>
								</div>',
					'url' => '<div class="col-md-4">
								<p class="comment-form-url">
									<label for="url">'. __( 'Website', 'eviewp' ) .'</label> <input placeholder="example.com" id="url" name="url" type="url" value="" size="30" maxlength="200">
								</p>
							</div>',
				),
				'comment_field' => '<div class="col-md-12">
									<p class="comment-form-comment"><label for="comment">'. __( 'Comment', 'eviewp' ) .'</label>
										<textarea placeholder="Leave Your Comment" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
									</p>
								</div>',
				'submit_button' => '<div class="form-submit">
										<input name="submit" type="submit" id="submit" class="button button__primary" value="Post Comment">
									</div>',
				'comment_notes_before' => '<small class="comment-notes">'. __( 'Your email address will not be published. Required fields are marked *', 'eviewp' ) .'</small>',
				'label_submit' => __( 'Post Comment', 'eviewp' ),
				'cancel_reply_before' => '<small class="cancel-reply">',
				'cancel_reply_after' => '</small>',
				'cancel_reply_link' => __( 'Cancel', 'eviewp' ),
			);
			
			echo '<div class="center">';
			comment_form( $comments_args );
			echo '</div>';

		} elseif ( is_single() ) {

				if ( $comments ) {
					echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
				}

			?>

			<div class="comment-respond center" id="respond">

				<p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'eviewp' ); ?></p>

			</div><!-- #respond -->

			<?php
		}
		?>

	</div><!-- #comments -->
</aside>