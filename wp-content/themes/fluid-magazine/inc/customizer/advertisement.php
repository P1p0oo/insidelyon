<?php
/**
 * Advertisement Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_ads( $wp_customize ) {

    /** Advertisement Settings */
    
    $wp_customize->add_section(
        'fluid_magazine_ad_settings',
        array(
            'title'       => __( 'Avertisement Settings', 'fluid-magazine' ),
            'description' => __( 'Header AD Settings', 'fluid-magazine' ),
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Header AD */
    $wp_customize->add_setting(
        'fluid_magazine_ed_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_header_ad',
        array(
            'label'   => __( 'Enable Header Advertisement', 'fluid-magazine' ),
            'section' => 'fluid_magazine_ad_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'fluid_magazine_open_link_diff_tab',
        array(
            'default'           => '1',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_open_link_diff_tab',
        array(
            'label'   => __( 'Open Link in Different Tab', 'fluid-magazine' ),
            'section' => 'fluid_magazine_ad_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Header Advertisement */
    $wp_customize->add_setting(
        'fluid_magazine_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'fluid_magazine_header_ad',
           array(
               'label'   => __( 'Upload Header Advertisement', 'fluid-magazine' ),
               'section' => 'fluid_magazine_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** Header AD Link */
    $wp_customize->add_setting(
        'fluid_magazine_header_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_header_ad_link',
        array(
            'label'   => __( 'Header AD Link', 'fluid-magazine' ),
            'section' => 'fluid_magazine_ad_settings',
            'type'    => 'text',
        )
    );

}
add_action( 'customize_register', 'fluid_magazine_customize_register_ads' );