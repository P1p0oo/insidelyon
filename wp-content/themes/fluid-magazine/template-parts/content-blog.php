<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

$read_more_text = get_theme_mod( 'fluid_magazine_readmore_text',__( 'Read More','fluid-magazine') );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
    /**
     * Before Post entry content
     * 
     * @see fluid_magazine_blog_content_image - 10
     * @see fluid_magazine_start_post_entry_header - 20
     * @see fluid_magazine_post_entry_header  - 30
    */
    do_action( 'fluid_magazine_before_blog_entry_content' ); 
    ?>

		<div class="entry-content">
			<?php
				the_excerpt();
			?>
		</div><!-- .entry-content -->
        
        <?php if( $read_more_text ){ ?>
    		<div class="entry-footer">
    		    <a class="btn-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html( $read_more_text ); ?></a>
    		</div>
        <?php } ?>
<?php 
    /**
     * After post Entry content
     * 
     * @see fluid_magazine_end_post_entry_content - 20
    */
    do_action( 'fluid_magazine_after_post_entry_content' ); ?>
</div>
	

