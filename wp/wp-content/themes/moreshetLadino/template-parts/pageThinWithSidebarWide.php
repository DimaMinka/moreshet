<?php
/**
 * Template Name: pageThinWithSidebarWide
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

get_header(); ?>

	<div id="primary" class="content-area content-tw">
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

	<div id="secondary" class="widget-area widget-area-tw" role="complementary">
		
		<div class="label"><a class="sprite sprite-label" href="#"></a></div>

		<div class="pics">

			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_1.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_1.jpg" alt="sidebar pic">
				<span>כרוז נאצי מכיבוש יוון</span>
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_2.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_2.jpg" alt="sidebar pic">
				<span>מחנה השמדה יאסנוביץ</span>
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_3.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_3.jpg" alt="sidebar pic">
				<span>מחנה השמדה אושוויץ</span>
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_4.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_4.jpg" alt="sidebar pic">
				<span>דגם של מחנה השמדה טרבלינקה</span>
			</a>
			<a class="shadow fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_5.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_5.jpg" alt="sidebar pic">
			</a>
			<a class="shadow fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_6.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_6.jpg" alt="sidebar pic">
			</a>
			<a class="red-border fancybox" href="<?php echo get_template_directory_uri(); ?>/images/wide_sb_7.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/wide_sb_7.jpg" alt="sidebar pic">
			</a>

		</div>

	</div>


<?php get_footer(); ?>
