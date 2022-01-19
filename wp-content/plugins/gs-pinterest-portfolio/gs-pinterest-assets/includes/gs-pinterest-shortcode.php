<?php

// -- Getting values from setting panel
function gs_pinterest_getoption( $option, $section, $default = '' ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}

// -- Shortcode [gs_pinterest]

add_shortcode('gs_pinterest','gs_pinterest_shortcode');

function gs_pinterest_shortcode( $atts ) {

	$gs_pin_user = gs_pinterest_getoption('gs_pin_user', 'gs_pinterest_settings', '');
	$gs_pin_board = gs_pinterest_getoption('gs_pin_board', 'gs_pinterest_settings', '');
	$gs_tot_pins = gs_pinterest_getoption('gs_tot_pins', 'gs_pinterest_settings', '');
	$gs_pin_theme = gs_pinterest_getoption('gs_pin_theme', 'gs_pinterest_settings', 'gs_pin_theme1');
	$gs_pin_link_tar = gs_pinterest_getoption('gs_pin_link_tar', 'gs_pinterest_settings', '_blank');
	$gs_pin_title = gs_pinterest_getoption('gs_pin_title', 'gs_pinterest_settings', 'on');
	$gs_pins_col = gs_pinterest_getoption('gs_pins_col', 'gs_pinterest_settings', 25);
	
	//Check for missing information
    if (empty( $gs_pin_user )) {
        return '<div class="gs_pin_error">Enter a userid with shortcode or in <b><i>GS PLugins > GS Pinterest Settings > Pinterest User</i></b></div>';
    }
    
	$atts = shortcode_atts(
		array(
            'user'		=> $gs_pin_user,
            'board'  	=> $gs_pin_board,
            'count'   	=> $gs_tot_pins,
            'theme'   	=> $gs_pin_theme,
            'cols'		=> $gs_pins_col
    ), $atts );

	$pins_col 	=	$atts['cols'];
	$username 	=	$atts['user'];
    $bord 		=	$atts['board'];
    $number 	=	$atts['count'];
      
      	if(!empty($username)){
            if( !empty( $bord ) ) {  
           		$board=str_replace(" ","-",$bord );
           		$feed_url = 'https://pinterest.com/'.$username.'/'.$board.'.rss';
          	} else {
           		$feed_url = 'https://pinterest.com/'.$username.'/feed.rss'; 
          	}
		}
        
        $gs_rss_pins = " ";
        
        // Get a SimplePie feed object from the specified feed source.    
        $gs_pin_rss = fetch_feed( $feed_url );

        if (!is_wp_error( $gs_pin_rss ) ) : 
        	// Figure out how many total items there are, but limit it to number specified
            $maxitems = $gs_pin_rss->get_item_quantity( $number ); 
            $gs_rss_pins = $gs_pin_rss->get_items( 0, $maxitems ); 
        endif;  

	$output = '';
	$output .= '<div class="gs_pin_area '.$atts['theme'].'">';

		if ( $atts['theme'] == 'gs_pin_theme1' ) {
			include GSPIN_FILES_DIR . '/includes/templates/gs_pinterest_structure_one.php';
		} 

	$output .= '</div>'; // end gs_pin_area
	return $output;
} // end function


// -- CSS values
if ( !function_exists( 'gs_pin_setting_styles' )) {
	function gs_pin_setting_styles($pins_col) {
		$gs_pins_gutter = gs_pinterest_getoption('gs_pins_gutter', 'gs_pinterest_settings', 10);

		if ($pins_col == 1) { $pins_col = 100; }
		if ($pins_col == 2) { $pins_col = 50; }
		if ($pins_col == 3) { $pins_col = 33.33; }
		if ($pins_col == 4) { $pins_col = 25; }
		if ($pins_col == 5) { $pins_col = 20; }
		if ($pins_col == 6) { $pins_col = 16.66; }
		if ($pins_col == '') { $pins_col = 25; }	
	?>
	<style>
		.gs-pin-details, .gs-pin-pop {
			margin-bottom: <?php echo $gs_pins_gutter; ?>px;
		}
		@media only screen and (min-width: 1024px) {
			.gs-pins .gs-single-pin {
				width: calc(<?php echo $pins_col; ?>% - <?php echo $gs_pins_gutter; ?>px);
			}
		}
	</style>
	<?php 
	}
}

