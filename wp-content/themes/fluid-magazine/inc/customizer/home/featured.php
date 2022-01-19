<?php
/**
 * Featured Post Theme Option.
 *
 * @package Fluid_Magazine
 */



function fluid_magazine_customize_register_featured_post( $wp_customize ) {
  
    global $fluid_magazine_option_categories;  
	
    /** Featured Section */
    $wp_customize->add_section(
        'fluid_magazine_featured_settings',
        array(
            'title'       => __( 'Featured Post Section', 'fluid-magazine' ),
            'priority'    => 30,
            'panel'       => 'fluid_magazine_home_page_settings',
        )
    );
    
    /** Enable/Disable Featured Post Section */
    $wp_customize->add_setting(
        'fluid_magazine_ed_featured_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_featured_section',
        array(
            'label'       => __( 'Enable Featured Post Section', 'fluid-magazine' ),
            'description' => __( 'Select category for featured section.', 'fluid-magazine' ),
            'section'     => 'fluid_magazine_featured_settings',
            'type'        => 'checkbox',
        )
    );
    
    /** Show/Hide Featured Post Caption */
    $wp_customize->add_setting(
        'fluid_magazine_ed_featured_archive',
        array(
            'default'           => '1',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_featured_archive',
        array(
            'label'   => __( 'Enable Featured Posts in archives.', 'fluid-magazine' ),
            'section' => 'fluid_magazine_featured_settings',
            'type'    => 'checkbox',
        )
    );

    /** Select Category */
    $wp_customize->add_setting(
        'fluid_magazine_featured_section_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_featured_section_cat',
        array(
            'label'   => __( 'Select Category', 'fluid-magazine' ),
            'section' => 'fluid_magazine_featured_settings',
            'description'       => __( 'We recommend to have 4 or 8 posts in the select category, and each featured images to be at least of size 1291px*960px for consistent design.', 'fluid-magazine' ),
            'type'    => 'select',
            'choices' => $fluid_magazine_option_categories,
        )
    );

   /** Featured Post Section Ends**/

}
add_action( 'customize_register', 'fluid_magazine_customize_register_featured_post' );