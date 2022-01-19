<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Fluid_Magazine
 */

if ( ! function_exists( 'fluid_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fluid_magazine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Fluid Magazine, use a find and replace
	 * to change 'fluid-magazine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fluid-magazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fluid-magazine' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fluid_magazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Custom Image Size
    add_image_size( 'fluid-magazine-thumb-small', 480, 480, true );
	add_image_size( 'fluid-magazine-thumb-medium', 960, 480, true );
	add_image_size( 'fluid-magazine-thumb-large', 960, 959, true );
	add_image_size( 'fluid-magazine-archive', 298, 286,true);
    add_image_size( 'fluid-magazine-stories-post',396,197,true );
    add_image_size( 'fluid-magazine-stories-post-with-sidebar',276,137,true );
    add_image_size( 'fluid-magazine-slider', 1349, 640, true );
    add_image_size( 'fluid-magazine-slider-post', 303, 184, true );
    add_image_size( 'fluid-magazine-cat-post', 290, 278,true);
	add_image_size( 'fluid-magazine-cat-post-with-sidebar',202 ,194 ,true);
	add_image_size( 'fluid-magazine-blogs', 631, 632, true );
	add_image_size( 'fluid-magazine-blogs-with-sidebar', 445, 444, true );
    add_image_size( 'fluid-magazine-with-sidebar', 1291, 450, true );
    add_image_size( 'fluid-magazine-without-sidebar', 1920, 720, true );
    add_image_size( 'fluid-magazine-featured-post', 275, 275, true );
    add_image_size( 'fluid-magazine-recent-post', 58, 58, true );
    add_image_size( 'fluid-magazine-search-thumbnail',333,333,true );

    /* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fluid_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fluid_magazine_content_width', 978 );
}


/**
* Adjust content_width value according to template.
*
* @return void
*/
function fluid_magazine_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = fluid_magazine_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1360;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1360;
	}

}

/**
 * Enqueue scripts and styles.
 */
function fluid_magazine_scripts() {
	$args = array(
		  'family' => 'Hind:400,600,700|Poppins:400,300,500,700,600|Droid+Serif:400italic',
		);
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri() . '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'fluid-magazine-google-fonts', add_query_arg( $args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'fluid-magazine-style', get_stylesheet_uri(), array(), FLUID_MAGAZINE_THEME_VERSION );
	if( fluid_magazine_woocommerce_activated() ) 
    wp_enqueue_style( 'fluid-magazine-woocommerce-style', get_template_directory_uri(). '/css/woocommerce.css', array('fluid-magazine-style'), FLUID_MAGAZINE_THEME_VERSION );


	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '20160125', true );

    wp_enqueue_script( 'equal-height', get_template_directory_uri() . '/js/equal-height.js', array( 'jquery' ), '0.7.0', true );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'fluid-magazine-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), FLUID_MAGAZINE_THEME_VERSION, true  );
    
    
    $fluid_magazine_slider_auto = get_theme_mod( 'fluid_magazine_slider_auto', '1' );
    $fluid_magazine_slider_animation = get_theme_mod( 'fluid_magazine_slider_animation', 'fade' );
    $fluid_magazine_slider_speed = get_theme_mod( 'fluid_magazine_slider_speed', '7000' );
    $fluid_magazine_animation_speed = get_theme_mod( 'fluid_magazine_animation_speed', '600' );
    
    $fluid_magazine_array = array(
        'auto'      => esc_attr( $fluid_magazine_slider_auto ),
        'animation' => esc_attr( $fluid_magazine_slider_animation ),
        'speed'     => absint( $fluid_magazine_slider_speed ),
        'a_speed'   => absint( $fluid_magazine_animation_speed ),
        'rtl'       => is_rtl(),
    );
    
    wp_localize_script( 'fluid-magazine-custom', 'fluid_magazine_data', $fluid_magazine_array );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}



if ( is_admin() ) : // Load only if we are viewing an admin page
function fluid_magazine_admin_scripts() {
	wp_enqueue_style( 'fluid-magazine-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );
    
    wp_enqueue_script( 'fluid-magazine-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );    
	
}

endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function fluid_magazine_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if( !( is_active_sidebar( 'right-sidebar' )) || is_404() ) {
        $classes[] = 'full-width'; 
    }
    
    $fluid_magazine_ed_slider = get_theme_mod( 'fluid_magazine_ed_slider' );
    if( $fluid_magazine_ed_slider ){
	   $classes[] = 'has-slider';
	}

	if( is_page() || is_page_template( 'template-home.php' ) ){
        $sidebar_layout = fluid_magazine_sidebar_layout();
        if( $sidebar_layout == 'no-sidebar' )
        $classes[] = 'full-width';
    }


	if( fluid_magazine_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || 'product' === get_post_type() ) && ! is_active_sidebar( 'shop-sidebar' ) ){
        $classes[] = 'full-width';
    }  

	return $classes;
}


// add category nicenames in body and post class
function fluid_magazine_post_class( $classes ) {
	global $post;
	global $fluid_magazine_counter_pos;
	global $fluid_magazine_stat_counterpos;

	if ( $fluid_magazine_stat_counterpos % 2 == 0 ){
		$classes[] = 'even';
			if ( ($fluid_magazine_counter_pos + 2) % 4 == 0){
				$classes[] = 'grid-item--width1';
				}

	}else {
		$classes[] = 'odd';
			if ( $fluid_magazine_counter_pos % 4 == 0){
				$classes[] = 'grid-item--width1';
				}
	}

	if ( ($fluid_magazine_counter_pos + 1) % 4 == 0){
		$classes[] = 'grid-item--width3';
	}

	return $classes;
}


/**
 * Flush out the transients used in fluid_magazine_categorized_blog.
 */
function fluid_magazine_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'fluid_magazine_categories' );
}

if ( ! function_exists( 'fluid_magazine_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function fluid_magazine_excerpt_more() {
	return ' &hellip; ';
}

endif;

if ( ! function_exists( 'fluid_magazine_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function fluid_magazine_excerpt_length( $length ) {
	return 40;
}
endif;

/**
 * comment_form_default_fields
 */
function fluid_magazine_commentd_fields( $fields ) {
 
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'fluid-magazine' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . ' />';    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'fluid-magazine' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'fluid-magazine' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';
  
    return $fields;
     
}

/**
 * comment_form_defaults
 */
function fluid_magazine_change_comment_form( $defaults ) {
 
    $defaults['label_submit'] = __( 'POST COMMENT', 'fluid-magazine' );
    $defaults['comment_field'] =  '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'fluid-magazine' ) . '" cols="45" rows="8" aria-required="true">' . '</textarea></p>';
     
    return $defaults;
}

if ( ! function_exists( 'fluid_magazine_custom_css' ) ) :
/**
 * Custom CSS
*/
function fluid_magazine_custom_css(){
    $custom_css = get_theme_mod( 'fluid_magazine_custom_css' );
    if( ! empty( $custom_css ) ){
		echo '<style type="text/css">';
		echo wp_strip_all_tags( $custom_css );
		echo '</style>';
	}
}
endif;