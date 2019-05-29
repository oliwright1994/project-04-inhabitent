<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Inhabitents
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if (have_posts()) : ?>
			<header class="product-archive-header">
				<h1> <?php echo get_queried_object()->name; ?> </h1>
				<p id="product-type-description"><?php echo get_queried_object()->description ?></p>
			</header><!-- .page-header -->

			<div class="product-archive-grid">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();
					?>
					<div class="product-grid-item">
						<a href="<?php echo esc_url(get_the_permalink(get_the_ID())) ?>" class="product-image-wrapper">
							<img src="<?php echo get_field('product_image'); ?>">
						</a>
						<div class="product-info">
							<p class="product-title">
								<?php echo get_the_title(); ?>
							</p>
							<p class="product-price">
								<?php echo "$" . get_field('price'); ?>
							</p>
							<p id="product-elipses">
								..............................................................................................
							</p>
						</div>
					</div>
				<?php
			endwhile;

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
