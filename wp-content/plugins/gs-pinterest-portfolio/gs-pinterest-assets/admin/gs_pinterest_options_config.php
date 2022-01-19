<?php
/**
 * This page shows the procedural or functional example
 * OOP way example is given on the main plugin file.
 * @author Tareq Hasan <tareq@weDevs.com>
 */
 
/**
 * WordPress settings API demo class
 * @author Tareq Hasan
 */

if ( !class_exists('GS_pinterest_Settings_Config' ) ):
class GS_pinterest_Settings_Config {

    private $settings_api;

    function __construct() {
        $this->settings_api = new GS_Pinterest_WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
	
		add_submenu_page( 'gsp-main', 'Pinterest Settings', 'Pinterest Settings', 'delete_posts', 'pinterest-settings', array($this, 'plugin_page')); 
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' 	=> 'gs_pinterest_settings',
                'title' => __( 'GS Pinterest Settings', 'gs-pinterest' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'gs_pinterest_settings' => array(
                // User
                array(
                    'name'      => 'gs_pin_user',
                    'label'     => __( 'Pinterest User', 'gs-pinterest' ),
                    'desc'      => __( 'Enter Pinterest username', 'gs-pinterest' ),
                    'type'      => 'text',
                    'default'   => ''
                ),
                // Board
                array(
                    'name'      => 'gs_pin_board',
                    'label'     => __( 'Pinterest Board Name', 'gs-pinterest' ),
                    'desc'      => __( 'Enter Pinterest Board name for Specific board pins', 'gs-pinterest' ),
                    'type'      => 'text',
                    'default'   => ''
                ),
                 // Number of pins to display
                array(
                    'name'  => 'gs_tot_pins',
                    'label' => __( 'Total Pins to display', 'gs-pinterest' ),
                    'desc'  => __( 'Set number of pins to display. Default 10, max 25', 'gs-pinterest' ),
                    'type'  => 'number',
                    'min'   => 1,
                    'max'   => 25,
                    'default' => 10
                ),
                // theme
                array(
                    'name'  => 'gs_pin_theme',
                    'label' => __( 'Style & Theming', 'gs-pinterest' ),
                    'desc'  => __( 'Select preferred Style & Theme', 'gs-pinterest' ),
                    'type'  => 'select',
                    'default'   => 'gs_pin_theme1',
                    'options'   => array(
                        'gs_pin_theme1'   => 'Theme 1 (Pins)',
                        'gs_pin_theme2'   => 'Theme 2 (Pin Links - PRO)',
                        'gs_pin_theme3'   => 'Theme 3 (Hover - PRO)',
                        'gs_pin_theme4'   => 'Theme 4 (Popup - PRO)',
                        'gs_pin_theme5'   => 'Theme 5 (Greyscale - PRO)'
                    )
                ),
                // Pins Link Target
                array(
                    'name'      => 'gs_pin_link_tar',
                    'label'     => __( 'Pins Link Target', 'gs-pinterest' ),
                    'desc'      => __( 'Specify target to load the Links, Default New Tab ', 'gs-pinterest' ),
                    'type'      => 'select',
                    'default'   => '_blank',
                    'options'   => array(
                        '_blank'    => 'New Tab',
                        '_self'     => 'Same Window'
                    )
                ),
                // Pin Title
                array(
                    'name'      => 'gs_pin_title',
                    'label'     => __( 'Pin Title', 'gs-pinterest' ),
                    'desc'      => __( 'Show or Hide Pin Title', 'gs-pinterest' ),
                    'type'      => 'switch',
                    'switch_default' => 'ON'
                ),
                // column
                array(
                    'name'  => 'gs_pins_col',
                    'label' => __( 'Pins Column', 'gs-pinterest' ),
                    'desc'  => __( 'Number of column/s to display pins', 'gs-pinterest' ),
                    'type'  => 'select',
                    'default'   => '25',
                    'options'   => array(
                        '33.33' => '3 Columns',
                        '25'    => '4 Columns',
                        '20'    => '5 Columns - PRO',
                        '16.66' => '6 Columns - PRO'
                    )
                ),
                // Gutter
                array(
                    'name'  => 'gs_pins_gutter',
                    'label' => __( 'Gutter', 'gs-pinterest' ),
                    'desc'  => __( 'Set Gutter width, Default 10', 'gs-pinterest' ),
                    'type'  => 'number',
                    'min'   => 0,
                    'max'   => 20,
                    'default' => 10
                ),

                // Pinterest Custom CSS
                array(
                    'name'    => 'gs_pin_custom_css',
                    'label'   => __( 'Pinterest Custom CSS', 'gs-pinterest' ),
                    'desc'    => __( 'You can write your own custom css', 'gs-pinterest' ),
                    'type'    => 'textarea'
                )    
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        settings_errors();
        echo '<div class=" gs_pin_wrap" style="width: 845px; float: left;">';
        // echo '<div id="post-body-content">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';

        ?> 
            <div class="gswps-admin-sidebar" style="width: 277px; float: left; margin-top: 62px;">
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Support / Report a bug' ) ?></span></h3>
                    <div class="inside centered">
                        <p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
                        <p style="margin-bottom: 1px! important;"><a href="https://www.gsplugins.com/support" target="_blank" class="button button-primary">Get Support</a></p>
                    </div>
                </div>
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Buy me a coffee' ) ?></span></h3>
                    <div class="inside centered">
                        <p>If you like the plugin, please buy me a coffee to inspire me to develop further.</p>
                        <p style="margin-bottom: 1px! important;"><a href='https://www.2checkout.com/checkout/purchase?sid=202460873&quantity=1&product_id=8' class="button button-primary" target="_blank">Donate</a></p>
                    </div>
                </div>

                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Join GS Plugins on facebook' ) ?></span></h3>
                    <div class="inside centered">
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/gsplugins&amp;width&amp;height=258&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=723137171103956" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:220px;" allowTransparency="true"></iframe>
                    </div>
                </div>

                <div class="postbox">
                    <h3 class="hndle"><span><?php _e( 'Follow GS Plugins on twitter' ) ?></span></h3>
                    <div class="inside centered">
                        <a href="https://twitter.com/gsplugins" target="_blank" class="button button-secondary">Follow @gsplugins<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
                    </div>
                </div>
            </div>
        <?php
    }


    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

$settings = new GS_pinterest_Settings_Config();