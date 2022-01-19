<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid Magazine
 */
    $sidebar_layout = fluid_magazine_sidebar_layout(); 

    $ed_top_stories_section = get_theme_mod( 'fluid_magazine_ed_stories_section' );
    $stories_section_cat    = get_theme_mod('fluid_magazine_stories_section_cat');

    $first_cat  = get_theme_mod( 'fluid_magazine_category_one' ); //from customizer
    $second_cat = get_theme_mod( 'fluid_magazine_category_two' ); //from customizer

get_header(); 
            
    if ( 'posts' == get_option( 'show_on_front' ) ) {

        include( get_home_template() );

    }elseif( $first_cat || $second_cat || ( $ed_top_stories_section && $stories_section_cat ) ){ ?> 
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
            </main>
        </div>
    <?php    
    }else {

        include( get_page_template() );
    }
if( $sidebar_layout == 'right-sidebar' ) get_sidebar();                  
get_footer();