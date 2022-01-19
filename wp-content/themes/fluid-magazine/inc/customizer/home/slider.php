<?php
/**
 * Slider Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_slider( $wp_customize ) {

    global $fluid_magazine_option_categories;  
    /** Slider Settings */
    $wp_customize->add_section(
        'fluid_magazine_slider_settings',
        array(
            'title'      => __( 'Slider Settings', 'fluid-magazine' ),
            'priority'   => 10,
            'panel'       => 'fluid_magazine_home_page_settings',
        )
    );
    
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'fluid_magazine_ed_slider',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_slider',
        array(
            'label'   => __( 'Enable Home Page Slider', 'fluid-magazine' ),
            'section' => 'fluid_magazine_slider_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'fluid_magazine_slider_auto',
        array(
            'default'           => '1',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_slider_auto',
        array(
            'label'   => __( 'Enable Slider Auto Transition', 'fluid-magazine' ),
            'section' => 'fluid_magazine_slider_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'fluid_magazine_slider_caption',
        array(
            'default'           => '1',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_slider_caption',
        array(
            'label'   => __( 'Enable Slider Caption', 'fluid-magazine' ),
            'section' => 'fluid_magazine_slider_settings',
            'type'    => 'checkbox',
        )
    );
        
    /** Slider Animation */
    $wp_customize->add_setting(
        'fluid_magazine_slider_animation',
        array(
            'default'           => 'fadeOut',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_slider_animation',
        array(
            'label'     => __( 'Choose Slider Animation', 'fluid-magazine' ),
            'section'   => 'fluid_magazine_slider_settings',
            'type'      => 'select',
            'choices'   => array(
                'fadeOut'  => __( 'fade', 'fluid-magazine' ),
                'slide' => __( 'slide', 'fluid-magazine' ),
                
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'fluid_magazine_slider_speed',
        array(
            'default'           => '7000',
            'sanitize_callback' => 'fluid_magazine_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_slider_speed',
        array(
            'label'       => __( 'Slider Speed ( Unit = millisecond )', 'fluid-magazine' ),
            'description' => __( 'Info: Slider speed must be greater than Animation speed.', 'fluid-magazine' ),
            'section'     => 'fluid_magazine_slider_settings',
            'type'        => 'text',
        )
    );
    
    /** Animation Speed */
    $wp_customize->add_setting(
        'fluid_magazine_animation_speed',
        array(
            'default'           => '600',
            'sanitize_callback' => 'fluid_magazine_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_animation_speed',
        array(
            'label'   => __( 'Animation Speed ( Unit = millisecond )', 'fluid-magazine' ),
            'section' => 'fluid_magazine_slider_settings',
            'type'    => 'text',
        )
    );
    
    /** Slider Readmore */
    $wp_customize->add_setting(
        'fluid_magazine_slider_readmore',
        array(
            'default'           => __( 'Learn More', 'fluid-magazine' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_slider_readmore',
        array(
            'label'   => __( 'Readmore Text', 'fluid-magazine' ),
            'section' => 'fluid_magazine_slider_settings',
            'type'    => 'text',
        )
    );
    
    /** Select Category */
    $wp_customize->add_setting(
        'fluid_magazine_slider_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_slider_cat',
        array(
            'label'   => __( 'Choose Slider Category', 'fluid-magazine' ),
            'section' => 'fluid_magazine_slider_settings',
            'type'    => 'select',
            'choices' => $fluid_magazine_option_categories,
        )
    );
    /** Slider Settings Ends */


}
add_action( 'customize_register', 'fluid_magazine_customize_register_slider' );