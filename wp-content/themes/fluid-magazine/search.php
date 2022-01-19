<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Fluid_Magazine
 */

$fluid_magazine_ed_breadcrumb = get_theme_mod( 'fluid_magazine_ed_breadcrumb' );
get_header(); ?>

	<section id="primary" class="content-area">
		<?php
		if ( have_posts() ) : ?>

			
			<?php
            /**
             * Page Header
             * 
             * @see fluid_magazine_pg_header - 30
            */
    		do_action( 'fluid_magazine_page_header');
            ?>

			<div class="search-list">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			fluid_magazine_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
