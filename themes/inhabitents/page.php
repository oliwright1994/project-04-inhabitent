<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inhabitents
 */

get_header();
?>
<div id="no-sidebar-page-layout" class="single-adventure">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', 'page-no-sidebar');

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			<div class="social-media">
				<a href=""><i class="fab fa-facebook-f"></i>Like</a>
				<a href=""><i class="fab fa-twitter"></i>Tweet</a>
				<a href=""><i class="fab fa-pinterest"></i>Pin</a>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php

	get_footer();
