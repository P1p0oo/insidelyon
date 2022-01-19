<?php
/**
 * Fluid Magazine Theme Customizer.
 *
 * @package Fluid_Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function fluid_magazine_modify_sections( $wp_customize ){
    if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
        $wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'fluid-magazine' );
    }
}
add_action( 'customize_register', 'fluid_magazine_modify_sections' );

$fluid_magazine_sections = array( 'slider', 'featured', 'stories', 'category' );

$fluid_magazine_settings = array( 'default', 'general', 'home', 'breadcrumb', 'advertisement', 'social', 'footer', 'custom' );


/* Option list of all post */   
$fluid_magazine_options_posts     = array();
$fluid_magazine_options_posts_obj = get_posts( 'posts_per_page=-1' );
$fluid_magazine_options_posts[''] = __( 'Choose Post', 'fluid-magazine' );
foreach ( $fluid_magazine_options_posts_obj as $fluid_magazine_posts ) {
    $fluid_magazine_options_posts[$fluid_magazine_posts->ID] = $fluid_magazine_posts->post_title;
}

/* Option list of all categories */
$fluid_magazine_args = array(
    'type'         => 'post',
    'orderby'      => 'name',
    'order'        => 'ASC',
    'hide_empty'   => 1,
    'hierarchical' => 1,
    'taxonomy'     => 'category'
); 

$fluid_magazine_option_categories     = array();
$fluid_magazine_category_lists        = get_categories( $fluid_magazine_args );
$fluid_magazine_option_categories[''] = __( 'Choose Category', 'fluid-magazine' );
foreach( $fluid_magazine_category_lists as $fluid_magazine_category ){
    $fluid_magazine_option_categories[$fluid_magazine_category->term_id] = $fluid_magazine_category->name;
}
    

foreach( $fluid_magazine_settings as $setting ){
    require get_template_directory() . '/inc/customizer/' . $setting . '.php';
}

foreach( $fluid_magazine_sections as $section ){
    require get_template_directory() . '/inc/customizer/home/' . $section . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fluid_magazine_customize_preview_js() {
    wp_enqueue_script( 'fluid_magazine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fluid_magazine_customize_preview_js' );
