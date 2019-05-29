<?php
get_header();
?>
<div id="no-sidebar-page-layout" class="home">
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="home-logo-container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/inhabitent-logo-full.svg">
      </div>
      <?php
      while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'front-page');

      endwhile; // End of the loop.
      ?>
    </main><!-- #main -->
  </div><!-- #primary -->

  <?php

  get_footer();
  ?>
