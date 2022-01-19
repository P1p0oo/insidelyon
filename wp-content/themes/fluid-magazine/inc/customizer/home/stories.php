<?php
/**
 * Top Stories Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_top_stories( $wp_customize ) {

    global $fluid_magazine_option_categories;

    /** Top Stories Section */
    $wp_customize->add_section(
        'fluid_magazine_stories_settings',
        array(
            'title'     => __( 'Top Stories Section', 'fluid-magazine' ),
            'priority'  => 30,
            'panel'     => 'fluid_magazine_home_page_settings',
        )
    );
    
    /** Enable/Disable Top Stories Section */
    $wp_customize->add_setting(
        'fluid_magazine_ed_stories_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_stories_section',
        array(
            'label'   => __( 'Enable Top Stories Section', 'fluid-magazine' ),
            'section' => 'fluid_magazine_stories_settings',
            'type'    => 'checkbox',
        )
    );

    /** Top Stories Section Title */
    $wp_customize->add_setting(
        'fluid_magazine_stories_section_title',
        array(
            'default'           => __(  'Top Stories', 'fluid-magazine' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_stories_section_title',
        array(
            'label'   => __( 'Top Stories Section Title', 'fluid-magazine' ),
            'section' => 'fluid_magazine_stories_settings',
            'type'    => 'text',
        )
    );

    
    /** Top Stories Post One */
    $wp_customize->add_setting(
        'fluid_magazine_stories_section_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_stories_section_cat',
        array(
            'label'   => __( 'Select Top Stories Category', 'fluid-magazine' ),
            'section' => 'fluid_magazine_stories_settings',
            'type'    => 'select',
            'choices' => $fluid_magazine_option_categories,
        )
    );

    /** Top Stories Section Ends**/

}
add_action( 'customize_register', 'fluid_magazine_customize_register_top_stories' );