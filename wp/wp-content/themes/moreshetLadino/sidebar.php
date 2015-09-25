<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moreshet_ladino
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="search-field" class="widget-area search-area"><!-- change class and id -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
