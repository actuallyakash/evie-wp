<?php
/**
 * Block patterns and styles.
 *
 * @package EvieWP WordPress theme
 */

/**
 * Register the theme's block pattern category, patterns, and styles.
 */
function eviewp_register_block_patterns() {
	register_block_pattern_category(
		'eviewp',
		array( 'label' => esc_html__( 'EvieWP', 'eviewp' ) )
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'eviewp-card',
			'label' => esc_html__( 'EvieWP Card', 'eviewp' ),
		)
	);

	register_block_pattern(
		'eviewp/simple-callout',
		array(
			'title'       => esc_html__( 'Simple callout', 'eviewp' ),
			'description' => esc_html__( 'A compact card with a heading, supporting text, and button.', 'eviewp' ),
			'categories'  => array( 'eviewp', 'call-to-action' ),
			'content'     => sprintf(
				'<!-- wp:group {"className":"is-style-eviewp-card","layout":{"type":"constrained"}} --><div class="wp-block-group is-style-eviewp-card"><!-- wp:heading {"level":2} --><h2 class="wp-block-heading">%1$s</h2><!-- /wp:heading --><!-- wp:paragraph --><p>%2$s</p><!-- /wp:paragraph --><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button">%3$s</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->',
				esc_html__( 'Share what matters', 'eviewp' ),
				esc_html__( 'Use this space to introduce an important idea or invite visitors to take action.', 'eviewp' ),
				esc_html__( 'Learn more', 'eviewp' )
			),
		)
	);
}
add_action( 'init', 'eviewp_register_block_patterns' );
