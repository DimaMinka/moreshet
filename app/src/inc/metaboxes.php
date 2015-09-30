<?php
/**
 * moreshet ladino Theme Metaboxes.
 *
 * @package moreshet_ladino
 */

/**
 * Add page metabox support.
 *
 */

class page_metabox {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'page_metaboxe',
            __( 'Advanced Options' ),
            array( $this, 'render_metabox' ),
            'page',
            'side',
            'high'
        );

    }

    public function render_metabox( $post ) {

        // Retrieve an existing value from the database.
        $sg_sidebar_style = get_post_meta( $post->ID, 'sg_sidebar_style', true );
        $sg_book_category = get_post_meta( $post->ID, 'sg_book_category', true );

        // Set default values.
        if( empty( $sg_sidebar_style ) ) $sg_sidebar_style = '';
        if( empty( $sg_book_category ) ) $sg_book_category = '';

        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th style="width: 40px;"><label for="sg_sidebar_right_book" class="sg_sidebar_right_book_label">' . __( 'Style' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="radio" name="sg_sidebar_style" class="sg_sidebar_style_field" value="sg_regular" ' . checked( $sg_sidebar_style, 'sg_regular', false ) . '> ' . __( 'Default' ) . '<br>';
        echo '			<input type="radio" name="sg_sidebar_style" class="sg_sidebar_style_field" value="sg_sidebar_right_book" ' . checked( $sg_sidebar_style, 'sg_sidebar_right_book', false ) . '> ' . __( 'Sidebar' ) . ' - ' . __( 'Align right' ) . '<br>';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th style="width: 40px;"><label for="sg_book_category" class="sg_book_category_label">' . __( 'Books', 'moreshet-ladino' ) . '</label></th>';
        echo '		<td>';
        echo '			<select id="sg_book_category" name="sg_book_category" class="sg_book_category_field">';
        echo '			<option value="sg_1 " ' . selected( $sg_book_category, '', false ) . '> ' . __( 'Select Category' );

        $book_categories = get_terms( 'book_category', '' );
        foreach ( $book_categories as $book_cat ) {
            echo '	    <option value="' . $book_cat->term_id . '" ' . selected( $sg_book_category, $book_cat->term_id, false ) . '> ' . $book_cat->name;
        }

        echo '			</select>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Check if it's not a revision.
        if ( wp_is_post_revision( $post_id ) )
            return;

        // Sanitize user input.
        $sg_new_sidebar_style = isset( $_POST[ 'sg_sidebar_style' ] ) ? $_POST[ 'sg_sidebar_style' ] : '';
        $sg_new_book_category = isset( $_POST[ 'sg_book_category' ] ) ? $_POST[ 'sg_book_category' ] : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'sg_sidebar_style', $sg_new_sidebar_style );
        update_post_meta( $post_id, 'sg_book_category', $sg_new_book_category );

    }

}

new page_metabox;


/**
 * Add page metabox support.
 *
 */

add_action( 'admin_enqueue_scripts', 'sg_enqueue_admin' );
function sg_enqueue_admin() {
    wp_enqueue_media();
    wp_enqueue_script( 'sg-admin-script', get_stylesheet_directory_uri() . '/admin/admin.js', array(), null, true );
    wp_localize_script( 'sg-admin-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}

class pageThumbs_metabox {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'page_metaboxe',
            __( 'Thumbnails' ),
            array( $this, 'render_metabox' ),
            'page',
            'side',
            'high'
        );

    }

    public function render_metabox( $post ) {

        // Retrieve an existing value from the database.
        $sg_thumb_1 = get_post_meta( $post->ID, 'sg_thumb_1', true );
        $sg_thumb_2 = get_post_meta( $post->ID, 'sg_thumb_2', true );
        $sg_thumb_3 = get_post_meta( $post->ID, 'sg_thumb_3', true );

        // Set default values.
        if( empty( $sg_thumb_1 ) ) $sg_thumb_1 = '';
        if( empty( $sg_thumb_2 ) ) $sg_thumb_2 = '';
        if( empty( $sg_thumb_3 ) ) $sg_thumb_3 = '';
        $image = '';
        if ( $sg_thumb_1 ) {
            $image = wp_get_attachment_image_src( $sg_thumb_1, 'thumbnail' );
            $image = $image[0];
        }

        // Form fields.
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="sg_thumb_1" class="sg_thumb_1_label">' . __( 'Image' ) . ' - ' . __( 'Align right' ) . '</label></th>';
        echo '	</tr>';
        echo '	<tr>';
        echo '		<td>';
        echo '      <img src="' . $image . '" class="sg_preview_image" style="max-width: 150px;" />';
        echo '  	<input type="hidden" id="sg_thumb_1" name="sg_thumb_1"  class="sg_thumb_1_field sg_upload_image" value="' . esc_attr__( $sg_thumb_1 ) . '">';
        echo '      <input class="sg_upload_image_button button" type="button" value="' . __( 'Choose Image' ) . '" />';
        echo '      <small><a href="#" class="sg_clear_image">' . __( 'Reset Image' ) . '</a></small>';
        echo '		</td>';
        echo '	</tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Check if it's not a revision.
        if ( wp_is_post_revision( $post_id ) )
            return;

        // Sanitize user input.
        $sg_new_thumb_1 = isset( $_POST[ 'sg_thumb_1' ] ) ? sanitize_text_field( $_POST[ 'sg_thumb_1' ] ) : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'sg_thumb_1', $sg_new_thumb_1 );

    }

}

new pageThumbs_metabox;