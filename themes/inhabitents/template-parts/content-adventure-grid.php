<div class="recent-adventure-singular">
	<div class="post-thumbnail-wrapper">
		<?php echo get_the_post_thumbnail(); ?>
	</div>
	<div class="recent-adventures-text">
		<a class="recent-adventure-title" href="<?php echo esc_url(get_the_permalink(get_the_ID())) ?>"><?php echo get_the_title() ?></a>
		<div class="read-more-adventure">
			<a href="<?php echo esc_url(get_the_permalink(get_the_ID())) ?>" rel="bookmark"> Read More </a>
		</div>
	</div>
</div>
