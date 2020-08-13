<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evie
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- todo: Sidebar-right/sidebar-right classes -->
<aside id="secondary" class="widget-area app__menu sidebar-left">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
