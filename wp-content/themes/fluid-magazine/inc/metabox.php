<?php
/**
 * Fluid Magazine Metabox
 * 
 * @package Fluid_Magazine
 */

 add_action('add_meta_boxes', 'fluid_magazine_add_sidebar_layout_box');

function fluid_magazine_add_sidebar_layout_box(){    
    add_meta_box(
                 'fluid_magazine_sidebar_layout', // $id
                 __( 'Sidebar Layout', 'fluid-magazine' ), // $title
                 'fluid_magazine_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority    
}

$fluid_magazine_sidebar_layout = array(         
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar (default)', 'fluid-magazine' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'fluid-magazine' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   

    );

function fluid_magazine_sidebar_layout_callback(){
    global $post , $fluid_magazine_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'fluid_magazine_sidebar_layout_nonce' ); 
?>
<table class="form-table">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'fluid-magazine' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach( $fluid_magazine_sidebar_layout as $field ){  
                $sidebar_layout = get_post_meta( $post->ID, 'fluid_magazine_sidebar_layout', true ); ?>

            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                    <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span><br/>
                    <input type="radio" name="fluid_magazine_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $sidebar_layout ); if( empty( $sidebar_layout ) ) { checked( $field['value'], 'right-sidebar' ); } ?>/>&nbsp;<?php echo esc_html( $field['label'] ); ?>
                </label>
            </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
    </tr>
</table>
<?php        
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function fluid_magazine_save_sidebar_layout( $post_id ) { 
    global $fluid_magazine_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( ! isset( $_POST[ 'fluid_magazine_sidebar_layout_nonce' ] ) || ! wp_verify_nonce( sanitize_key( $_POST[ 'fluid_magazine_sidebar_layout_nonce' ] ), basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }  
    

    foreach( $fluid_magazine_sidebar_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'fluid_magazine_sidebar_layout', true); 
        $new = sanitize_text_field( wp_unslash( $_POST['fluid_magazine_sidebar_layout'] ) );
        if ( $new && $new != $old ) {  
            update_post_meta( $post_id, 'fluid_magazine_sidebar_layout', $new );  
        } elseif ( '' == $new && $old ) {  
            delete_post_meta( $post_id,'fluid_magazine_sidebar_layout', $old );  
        }  
     } // end foreach   
     
}
add_action('save_post', 'fluid_magazine_save_sidebar_layout'); 