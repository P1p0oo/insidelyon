<?php
/**
 * Widgets
 *
 * @package Fluid_Magazine
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fluid_magazine_widgets_init() {
	
    $sidebars = array(
        'sidebar'   => array(
            'name'        => esc_html__( 'Right Sidebar', 'fluid-magazine' ),
            'id'          => 'right-sidebar', 
            'description' => esc_html__( 'Add widgets here.', 'fluid-magazine' ),
        ),        
        'footer-one'=> array(
            'name'        => esc_html__( 'Footer One', 'fluid-magazine' ),
            'id'          => 'footer-one', 
            'description' => esc_html__( 'Add footer one widgets.', 'fluid-magazine' ),
        ),
        'footer-two'=> array(
            'name'        => esc_html__( 'Footer Two', 'fluid-magazine' ),
            'id'          => 'footer-two', 
            'description' => esc_html__( 'Add footer two widgets.', 'fluid-magazine' ),
        ),
        'footer-three'=> array(
            'name'        => esc_html__( 'Footer Three', 'fluid-magazine' ),
            'id'          => 'footer-three', 
            'description' => esc_html__( 'Add footer three widgets.', 'fluid-magazine' ),
        ),
        'footer-four'=> array(
            'name'        => esc_html__( 'Footer Four', 'fluid-magazine' ),
            'id'          => 'footer-four', 
            'description' => esc_html__( 'Add footer four widgets.', 'fluid-magazine' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => $sidebar['name'],
    		'id'            => $sidebar['id'],
    		'description'   => $sidebar['description'],
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
    	) );
    }
    
}
add_action( 'widgets_init', 'fluid_magazine_widgets_init' );

/**
 * Recent Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-recent-post.php';

/**
 * Popular Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Social Link Widget
*/
require get_template_directory() . '/inc/widgets/widget-social-links.php';

/**
 * Featured Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-featured-post.php';

/**
 * Featured Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-slider-post.php';

