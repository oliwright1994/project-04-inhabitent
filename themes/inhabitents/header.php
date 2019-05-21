<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inhabitents
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a href="#featured" class="screen-reader-skip-content">Skip to content</a>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'inhabitents'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">

				<!-- Generator: Adobe Illustrator 16.0.4, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
				<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/inhabitent-logo-tent.svg"> -->
				<!-- Generator: Adobe Illustrator 16.0.4, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
				<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
				<a href='<?php echo esc_url(home_url('/')) ?>'>
					<svg class="tent-logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="200px" height="133px" viewBox="0 0 200 133" enable-background="new 0 0 200 133" xml:space="preserve">
						<g id="Tent">
							<g>
								<path fill="#248A83" d="M193.345,103.788c-1.925-0.985-4.337-0.211-5.371,1.796l-1.522,3.034l-82.954-98.558
				c-0.039-0.077-0.146-0.111-0.186-0.185c-0.121-0.09-0.167-0.187-0.231-0.272c-0.079-0.014-0.099-0.023-0.116-0.049
				c-0.07-0.079-0.205-0.153-0.343-0.233c-0.069-0.079-0.206-0.147-0.282-0.206c-0.138-0.07-0.274-0.099-0.353-0.16
				c-0.145-0.04-0.292-0.104-0.375-0.14c-0.139-0.045-0.274-0.054-0.35-0.072c-0.152-0.03-0.277-0.07-0.429-0.08
				c-0.11-0.006-0.219-0.003-0.357-0.003c-0.124,0-0.277-0.005-0.4,0.005c-0.111,0.009-0.25,0.046-0.361,0.071
				c-0.119,0.019-0.269,0.034-0.385,0.083c-0.11,0.03-0.246,0.084-0.354,0.127c-0.115,0.059-0.263,0.097-0.374,0.169
				c-0.104,0.057-0.204,0.122-0.305,0.199c-0.139,0.08-0.247,0.157-0.35,0.24c-0.019,0.025-0.069,0.035-0.085,0.049
				c-0.096,0.085-0.174,0.182-0.262,0.271c-0.04,0.074-0.119,0.108-0.189,0.186l-82.778,98.558l-1.535-3.034
				c-0.999-2.005-3.403-2.779-5.366-1.796c-1.967,1.048-2.752,3.475-1.748,5.425l9.431,18.818c0.7,1.366,2.1,2.188,3.562,2.188
				c0.61,0,1.221-0.13,1.798-0.453c1.959-0.989,2.741-3.424,1.74-5.424l-4.062-8.121l20.59-24.268v37.419h35.368L96.463,70.39
				l-0.023,58.981h65.507V91.952l20.659,24.27l-4.077,8.121c-0.976,2-0.209,4.435,1.781,5.422c0.571,0.325,1.173,0.455,1.826,0.455
				c1.406,0,2.831-0.822,3.55-2.188l9.435-18.818C196.104,107.263,195.334,104.834,193.345,103.788z M74.747,105.788
				c-1.508-4.88-4.102-9.972-8.511-13.91l23.24-25.592L74.747,105.788z M153.964,82.808v38.449h-49.519V48.366
				c0.007-0.181-0.01-0.355-0.022-0.534c-0.011-0.216-0.034-0.458-0.134-0.665c-0.028-0.174-0.057-0.343-0.099-0.483
				c-0.139-0.321-0.302-0.599-0.486-0.832c-0.057-0.145-0.18-0.248-0.248-0.355c-0.278-0.268-0.507-0.493-0.824-0.71
				c-0.02-0.014-0.035-0.037-0.055-0.048c-0.039-0.056-0.148-0.061-0.188-0.082c-0.334-0.18-0.685-0.337-1.047-0.427
				c-0.027-0.007-0.054-0.019-0.082-0.024c-0.269-0.048-0.534-0.085-0.809-0.085c-0.126,0-0.277,0.038-0.4,0.059
				c-0.069,0.004-0.138,0.006-0.176,0.014c-0.439,0.069-0.831,0.192-1.203,0.381c-0.011,0.005-0.019,0.009-0.059,0.015
				c-0.458,0.252-0.849,0.559-1.163,0.957L57.376,89.688c-0.817,0.904-1.188,2.151-1.014,3.32c0.168,1.236,0.855,2.252,1.88,2.919
				c10.409,6.347,10.674,21.359,10.56,25.33H47v-38.79l53.457-63.54l53.757,63.88L153.964,82.808L153.964,82.808z" />
							</g>
						</g>
					</svg>
				</a>

				<!-- <?php
							the_custom_logo();
							if (is_front_page() && is_home()) :
								?> <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
			else :
				?>
																					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
			endif;
			$inhabitents_description = get_bloginfo('description', 'display');
			if ($inhabitents_description || is_customize_preview()) :
				?>
																					<p class="site-description"><?php echo $inhabitents_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?> -->
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'inhabitents'); ?></button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				));
				?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
