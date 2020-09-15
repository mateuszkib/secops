<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">
		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>

			<nav id="main-nav" class="navbar navbar-expand-lg" aria-labelledby="main-nav-label">

				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e('Main Navigation', 'understrap'); ?>
				</h2>

				<div class="container-fluid">
					<div class="row align-items-center w-100">

						<div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-1 offset-lg-1">
							<div class="logo-nav">
								<a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/Logo.png" alt="SecOps Logo" /></a>
							</div>
						</div>

						<div class="col-6">
							<!-- The WordPress Menu goes here -->
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'container_class' => 'collapse navbar-collapse',
									'container_id' => 'navbarNavDropdown',
									'menu_class' => 'navbar-nav',
									'fallback_cb' => '',
									'menu_id' => 'main-menu',
									'depth' => 2,
									'walker' => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</div>
						<div class="col-2 d-md-none d-sm-none d-lg-block">
							<div class="social-media-nav w-100 d-flex justify-content-around">
								<a href="https://www.facebook.com/SecOpsPolska/"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/jam_facebook-square.svg" /></a>
								<a href="https://www.youtube.com/c/SecOpsPolska"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/jam_youtube-square.svg" /></a>
								<a href="https://www.linkedin.com/company/secopspolska/"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/jam_linkedin-square.svg" /></a>
							</div>
						</div>
						<div class="col-2 col-lg-1 d-sm-none d-lg-block language-flag-nav">
							<?php echo do_shortcode('[gtranslate]'); ?>
						</div>
						<button class="ml-auto navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
							<span class="navbar-toggler-icon text-white"></span>
						</button>
					</div>
				</div><!-- .container -->

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->