<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fluid_Magazine
 */

$fluid_magazine_ed_breadcrumb = get_theme_mod( 'fluid_magazine_ed_breadcrumb' );
get_header(); ?>
 
	<div id="primary" class="content-area">
		<div class="top-bar">
			<?php 
			if ($fluid_magazine_ed_breadcrumb) { do_action( 'fluid_magazine_breadcrumbs' ); }
			?>
		</div>
		<section class="latest-blog">
			<div class="blog-holder">

				<?php
					while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					the_posts_navigation();
					
					do_action( 'fluid_magazine_after_post_content' );

					

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
get_sidebar();
get_footer();
