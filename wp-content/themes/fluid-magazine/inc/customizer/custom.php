<?php
/**
 * Custom Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_custom( $wp_customize ) {
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
    /** Custom CSS*/
    $wp_customize->add_section(
        'fluid_magazine_custom_settings',
        array(
            'title'      => __( 'Custom CSS Settings', 'fluid-magazine' ),
            'priority'   => 60,
            'capability' => 'edit_theme_options',
        )
    );
    
    $wp_customize->add_setting(
        'fluid_magazine_custom_css',
        array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'wp_strip_all_tags'
            )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_custom_css',
        array(
            'label'       => __( 'Custom CSS', 'fluid-magazine' ),
            'section'     => 'fluid_magazine_custom_settings',
            'description' => __( 'Put your custom CSS', 'fluid-magazine' ),
            'type'        => 'textarea',
        )
    );
    /** Custom CSS Ends */
    }
}
add_action( 'customize_register', 'fluid_magazine_customize_register_custom' );