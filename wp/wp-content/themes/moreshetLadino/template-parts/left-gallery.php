<?php
/**
 * Template part for displaying template with right sidebar books.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */
?>

<div class="label"><a class="sprite sprite-label" href="#"></a></div>

<div class="pics">

    <?php
    add_filter('shortcode_atts_gallery','force_large_images',10,3);
    if( has_shortcode( $post->post_content, 'gallery' ) ) {

        $galleries = get_post_galleries_images($post->ID, false);
        if (isset($galleries[0])) {
            foreach ($galleries[0] as $image) {

                $path_parts = pathinfo($image);
                $imageTitle = $path_parts['filename'];
                $postImage = get_page_by_title($imageTitle, '', 'attachment');
                $imageAttr = wp_get_attachment_image_src($postImage->ID, 'medium', '');
                $imageClass = get_post_meta($postImage->ID, '_wp_attachment_image_alt', true) ? ' shadow' : ' red-border'; ?>

                <a class="fancybox<?php echo $imageClass; ?>" href="<?php echo $image; ?>" rel="group-<?php echo $post->ID; ?>">
                    <img src="<?php echo $imageAttr[0]; ?>" alt="<?php echo $post->post_title; ?>">
                </a>

            <?php }
        }
    }
    ?>

</div>
