<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fluid_Magazine
 */

/**
 * Doctype
 * 
 * @hooked fluid_magazine_doctype_cb
*/
do_action( 'fluid_magazine_doctype' );
?>

<head>

<?php
/**
 * Before wp_head
 * 
 * @hooked fluid_magazine_head
*/
do_action( 'fluid_magazine_before_wp_head' );

wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
    /**
     * Before Header
     * 
     * @see fluid_magazine_page_start - 20
     * @see fluid_magazine_before_header_cb - 30
    */
    do_action( 'fluid_magazine_before_header' );

    /**
     * fluid_magazine Header
     * 
     * @see fluid_magazine_header_start  - 20
     * @see fluid_magazine_header_top    - 30
     * @see fluid_magazine_header_bottom - 40
     * @see fluid_magazine_header_end    - 100 
    */
    do_action( 'fluid_magazine_header' );
    
    
    /**
     * After Header
     * 
     * @see fluid_magazine_after_header_cb
    */
    do_action( 'fluid_magazine_after_header' );

    
    /**
     * Before Content
     * 
     * @see fluid_magazine_before_content_start - 20
    */
    do_action( 'fluid_magazine_before_content' );