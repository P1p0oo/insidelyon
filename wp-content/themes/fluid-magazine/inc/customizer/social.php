<?php
/**
 * Home Theme Option.
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customize_register_social( $wp_customize ) {

    /** Social Settings */
    $wp_customize->add_section(
        'fluid_magazine_social_settings',
        array(
            'title'       => __( 'Social Settings', 'fluid-magazine' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'fluid-magazine' ),
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'fluid_magazine_facebook',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_facebook',
        array(
            'label'   => __( 'Facebook', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );
    
    
    /** Twitter */
    $wp_customize->add_setting(
        'fluid_magazine_twitter',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_twitter',
        array(
            'label'   => __( 'Twitter', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );
    
    /** Google Plus */
    $wp_customize->add_setting(
        'fluid_magazine_gplus',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_gplus',
        array(
            'label'   => __( 'Google Plus', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'fluid_magazine_linkedin',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_linkedin',
        array(
            'label'   => __( 'LinkedIn', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );
    
    /** Pinterest */
    $wp_customize->add_setting(
        'fluid_magazine_pinterest',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_pinterest',
        array(
            'label'   => __( 'Pinterest', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'fluid_magazine_instagram',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_instagram',
        array(
            'label'   => __( 'Instagram', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );
    
    /** YouTube */
    $wp_customize->add_setting(
        'fluid_magazine_youtube',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_youtube',
        array(
            'label'   => __( 'YouTube', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type'    => 'text',
        )
    );

    
    /** OK */
    $wp_customize->add_setting(
        'fluid_magazine_odnoklassniki',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_odnoklassniki',
        array(
            'label' => __( 'OK', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type' => 'text',
        )
    );
    
    /** VK */
    $wp_customize->add_setting(
        'fluid_magazine_vk',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_vk',
        array(
            'label' => __( 'VK', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type' => 'text',
        )
    );
    
    /** Xing */
    $wp_customize->add_setting(
        'fluid_magazine_xing',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_xing',
        array(
            'label' => __( 'Xing', 'fluid-magazine' ),
            'section' => 'fluid_magazine_social_settings',
            'type' => 'text',
        )
    );

	}
add_action( 'customize_register', 'fluid_magazine_customize_register_social' );
