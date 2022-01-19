<?php
/**
 * BreadCrumb Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_breadcrumb( $wp_customize ) {
	
	/** Breadcrumb Settings */
    $wp_customize->add_section(
        'fluid_magazine_breadcrumb_settings',
        array(
            'title'      => __( 'Breadcrumb Settings', 'fluid-magazine' ),
            'priority'   => 50,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'fluid_magazine_ed_breadcrumb',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_breadcrumb',
        array(
            'label'   => __( 'Enable Breadcrumb', 'fluid-magazine' ),
            'section' => 'fluid_magazine_breadcrumb_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'fluid_magazine_ed_current',
        array(
            'default'           => '1',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_current',
        array(
            'label'   => __( 'Show current', 'fluid-magazine' ),
            'section' => 'fluid_magazine_breadcrumb_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'fluid_magazine_breadcrumb_home_text',
        array(
            'default'           => __( 'Home', 'fluid-magazine' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_breadcrumb_home_text',
        array(
            'label'   => __( 'Breadcrumb Home Text', 'fluid-magazine' ),
            'section' => 'fluid_magazine_breadcrumb_settings',
            'type'    => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'fluid_magazine_breadcrumb_separator',
        array(
            'default'           => '>',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_breadcrumb_separator',
        array(
            'label'   => __( 'Breadcrumb Separator', 'fluid-magazine' ),
            'section' => 'fluid_magazine_breadcrumb_settings',
            'type'    => 'text',
        )
    );
    /** BreadCrumb Settings Ends */

	}
add_action( 'customize_register', 'fluid_magazine_customize_register_breadcrumb' );