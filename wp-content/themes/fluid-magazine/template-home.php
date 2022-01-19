<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

$sidebar_layout = fluid_magazine_sidebar_layout(); 
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php
            /**
             * Home Page Contents
             * 
             * @hooked fluid_magazine_stories - 10
             * @hooked fluid_magazine_two_col_double_cat_content - 20
             * @hooked fluid_magazine_blog_post_content - 30
             */
            do_action( 'fluid_magazine_home_page' );
        ?>

    </main><!-- #main -->    
</div>
<?php if( $sidebar_layout == 'right-sidebar' )
get_sidebar();
get_footer();