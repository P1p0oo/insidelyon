<?php 
/**
 * Footer Option.
 *
 * @package Fluid Magazine
 */
 
function fluid_magazine_customize_footer_settings( $wp_customize ) {

 /** Footer Section */
    $wp_customize->add_section(
        'fluid_magazine_footer_section',
        array(
            'title' => __( 'Footer Settings', 'fluid-magazine' ),
            'priority' => 70,
        )
    );
    
    /** Copyright Text */
    $wp_customize->add_setting(
        'fluid_magazine_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_footer_copyright_text',
        array(
            'label' => __( 'Copyright Info', 'fluid-magazine' ),
            'section' => 'fluid_magazine_footer_section',
            'type' => 'textarea',
        )
    );

}

add_action( 'customize_register', 'fluid_magazine_customize_footer_settings' );
 