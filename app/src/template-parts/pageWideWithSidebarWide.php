<?php
/**
 * Template Name: pageWideWithSidebarWide
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

get_header(); ?>

	<div id="primary" class="content-area content-ww">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area widget-area-ww" role="complementary">
		
<div class="label"><a class="sprite sprite-label" href="#"></a></div>

		<div class="pics">
			<a class="shadow fancybox" href="<?php echo get_template_directory_uri(); ?>/images/sp4.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/sp4.jpg" alt="sidebar pic">
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/sp5.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/sp5.jpg" alt="sidebar pic">
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/sp6.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/sp6.jpg" alt="sidebar pic">
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/sp6.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/sp7.jpg" alt="sidebar pic">
			</a>
		</div>

	</div>


<?php get_footer(); ?>
