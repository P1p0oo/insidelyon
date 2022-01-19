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
	<div class="text-holder"> 
<?php
    /**
     * Before Post entry content
     * 
     * @see fluid_magazine_post_content_image - 10
     * @see fluid_magazine_post_entry_header  - 20
    */
    do_action( 'fluid_magazine_before_post_entry_content' ); ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fluid-magazine' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

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

