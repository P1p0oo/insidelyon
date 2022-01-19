<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

get_header(); 
?>
		
	<div id="primary" class="content-area">
	
		<?php
        /**
         * Page Header
         * 
         * @see fluid_magazine_pg_header - 30
        */
		do_action( 'fluid_magazine_page_header');
        ?>

        
        <section class="latest-blog" >
        	<div class="blog-holder">
        		<?php
        		if ( have_posts() ) :
        
        			if ( is_home() && ! is_front_page() ) : ?>
        				<header>
        					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        				</header>
        
        			<?php
        			endif;
        
        			/* Start the Loop */
        			while ( have_posts() ) : the_post();
        
        				/*
        				 * Include the Post-Format-specific template for the content.
        				 * If you want to override this in a child theme, then include a file
        				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        				 */
        				get_template_part( 'template-parts/content-blog', get_post_format() );
        
        			endwhile;
        
        			fluid_magazine_pagination();
                    
        		else :
        
        			get_template_part( 'template-parts/content', 'none' );
        
        		endif; ?>
			</div>
		</section>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
