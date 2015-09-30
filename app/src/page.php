<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

get_header();

$sidebar_style = get_post_meta( $post->ID, 'sg_sidebar_style', true );

if( $sidebar_style == '' ) $classes = ' content-tt';
if( $sidebar_style == 'sg_sidebar_right_book' ) $classes = ' content-rs';
if( $sidebar_style == 'sg_sidebar_wide' ) $classes = ' content-tw';
if( $sidebar_style == 'sg_sidebar_no' ) $classes = ' content-ws';
$sideClasses = ( $sidebar_style == '' ? ' widget-area-tt' : ' widget-area-tw' );

?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="primary" class="content-area<?php echo $classes; ?>">
		<main id="main" class="site-main" role="main">

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <?php if( $sidebar_style == '' || $sidebar_style == 'sg_sidebar_wide' ) : ?>
    <div id="secondary" class="widget-area<?php echo $sideClasses;  ?>" role="complementary">
        <?php get_template_part( 'template-parts/left', 'gallery' ); ?>
    </div>
    <?php endif; ?>

    <?php if( $sidebar_style == 'sg_sidebar_right_book' ) get_template_part( 'template-parts/right', 'book' ); ?>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
