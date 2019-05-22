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
	<header class="entry-header">
		<?php inhabitents_post_thumbnail(); ?>
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
			?>
			<div class="entry-meta">
				<?php
				inhabitents_posted_on();
				echo " /";
				inhabitents_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_excerpt();
		?>
		<?php
		echo '<div class="read-more"><a href="' . esc_url(get_permalink()) . '" rel="bookmark"> Read More </a></div>'
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
