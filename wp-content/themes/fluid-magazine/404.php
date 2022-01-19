<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fluid_Magazine
 */

get_header(); 


    /**
     * Page Header
     * 
     * @see fluid_magazine_pg_header - 30
    */
	do_action( 'fluid_magazine_page_header');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-page">
    			<div class="holder">
    				<h1><?php esc_html_e( '404!', 'fluid-magazine' ); ?></h1>
    				<h2><?php esc_html_e( 'The requested page cannot be found', 'fluid-magazine' ); ?></h2>
    				<p><?php esc_html_e( 'Sorry but the page you are looking for cannot be found. Take a moment and do a search below or start from our', 'fluid-magazine' ); ?>
    					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'homepage.', 'fluid-magazine' ); ?></a></p>				
    				<?php get_search_form(); ?>
    			</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
