<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inhabitents
 */

?>
</div><!-- type of page content-->
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<!-- WIDGET AREA FOR FOOTER CONTENT -->
	<div class="footer-container">
		<?php dynamic_sidebar('footer'); ?>
		<div class="footer-logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/inhabitent-logo-text.svg">
		</div>
	</div>
	<div class="site-info">
		<p>COPYRIGHT © 2019 INHABITENT</p>
	</div><!-- .site-info -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
