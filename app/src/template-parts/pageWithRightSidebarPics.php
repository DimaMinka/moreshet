<?php
/**
 * Template Name: pageWithRightSidebarBooks
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

get_header(); ?>

	<div id="primary" class="content-area content-rs">
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

	<div id="secondary" class="widget-area widget-area-p" role="complementary">
		<div class="label"><a class="sprite sprite-label" href="#"></a></div>

		<div class="pics">

			<a class="shadow fancybox" href="<?php echo get_template_directory_uri(); ?>/images/pic_sb_1.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic_sb_1.jpg" alt="sidebar pic">
			</a>
			<a class="shadow fancybox" href="<?php echo get_template_directory_uri(); ?>/images/pic_sb_2.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic_sb_2.jpg" alt="sidebar pic">
			</a>
			<a class="shadow fancybox" href="<?php echo get_template_directory_uri(); ?>/images/pic_sb_3.jpg" rel="group">
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic_sb_3.jpg" alt="sidebar pic">
			</a>

		</div>
		
	</div>

	<aside id="secondary-right" class="secondary-right">
		<!-- VIDEOS -->
		<div class="videos">
			<a href="https://www.youtube.com/embed/9R-6PqE11fU?autoplay=1" class="youtube fancybox.iframe">
				<img src="<?php echo get_template_directory_uri(); ?>/images/video.jpg" alt="" class="">
				<span></span>
			</a>
			<a href="https://www.youtube.com/embed/9R-6PqE11fU?autoplay=1" class="youtube fancybox.iframe">
				<img src="<?php echo get_template_directory_uri(); ?>/images/video.jpg" alt="" class="">
				<span></span>
			</a>
			<a href="#" class="local">
				<img src="<?php echo get_template_directory_uri(); ?>/images/film.png" alt="" class="">
				<span>SOME DESCRITION</span>
			</a>
			<a href="#" class="local">
				<img src="<?php echo get_template_directory_uri(); ?>/images/film.png" alt="" class="">
				<span>SOME DESCRITION</span>
			</a>
		</div>

	</aside>

<?php get_footer(); ?>
