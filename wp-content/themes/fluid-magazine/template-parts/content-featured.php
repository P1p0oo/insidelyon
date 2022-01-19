<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fluid_Magazine
 */

$classes1 = 'grid-item--width1';
$classes3 = 'grid-item--width3';
$countodd = 0;
$counteven = 0;
global $classes, $post_id;
global $fluid_magazine_stat_counterpos;
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
    
    <?php
if ( $fluid_magazine_stat_counterpos % 2 == 0 ){ 
	?>

		<?php 
			$class_Pos_key = array_search('grid-item--width1',  get_post_class($classes, $post_id) );
			$class_Pos_key1 = array_search('grid-item--width3',  get_post_class($classes, $post_id) );
			if( true == $class_Pos_key ){
				echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
					the_post_thumbnail( 'fluid-magazine-thumb-large' );
				echo '</a>';
			}elseif( true == $class_Pos_key1 ){
				echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
					the_post_thumbnail( 'fluid-magazine-thumb-medium' );
				echo '</a>';
			}else { 
					echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
						the_post_thumbnail( 'fluid-magazine-thumb-small' );
					echo '</a>';
				}

}else { ?>

	<?php
		$class_Pos_key = array_search('grid-item--width1',  get_post_class($classes, $post_id) );
		$class_Pos_key1 = array_search('grid-item--width3',  get_post_class($classes, $post_id) );
		if( true == $class_Pos_key ){
				echo '<a href="' . esc_url( get_the_permalink( ) ) . '" class="post-thumbnail">';
					the_post_thumbnail( 'fluid-magazine-thumb-large' );
				echo '</a>';
		}elseif( true == $class_Pos_key1 ){
				echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
					the_post_thumbnail( 'fluid-magazine-thumb-medium' );
				echo '</a>';
		}else { 
	 			echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
					the_post_thumbnail( 'fluid-magazine-thumb-small' );
				echo '</a>';
			} 
} ?>

	<header class="entry-header">
		<?php 
			echo '<h2 class="entry-title"><a href="'. esc_url( get_the_permalink() ) .'">' ;
                the_title() ;
            echo '</a></h2>';
               fluid_magazine_home_categories();
		?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->