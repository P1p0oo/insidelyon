<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

$archive_featured_ed = get_theme_mod( 'fluid_magazine_ed_featured_archive');
$featured_ed = get_theme_mod( 'fluid_magazine_ed_featured_section');

get_header();

if( $featured_ed && $archive_featured_ed)
	do_action( 'fluid_magazine_featured' );

	echo '<div id="content" class="site-content">';
        echo '<div id="primary" class="content-area">';
        /**
         * Page Header
         * 
         * @see fluid_magazine_pg_header - 30
        */
		do_action( 'fluid_magazine_page_header');
		if ( have_posts() ) : ?>

			<?php

			/* Start the Loop */

			while ( have_posts() ) : the_post();
				
				
				echo '<div class="category-list">';
					get_template_part( 'template-parts/content-archive', get_post_format() );
				echo '</div>';
				
			endwhile;

			

		else :
				/**
                     * Page Header
                     * 
                     * @see fluid_magazine_pg_header - 30
                    */
					do_action( 'fluid_magazine_page_header');
				echo '<div class="category-list">';
					get_template_part( 'template-parts/content', 'none' );
				echo '</div>';
		endif;

		echo '<div class="category-list">';
			fluid_magazine_pagination();
		echo '</div>';
		
		 ?>
		
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
