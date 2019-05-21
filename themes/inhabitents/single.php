<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Inhabitents
 */

get_header();
?>
<div id="content-sidebar-layout">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', get_post_type());

				the_post_navigation(); ?>

				<footer class="entry-footer">
					<?php inhabitents_entry_footer(); ?>
					<div class="social-media">
						<a href=""><i class="fab fa-facebook-f"></i>Like</a>
						<a href=""><i class="fab fa-twitter"></i>Tweet</a>
						<a href=""><i class="fab fa-pinterest"></i>Pin</a>
					</div>
				</footer><!-- .entry-footer -->

				<?php // If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_sidebar();
	get_footer();
