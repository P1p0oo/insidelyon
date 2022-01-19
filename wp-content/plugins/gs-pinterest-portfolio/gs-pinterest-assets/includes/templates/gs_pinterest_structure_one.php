<?php
/*
 * GS Pinterest Portfolio - Theme One
 * @author GS Plugins <hello@gsplugins.com>
 * 
 */

$output .= '<ul class="gs-pins">';
        
    foreach ( $gs_rss_pins as $gs_single_pin ) : 
      $output .= '<li class="gs-single-pin">';
      $output .= '<div class="gs-pin-details">';
                 
        if ($thumb = $gs_single_pin->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'thumbnail') ) {
          $thumb = $thumb[0]['attribs']['']['url'];                                           
          $output .= '<img src="'.$thumb.'"'; 
          $output .= ' alt="'.$gs_single_pin->get_title().'"/>';
        } else {
          preg_match('/src="([^"]*)"/', $gs_single_pin->get_content(), $matches);
          $src = $matches[1];
          
          if ($matches) {
            $output .= '<img src="'.$src.'"'; 
          $output .= ' alt="'.$gs_single_pin->get_title().'"/>';
          } else {
            $output .= "thumbnail not available";
          }
        } 

        $output .= '</div>'; // gs-pin-details
      $output .= '</li>';
    endforeach;

$output .= '</ul>';

do_action('gs_pinterest_custom_css');
return $output;