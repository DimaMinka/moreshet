<?php
/**
 * Template Name: pageWithRightSidebarBooks2
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

	<div id="secondary" class="widget-area widget-area-b" role="complementary">
		<!-- BOOKS + PAYPAL + KATAVA -->

		<div class="label"><a class="sprite sprite-label" href="#"></a></div>

		<div class="books">
			<h2>ספרים למכירה</h2>
			<a class="book" href="#">
				<div><img src="<?php echo get_template_directory_uri(); ?>/images/book-1.jpg" alt="book for sale"></div>
				<span>הטלאי הסלוניקאי</span>
			</a>
			<a class="book sold" href="#">
				<div><img src="<?php echo get_template_directory_uri(); ?>/images/book-2.jpg" alt="book for sale"></div>
				<span>הפרוכת של סקופיה</span>
			</a>
			<a class="book sold" href="#">
				<div><img src="<?php echo get_template_directory_uri(); ?>/images/book-3.jpg" alt="book for sale"></div>
				<span>מגירוש לגירוש</span>
			</a>
			<a class="book" href="#">
				<div><img src="<?php echo get_template_directory_uri(); ?>/images/book-4.jpg" alt="book for sale"></div>
				<span>הצבעוני הפורטוגזי</span>
			</a>
			<a class="book wide" href="#">
				<div><img src="<?php echo get_template_directory_uri(); ?>/images/book-5.jpg" alt="book for sale"></div>
				<span>הרוקח מטריקאלה</span>
			</a>

			<a class="book-tel" href="tel:0527690648">צור קשר עם ל: 052-7690648</a>
		</div>

		<div class="paypal"><a href="#" class="sprite sprite-paypal">PAYPAL</a></div>

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
