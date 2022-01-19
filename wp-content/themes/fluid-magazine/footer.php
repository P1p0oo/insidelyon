<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fluid_Magazine
 */
 
   /**
     * After Content
     * 
     * @hooked fluid_magazine_content_end - 20
    */
    do_action( 'fluid_magazine_after_content' );
    

    /**
     * Fluid Magazine Footer
     * 
     * @see fluid_magazine_footer_start  - 20
     * @see fluid_magazine_footer_top    - 30
     * @see fluid_magazine_footer_bottom - 40
     * @see fluid_magazine_footer_end    - 50
    */
	do_action( 'fluid_magazine_footer' ); 
    
    /**
	 * Fluid Magazine Pagwe End
     * 
     * @hooked fluid_magazine_page_end - 20
	 */
    do_action( 'fluid_magazine_page_end' );

wp_footer(); ?>

</body>
</html>
