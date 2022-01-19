<?php
/**
 * Home Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_home( $wp_customize ) {

    /** Home Page Settings */
    $wp_customize->add_panel( 
        'fluid_magazine_home_page_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Home Page Settings', 'fluid-magazine' ),
            'description' => __( 'Customize Home Page Settings', 'fluid-magazine' ),
        ) 
    );    

}
add_action( 'customize_register', 'fluid_magazine_customize_register_home' );