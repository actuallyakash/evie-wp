<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evie
 */

?>

	<footer class="footer footer--dark center">
		<span class="footer__textLogo">
			<?php evie_site_footer(); ?>
		</span>
	</footer>

</div><!-- #page -->

<!-- Search Modal -->
<div id="searchModal" class="modal">
  	<div class="modal-content">
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="screen-reader-text">Search for:</span>
			<input type="search" class="search-input" placeholder="Search …" value="" name="s">
		</form>
		<div class="close">&times;</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
