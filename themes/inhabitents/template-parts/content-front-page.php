<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inhabitents
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php inhabitents_post_thumbnail(); ?>
	<header class="entry-header-no-sidebar home-page">
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content();
		?>

		<div class="shop-stuff-categories">
			<h2>Shop Stuff</h2>
			<ul class="shop-stuff-container">
				<?php
				$terms = get_terms(array(
					'taxonomy' => 'producttype',
					'hide_empty' => false,
				));
				foreach ($terms as $term) {
					?>
					<li class="front-page-shop-category">
						<img class="shop-svg" src="<?php echo get_stylesheet_directory_uri() . '/images/product-type-icons/' . $term->name . '.svg' ?>">
						<p> <?php echo $term->description ?></p>
						<a class="read-more-product-type" href="<?php echo (site_url()) . '/producttype/' . $term->name ?>"> <?php echo $term->name . " Stuff" ?>
						</a>
					</li>
				<?php
			}
			?>
			</ul>
		</div>
		<!-- // Shop stuff -->
		<h2>Inhabitent Journal</h2>
		<div class=recent-articles-container>
			<?php
			$args = array(
				'posts_per_page' => '3',
				'order' => ' ASC'
			);
			$products = new WP_Query($args); // instantiate our new object
			?>
			<?php if ($products->have_posts()) :
				?>
				<?php while ($products->have_posts()) : $products->the_post(); ?>
					<div class="recent-article-singular">
						<div class="post-thumbnail-wrapper">
							<?php echo get_the_post_thumbnail(); ?>
						</div>
						<p class="post-date"><?php the_time('j F Y') ?> / <?php echo get_comments_number() ?> Comments</p>
						<a href="<?php echo esc_url(get_the_permalink(get_the_ID())) ?>" class="recent-article-title"><?php echo get_the_title() ?></a>
						<div class="read-entry">
							<a href="<?php echo esc_url(get_the_permalink(get_the_ID())) ?>" rel="bookmark"> Read Entry </a>
						</div>
					</div>
					<?php /* Content of the queried post results goes here */ ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<h2>Nothing found!</h2>
			<?php endif; ?>
		</div>
		<!-- // adventures -->
		<h2>Latest Adventures</h2>
		<div class=recent-adventures-container>
			<?php
			$args = array(
				'posts_per_page' => '4',
				'order' => ' ASC',
				'post_type' => 'adventure'
			);
			$adventures = new WP_Query($args); // instantiate our new object
			?>
			<?php if ($adventures->have_posts()) :
				?>
				<?php while ($adventures->have_posts()) : $adventures->the_post(); ?>
					<?php get_template_part('template-parts/content', 'adventure-grid'); ?>
					<?php /* Content of the queried post results goes here */ ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<h2>Nothing found!</h2>
			<?php endif; ?>
		</div>
		<?php
		echo '<div class="read-more adventures"><a href="' . esc_url(site_url()) . '/adventure" rel="bookmark"> More Adventures </a></div>'
		?>
		<?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'inhabitents'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'inhabitents'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
