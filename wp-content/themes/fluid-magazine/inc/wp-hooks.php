<?php
/**
 * WordPress Hooks
 *
 * @package Fluid_Magazine
 */

/**
 * @see fluid_magazine_setup
*/
add_action( 'after_setup_theme', 'fluid_magazine_setup' );

/**
 * @see fluid_magazine_content_width
*/
add_action( 'after_setup_theme', 'fluid_magazine_content_width', 0 );

/**
 * @see fluid_magazine_template_redirect_content_width
*/
add_action( 'template_redirect', 'fluid_magazine_template_redirect_content_width' );

/**
 * @see fluid_magazine_scripts
*/
add_action( 'wp_enqueue_scripts', 'fluid_magazine_scripts' );

/**
 * @see fluid_magazine_admin_scripts
*/
add_action( 'admin_enqueue_scripts', 'fluid_magazine_admin_scripts' );

/**
 * @see fluid_magazine_body_classes
*/
add_filter( 'body_class', 'fluid_magazine_body_classes' );

/**
 * @see fluid_magazine_post_class
*/
add_filter( 'post_class', 'fluid_magazine_post_class' );

/**
 * @see fluid_magazine_category_transient_flusher
*/
add_action( 'edit_category', 'fluid_magazine_category_transient_flusher' );
add_action( 'save_post',     'fluid_magazine_category_transient_flusher' );

/**
 * @see fluid_magazine_excerpt_more
 * @see fluid_magazine_excerpt_length
*/
add_filter( 'excerpt_more', 'fluid_magazine_excerpt_more' );
add_filter( 'excerpt_length', 'fluid_magazine_excerpt_length', 999 );

/**
 * Custom Comment Form Field
 * @see fluid_magazine_commentd_fields
*/
add_filter( 'comment_form_default_fields', 'fluid_magazine_commentd_fields' );


/**
 * Custom Comment Form
 * @see fluid_magazine_change_comment_form
*/
add_filter( 'comment_form_defaults', 'fluid_magazine_change_comment_form' );

/**
 * Custom CSS
 * @see fluid_magazine_custom_css
*/
add_action( 'wp_head', 'fluid_magazine_custom_css', 100 );