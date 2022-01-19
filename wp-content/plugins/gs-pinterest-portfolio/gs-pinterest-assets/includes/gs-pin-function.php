<?php 
function gspin_boards_widget( $gspin_url, $gspin_label, $gspin_size, $gspin_cstm_sizes, $gspin_action ) {
	
	// Pinterest default "Square" size
	$gspin_scale_width  = 80;
	$gspin_scale_height = 320;
	$gspin_board_width  = 400;
	
	// Sidebar size
	if( $gspin_size == 'sidebar' ) {
		$gspin_scale_width  = 60;
		$gspin_scale_height = 800;
		$gspin_board_width  = 150;
	}
	
	// Header size
	if( $gspin_size == 'header' ) {
		$gspin_scale_width  = 115;
		$gspin_scale_height = 120;
		$gspin_board_width  = 900;
	}
	
	// Custom size
	if( $gspin_size == 'custom' ) {
		// Can't be blank & MUST need greater than minimum value by Pinterest to get output.
		$gspin_scale_width  = ( $gspin_cstm_sizes['width'] >= 60 ? $gspin_cstm_sizes['width'] : '' );
		$gspin_scale_height = ( $gspin_cstm_sizes['height'] >= 60 ? $gspin_cstm_sizes['height'] : '' );
		$gspin_board_width  = ( $gspin_cstm_sizes['board_width'] >= 130 ? $gspin_cstm_sizes['board_width'] : '' );
	}
	
	if( $gspin_action == 'embedUser' ) {
		$gspin_url = "http://www.pinterest.com/" . $gspin_url;
	}
	
	$output  = '<a data-pin-do="' . $gspin_action . '"';
	$output .= 'href="' . esc_attr( $gspin_url ) . '"';
	$output .= ( ! empty( $gspin_scale_width ) ? 'data-pin-scale-width="' . $gspin_scale_width . '"' : '' );
	$output .= ( ! empty( $gspin_scale_height ) ? 'data-pin-scale-height="' . $gspin_scale_height . '"' : '' );
	// if the board_width is empty then it has been set to 'auto' so we need to leave the data-pin-board-width attribute completely out
	$output .= ( ! empty( $gspin_board_width ) ? 'data-pin-board-width="' . $gspin_board_width . '"' : '' );
	$output .= '>' . $gspin_label . '</a>';
	
	return $output;
}