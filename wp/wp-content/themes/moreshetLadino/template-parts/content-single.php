<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">

        <?php the_content(); ?>

    </div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php moreshet_ladino_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

