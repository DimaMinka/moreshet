<?php
/**
 * moreshet ladino Theme Customizer.
 *
 * @package moreshet_ladino
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function moreshet_ladino_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'advanced_settings' , array(
        'title'      => __( 'Advanced Options' ),
        'priority'   => 20,
    ) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->add_setting(
        'sg_top_label',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sg_top_label',
            array(
                'label'      => __( 'Upload' ).' - '.__( 'Top Label', 'moreshet-ladino' ),
                'section'    => 'advanced_settings',
                'settings'   => 'sg_top_label'
            )
        )
    );

    $wp_customize->add_setting(
        'sg_top_label_link',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => ''
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sg_top_label_link',
            array(
                'label'      => __( 'URL' ).' - '.__( 'Top Label', 'moreshet-ladino' ),
                'section'    => 'advanced_settings',
                'settings'   => 'sg_top_label_link',
                'type'       => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'sg_side_btn',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sg_side_btn',
            array(
                'label'      => __( 'Upload' ).' - '.__( 'Side button', 'moreshet-ladino' ),
                'section'    => 'advanced_settings',
                'settings'   => 'sg_side_btn'
            )
        )
    );

    $wp_customize->add_setting(
        'sg_side_btn_link',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => ''
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sg_side_btn_link',
            array(
                'label'      => __( 'URL' ).' - '.__( 'Side button', 'moreshet-ladino' ),
                'section'    => 'advanced_settings',
                'settings'   => 'sg_side_btn_link',
                'type'       => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'sg_phone_title',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => ''
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sg_phone_title',
            array(
                'label'      => __( 'Title' ) . ' - ' . __( 'Phone number', 'moreshet-ladino' ),
                'section'    => 'advanced_settings',
                'settings'   => 'sg_phone_title',
                'type'       => 'text',
            )
        )
    );

    $wp_customize->add_setting(
        'sg_phone',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => ''
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sg_phone',
            array(
                'label'      => __( 'Phone number', 'moreshet-ladino' ),
                'section'    => 'advanced_settings',
                'settings'   => 'sg_phone',
                'type'       => 'text',
            )
        )
    );
}
add_action( 'customize_register', 'moreshet_ladino_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function moreshet_ladino_customize_preview_js() {
	wp_enqueue_script( 'moreshet_ladino_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'moreshet_ladino_customize_preview_js' );
