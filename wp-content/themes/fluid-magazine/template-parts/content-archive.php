<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
    
    /**
     * Before Post entry content
     * 
     * @see fluid_magazine_archive_content_image - 10
     * @see fluid_magazine_start_post_entry_header - 20
     * @see fluid_magazine_post_entry_header  - 30
    */
    do_action( 'fluid_magazine_before_archive_entry_content' ); ?>

	<div class="entry-content">
		<?php
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fluid-magazine' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fluid_magazine_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    
    <?php
    /**
     * After post Entry content
     * 
     * @see fluid_magazine_end_post_entry_content - 20
    */
    do_action( 'fluid_magazine_after_post_entry_content' ); ?>
    

</article><!-- #post-## -->