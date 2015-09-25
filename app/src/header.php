<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moreshet_ladino
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'moreshet-ladino' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<figure class="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php if(  get_header_image() ) : echo get_header_image(); else : echo get_template_directory_uri(); ?>/images/logo.png<?php endif; ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>">
				</a>
			</figure>

			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<p class="site-description"><?php bloginfo( 'description' ); ?></p>

		</div><!-- .site-branding -->

		<?php get_sidebar(); ?>

	</header><!-- #masthead -->

	<div class="page-photos">
		<div class="photo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/header_photo1.jpg" alt="photo1">
		</div>
		<div class="photo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/header_photo2.jpg" alt="photo2">
		</div>
		<div class="photo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/header_photo3.jpg" alt="photo3">
		</div>
	</div>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'moreshet-ladino' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