add_action('wp_head','gs_pin_setting_styles');

// -- Masonary
if ( !function_exists('gs_pinterest_masonry')) {
	
	function gs_pinterest_masonry(){ 

		$gs_pins_gutter = gs_pinterest_getoption('gs_pins_gutter', 'gs_pinterest_settings', 10);
		
		?>
		<script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).ready(function(){
				
				var $gs_pin_grid = jQuery('.gs-pins').masonry({
				  // options
				  itemSelector: '.gs-single-pin',
				  columnWidth: '.gs-single-pin',
				  percentPosition: true,
				  gutter: <?php echo $gs_pins_gutter; ?>
				});

				// layout Masonry after each image loads
				$gs_pin_grid.imagesLoaded().progress( function() {
				  $gs_pin_grid.masonry('layout');
				});

			});
		</script>
	<?php
	}
	add_action( 'wp_footer','gs_pinterest_masonry' );
}

// -- Shortcode [gs_pin_widget] for widget
add_shortcode( 'gs_pin_widget', 'gs_pin_widget_cb' );

function gs_pin_widget_cb( $atts ) {

	$atts = shortcode_atts(
		array(
			'pin_link' 		=> '',
			'pin_width' 	=> ''
    ), $atts );

	$output = '';
	$output .= '<div class="pin-widget-area">';
		$output .= '<a data-pin-do="embedPin" data-pin-width="'. $atts['pin_width'] .'" href="'. $atts['pin_link'] .'"></a>';
    $output .= '</div>'; // end pin-widget-area
	return $output;
}


// -- Shortcode [gs_follow_pin_widget] for widget
add_shortcode( 'gs_follow_pin_widget', 'gs_follow_pin_widget_cb' );

function gs_follow_pin_widget_cb( $atts ) {

	$atts = shortcode_atts(
		array(
			'pin_user' 		=> '',
			'follow_lebel' 	=> ''
    ), $atts );

	$output = '';
	$output .= '<div class="pin-follow-widget-area">';
		$output .= '<a data-pin-do="buttonFollow" href="https://www.pinterest.com/'. $atts['pin_user'] .'/">'. $atts['follow_lebel'] .'</a>';
    $output .= '</div>'; // end pin-widget-area
	return $output;
}


function gs_pin_gutenberg_boilerplate_block() {

	if( !function_exists('register_block_type')){
		return;
	}

    wp_enqueue_script(
        'gs-pin-gutenberg-editor_scripts',
        GSPIN_FILES_URI . '/admin/js/pin.block.js',
        array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor' )
    );

    register_block_type( 'gs-pin/shortcode-script', array(
        'editor_script' => 'gs-pin-gutenberg-editor_scripts',
    ) );
}
add_action( 'enqueue_block_editor_assets', 'gs_pin_gutenberg_boilerplate_block' );

function gs_pin_gutenberg_frontend_block(){

	if( !function_exists('register_block_type')){
		return;
	}
    register_block_type( 'gs-pin/pinshortcodeblock', array(
	'render_callback' => 'gs_pin_gutenberg_render'
) );

}
add_action( 'enqueue_block_assets', 'gs_pin_gutenberg_frontend_block' );

function gs_pin_gutenberg_render( $attributes ) {

    //$themes =isset( $attributes['themes'] )? $attributes['themes']: 'gs_pin_theme1';
    $user = isset( $attributes['user']) ? $attributes['user']:'pinterest';
    $board = isset( $attributes['board']) ? $attributes['board']:'our-san-francisco-picks';
    $count = isset( $attributes['pinnumberAttribute']) ? $attributes['pinnumberAttribute']:25;
    $cols = isset( $attributes['cols']) ? $attributes['cols']:'33.33';

    return '[gs_pinterest user="'.$user.'" board="'.$board.'" count="'.$count.'" theme="gs_pin_theme1" cols="'.$cols.'"]';
}