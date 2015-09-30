<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php if( get_post_meta( $post->ID, 'sg_sidebar_style', true ) != 'sg_sidebar_right_book' ) the_post_thumbnail( 'single-post-thumbnail' ); ?>
		<?php add_filter('the_content', 'strip_shortcodes'); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moreshet-ladino' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<div class="gallery">
  <?php
    add_filter('shortcode_atts_gallery','force_large_images',10,3);
	  if( has_shortcode( $post->post_content, 'gallery' ) ) {
      $galleries = get_post_galleries_images( $post->ID, false );
      foreach( $galleries as $gallery ) {

        foreach( $gallery as $image ) {

        		$path_parts = pathinfo( $image );
    				$imageTitle = $path_parts['filename'];
    				$postImage = get_page_by_title( $imageTitle, '', 'attachment' );
    				$imageAttr = wp_get_attachment_image_src( $postImage->ID, 'medium', '' );
    				$imageClass = get_post_meta( $postImage->ID, '_wp_attachment_image_alt', true ) ? 'shadow' : 'red-border';

            ?>
            <figure class="gallery-item">
							<div class="gallery-icon">
								<a class="fancybox <?php echo $imageClass; ?>" rel="group-<?php echo $post->ID; ?>" href="<?php echo $image; ?>">
									<img src="<?php echo $imageAttr[0]; ?>" alt="<?php echo $post->post_title; ?>">
									<?php if( $postImage->post_excerpt ) : ?><span class="caption"> <?php echo $postImage->post_excerpt; ?></span><?php endif; ?>
								</a>
							</div>
						</figure>

             <?php  }
      }
	  } 
	?>
</div>





		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'moreshet-ladino' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

