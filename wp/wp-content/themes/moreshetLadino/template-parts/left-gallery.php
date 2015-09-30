<?php
/**
 * Template part for displaying template with right sidebar books.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moreshet_ladino
 */

$labelTop     = ( get_theme_mod( 'sg_top_label', true ) ? ' style="background-image: url('.get_theme_mod( 'sg_top_label', true ).'); background-position: 0 0;"' : '' );
$labelTopLink = ( get_theme_mod( 'sg_top_label_link', true ) ? get_theme_mod( 'sg_top_label_link', true ) : '#' );

$sideBtn      = ( get_theme_mod( 'sg_side_btn', true ) ? ' style="background-image: url('.get_theme_mod( 'sg_side_btn', true ).'); background-position: 0 0;"' : '' );
$sideBtnLink  = ( get_theme_mod( 'sg_side_btn_link', true ) ? get_theme_mod( 'sg_side_btn_link', true ) : '#' );

$phoneTitle  = ( get_theme_mod( 'sg_phone_title', true ) ? get_theme_mod( 'sg_phone_title', true ) : '' );
$phoneNumber  = ( get_theme_mod( 'sg_phone', true ) ? get_theme_mod( 'sg_phone', true ) : '' );
?>

<div id="secondary" class="widget-area widget-area-b" role="complementary">
    <!-- BOOKS + PAYPAL + KATAVA -->

    <div class="label"><a class="sprite sprite-label" href="<?php echo $labelTopLink; ?>"<?php echo $labelTop; ?>></a></div>

    <div class="books">
        <?php
        $bookCat = get_post_meta( $post->ID, 'sg_book_category', true );
        $term_book = get_term( $bookCat, 'book_category' );
        ?>
        <h2><?php echo $term_book->name; ?></h2>

        <?php
        $books = get_posts('posts_per_page=-1&orderby=menu_order&order=ASC&post_type=book');
        foreach ( $books as $book ) :
            $bookClass = '';
            $postThumbId = get_post_thumbnail_id( $book->ID );
            $bookClass .= thumbs_vertical_check( $postThumbId );
            $bookClass .= ( !$book->post_excerpt ? ' sold' : '' );
        ?>

            <a id="book-<?php echo $book->ID; ?>" class="book<?php echo $bookClass; ?>" href="<?php echo get_permalink( $book->ID ); ?>">
                <div><?php echo get_the_post_thumbnail( $book->ID, 'medium' ); ?></div>
                <span><?php echo $book->post_title; ?></span>
            </a>

        <?php endforeach; ?>

        <a class="book-tel" href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneTitle; ?></a>
    </div>

    <div class="paypal"><a href="<?php echo $sideBtnLink; ?>" class="sprite sprite-paypal"<?php echo $sideBtn; ?>>PAYPAL</a></div>

    <?php $sideThumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false ); ?>
    <a class="katava fancybox" href="<?php echo $sideThumb[0]; ?>" rel="group" ><?php the_post_thumbnail( 'medium' ); ?></a>


</div>

<aside id="secondary-right" class="secondary-right">
    <!-- VIDEOS -->

    <div class="videos">
    <?php
    $args = array(
        'post_type'=> 'post',
        'post_status' => 'publish',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_format',
                'field' => 'slug',
                'terms' => array( 'post-format-video' ),
                'operator' => 'IN'
            )
        )
    );
    $videos = get_posts( $args );
    foreach ($videos as $video) :

        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video->post_content, $matches);

        $linkVideo = ( $video->post_excerpt != '' ? $video->post_excerpt : 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1' );
        $videoClasses = ( $video->post_excerpt != '' ? 'local' : 'youtube fancybox.iframe');

    ?>

        <a href="<?php echo $linkVideo; ?>" class="<?php echo $videoClasses; ?>">
            <?php if( has_post_thumbnail( $video->ID ) ) : echo get_the_post_thumbnail( $video->ID, 'medium' ); else : ?><img src="<?php echo get_template_directory_uri(); ?>/images/film.png" alt="" class=""><?php endif; ?>
            <span><?php if( $video->post_excerpt ) echo $video->post_title; ?></span>
        </a>

    <?php endforeach; ?>

    </div>

</aside>
