<?php
/**
 * Category Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_category( $wp_customize ) {

    global $fluid_magazine_option_categories;  

    /** Category Post Section */
    $wp_customize->add_section(
        'fluid_magazine_category_settings',
        array( 
            'title'     => __( 'Category Post Section', 'fluid-magazine' ),
            'priority'  => 30,
            'panel'     => 'fluid_magazine_home_page_settings',
        )
    );
    
    /** Select Category One */
    $wp_customize->add_setting(
        'fluid_magazine_category_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_category_one',
        array(
            'label'   => __( 'Select First Category', 'fluid-magazine' ),
            'section' => 'fluid_magazine_category_settings',
            'type'    => 'select',
            'choices' => $fluid_magazine_option_categories,
        )
    );

    /** Select Category Two*/
    $wp_customize->add_setting(
        'fluid_magazine_category_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_category_two',
        array(
            'label'   => __( 'Select Second Category', 'fluid-magazine' ),
            'section' => 'fluid_magazine_category_settings',
            'type'    => 'select',
            'choices' => $fluid_magazine_option_categories,
        )
    );

    /** Select Latest Blog Category*/
    $wp_customize->add_setting(
        'fluid_magazine_blogs_section_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_blogs_section_cat',
        array(
            'label'       => __( 'Select Latest Blog Category', 'fluid-magazine' ),
            'section'     => 'fluid_magazine_category_settings',
            'description' => __( 'If blog category is not selected, the latest posts will be displayed.', 'fluid-magazine'),
            'type'        => 'select',
            'choices'     => $fluid_magazine_option_categories,
        )
    );

}
add_action( 'customize_register', 'fluid_magazine_customize_register_category' );