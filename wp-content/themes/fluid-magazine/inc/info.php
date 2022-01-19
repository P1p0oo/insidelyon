<?php
/**
 * Fluid Magazine Theme Info
 *
 * @package Fluid_Magazine
 */

function fluid_magazine_customizer_theme_info( $wp_customize ) {

	$wp_customize->add_setting(
		'fluid_magazine_setup_instruction',
		array(
			'sanitize_callback' => 'fluid_magazine_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Fluid_Magazine_Info_Text( 
			$wp_customize,
			'fluid_magazine_setup_instruction',
			array(
				'settings'		=> 'fluid_magazine_setup_instruction',
				'section'		=> 'theme_info',
				'description'	=> __( '<strong>Instruction for how to up Home Page in Fluid Magazine Theme</strong><br/>1. Go to Pages and create a new page (Title can be anything. For example, Home )<br/>
2. In right column and under Page Attributes, choose "Home Page" template<br/>
3. Click on Publish<br/>
4. Go to Appearance-> Customize -> Default Settings -> Static Front Page<br/>
5. Select A static page<br/>
6. Under Front Page, select the page that you created in the step 1<br/>
7. Save changes', 'fluid-magazine'),
			)
		)
	);

	  /** Enable/Disable Header AD */
    $wp_customize->add_setting(
        'fluid_magazine_ed_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'fluid_magazine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'fluid_magazine_ed_header_ad',
        array(
            'label'   => __( 'Enable Header Advertisement', 'fluid-magazine' ),
            'section' => 'fluid_magazine_ad_settings',
            'type'    => 'checkbox',
        )
    );

	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Information Links' , 'fluid-magazine' ),
		'priority'    => 6,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '';
	$theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'fluid-magazine' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'fluid-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/previews/?theme=fluid-magazine' ) . '" target="_blank">' . __( 'here', 'fluid-magazine' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'fluid-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/documentation/fluid-magazine/' ) . '" target="_blank">' . __( 'here', 'fluid-magazine' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme info', 'fluid-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/fluid-magazine/' ) . '" target="_blank">' . __( 'here', 'fluid-magazine' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'fluid-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'fluid-magazine' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Rate this theme', 'fluid-magazine' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/support/theme/fluid-magazine/reviews' ) . '" target="_blank">' . __( 'here', 'fluid-magazine' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More WordPress Themes' ,'fluid-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'fluid-magazine' ) . '</a></span><br />';
	

	$wp_customize->add_control( new Fluid_Magazine_Theme_Info( $wp_customize ,'theme_info_theme',array(
		'label' => __( 'About Fluid Magazine' , 'fluid-magazine' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

}
add_action( 'customize_register', 'fluid_magazine_customizer_theme_info' );


if( class_exists( 'WP_Customize_Control' ) ){

	class Fluid_Magazine_Theme_Info extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
    
}//class close
