<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package moreshet_ladino
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function moreshet_ladino_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'moreshet_ladino_body_classes' );

/**
 * Adds custom post type.
 * 
 */

function books() {

    $labels = array(
        'name'                => _x( 'Books', 'Post Type General Name' ),
        'singular_name'       => _x( 'Book', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Books' ),
        'name_admin_bar'      => __( 'Book' ),
        'parent_item_colon'   => __( 'Parent post:' ),
        'all_items'           => __( 'All Posts' ),
        'add_new_item'        => __( 'Add New Post' ),
        'add_new'             => __( 'Add New Post' ),
        'new_item'            => __( 'New Post' ),
        'edit_item'           => __( 'Edit Post' ),
        'update_item'         => __( 'Update Post' ),
        'view_item'           => __( 'View Post' ),
        'search_items'        => __( 'Search Post' ),
        'not_found'           => __( 'No posts found.' ),
        'not_found_in_trash'  => __( 'No posts found in Trash' ),
    );
    $args = array(
        'label'               => __( 'Book' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'excerpt', ),
        'taxonomies'          => array( 'book_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 25,
        'menu_icon'           => 'dashicons-book',
        'show_in_admin_bar'   => false,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'book', $args );

    $labels = array(
        'name'                       => __( 'Categories' ),
        'singular_name'              => __( 'Category' ),
        'menu_name'                  => __( 'Categories' ),
        'all_items'                  => __( 'All Categories' ),
        'parent_item'                => __( 'Parent Category' ),
        'parent_item_colon'          => __( 'Parent Category:' ),
        'new_item_name'              => __( 'New Category Name' ),
        'add_new_item'               => __( 'Add New Category' ),
        'edit_item'                  => __( 'Edit Category' ),
        'update_item'                => __( 'Update Category' ),
        'view_item'                  => __( 'View Category' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas' ),
        'add_or_remove_items'        => __( 'Add or remove categories' ),
        'choose_from_most_used'      => __( 'Choose from the most used' ),
        'popular_items'              => __( 'Popular Categories ' ),
        'search_items'               => __( 'Search Categories ' ),
        'not_found'                  => __( 'No categories found.' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'book_category', array( 'book' ), $args );

}
add_action( 'init', 'books', 0 );

if ( ! function_exists( 'thumbs_vertical_check' ) ) :
    function thumbs_vertical_check( $post_thumbnail_id ) {

        $image_data = wp_get_attachment_image_src( $post_thumbnail_id , 'medium' );

        //Get the image width and height from the data provided by wp_get_attachment_image_src()
        $width  = $image_data[1];
        $height = $image_data[2];

        if ( $width > $height ) {
            $html = ' wide';
        }
        return $html;
    }
endif;
