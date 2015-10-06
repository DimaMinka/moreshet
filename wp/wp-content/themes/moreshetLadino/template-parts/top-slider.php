<?php
/**
 * Template part for displaying top slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

$images = '';

for( $i = 1; $i <= 3; $i++) {
    
    $check_thumbID = ( is_page() ? get_post_meta( $post->ID, 'sg_thumb_'.$i, true ) : '' );
    $postID = ( $check_thumbID != '' ? $post->ID : get_option( 'page_on_front' ) );
    $thumbID = get_post_meta( $postID, 'sg_thumb_'.$i, true );

    $image = wp_get_attachment_image_src( $thumbID, 'large' );
    $images .= sprintf( '<li><img src="%s" alt="%s"></li>', $image[0], get_the_title( $thumbID ) );

}

echo '<ul class="bxslider">' . $images . '</ul>';