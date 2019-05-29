<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inhabitents
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product-container">
		<div class="product-image-wrapper">
			<img src="<?php echo get_field('product_image'); ?>">
		</div>
		<div class="product-content-wrapper">
			<header class="entry-header">
				<h1 class="product-title">
					<?php echo get_the_title(); ?>
				</h1>
				<h2 class="product-price">
					<?php echo get_field('price'); ?>
				</h2>

			</header><!-- .entry-header -->
			<div class="entry-content">
				<p class="product-description">
					<?php echo get_field('product_description'); ?>
				</p>
				<?php get_template_part('template-parts/content', 'social-media'); ?>
				<?php
				the_content(sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'inhabitents'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				));

				wp_link_pages(array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'inhabitents'),
					'after'  => '</div>',
				));
				?>
			</div>
		</div>
		<?php

		?>
</article><!-- #post-<?php the_ID(); ?> -->
