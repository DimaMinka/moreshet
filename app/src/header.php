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
					<img src="<?php if(  get_header_image() ) : echo get_header_image(); else : echo get_template_directory_uri(); ?>/images/logo.png<?php endif; ?>" alt="<?php echo get_bloginfo( 'title' ); ?>">
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
        <?php
        for( $i = 1; $i <= 3; $i++) {
            $check_thumbID = ( is_page() ? get_post_meta( $post->ID, 'sg_thumb_'.$i, true ) : '' );
            $postID = ( $check_thumbID != '' ? $post->ID : get_option( 'page_on_front' ) );
            $thumbID = get_post_meta( $postID, 'sg_thumb_'.$i, true );

            $image = wp_get_attachment_image_src( $thumbID, 'large' );
            printf('
                <div class="photo">
                    <img src="%s" alt="%s">
                </div>',
                $image[0],
                get_the_title( $thumbID )
            );
        }
        ?>
    </div>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'moreshet-ladino' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
