<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */
$sidebar_layout = fluid_magazine_sidebar_layout(); //From custom function
$fluid_magazine_ed_breadcrumb = get_theme_mod( 'fluid_magazine_ed_breadcrumb' );
get_header(); ?>

	<div id="primary" class="content-area">

		<?php
        /**
         * Page Header
         * 
         * @see fluid_magazine_pg_header - 30
        */
		do_action( 'fluid_magazine_page_header');
        ?>
		<section class="latest-blog">
			<div class="blog-holder">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</div>
		</section>
	</div><!-- #primary -->

<?php
if( $sidebar_layout == 'right-sidebar' )
get_sidebar();
get_footer();
