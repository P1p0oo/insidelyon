<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
    
    /**
     * Before Search entry content
     * 
     * @see fluid_magazine_search_content_image - 10
     * @see fluid_magazine_start_post_entry_header  - 20
     * @see fluid_magazine_blog_post_entry_header  - 20
    */
    do_action( 'fluid_magazine_before_search_entry_content' );


?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a class="btn-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','fluid-magazine'); ?></a>
	</footer><!-- .entry-footer -->
    <?php 
    /**
     * After post Entry content
     * 
     * @see fluid_magazine_end_post_entry_content - 20
    */
    do_action( 'fluid_magazine_after_post_entry_content' ); ?>
</article><!-- #post-## -->