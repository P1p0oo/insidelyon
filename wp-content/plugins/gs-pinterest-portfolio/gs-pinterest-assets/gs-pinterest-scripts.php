<?php
// -- Include js files
if ( ! function_exists('gs_enqueue_pinterest_scripts') ) {
	function gs_enqueue_pinterest_scripts() {
		if (!is_admin()) {

			// wp_register_script('gsp-jquery-masonry', GSPIN_FILES_URI . '/assets/js/masonry.pkgd.min.js', array('jquery'), GSPIN_VERSION, false);
			// wp_enqueue_script('gsp-jquery-masonry');
			wp_enqueue_script('masonry');

			wp_register_script('gspin-img-loaded-js', GSPIN_FILES_URI . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), GSPIN_VERSION, true);
			wp_enqueue_script('gspin-img-loaded-js');


			wp_register_script( 'pinterest-pinit-js', '//assets.pinterest.com/js/pinit.js', array(), GSPIN_VERSION, true );
			wp_enqueue_script('pinterest-pinit-js');			
		}	
	}
	add_action( 'wp_enqueue_scripts', 'gs_enqueue_pinterest_scripts' ); 
}

// -- Include css files
if ( ! function_exists('gs_enqueue_pinterest_styles') ) {
	function gs_enqueue_pinterest_styles() {
		if (!is_admin()) {
			$media = 'all';

			if(!wp_style_is('gspin-fa-icons','registered')){
				wp_register_style('gspin-fa-icons', GSPIN_FILES_URI . '/assets/fa-icons/css/font-awesome.min.css','', GSPIN_VERSION, $media);
			}
			if(!wp_style_is('gspin-fa-icons','enqueued')){
				wp_enqueue_style('gspin-fa-icons');
			}

			if(!wp_style_is('gspin-mfp-css','enqueued')){
				wp_enqueue_style('gspin-mfp-css');
			}

			// Plugin main stylesheet
			wp_register_style('gs_pin_custom_css', GSPIN_FILES_URI . '/assets/css/gs-pin-custom.css','', GSPIN_VERSION, $media);
			wp_enqueue_style('gs_pin_custom_css');			
		}
	}
	add_action( 'init', 'gs_enqueue_pinterest_styles' );
}

// -- Pinterest Custom CSS
if ( !function_exists('gs_pinterest_custom_style')) {
	function gs_pinterest_custom_style() {

		$gs_pin_custom_css = gs_pinterest_getoption('gs_pin_custom_css', 'gs_pinterest_settings', '');

		if( isset($gs_pin_custom_css) && !empty($gs_pin_custom_css) ){
			?>
				<style type="text/css"><?php echo $gs_pin_custom_css;?></style>
			<?php
		}
	}
	add_action( 'gs_pinterest_custom_css','gs_pinterest_custom_style' );
}

// -- Admin css
function gspin_enque_admin_style() {
    $media = 'all';

    wp_register_script( 'gspin-admin-js', GSPIN_FILES_URI . '/admin/js/gs_pin_admin_script.js', array( 'jquery' ), GSPIN_VERSION, true );
    wp_enqueue_script('gspin-admin-js');

    wp_register_style( 'gspin-admin-style', GSPIN_FILES_URI . '/admin/css/gspin_admin_style.css', '', GSPIN_VERSION, $media );
    wp_enqueue_style( 'gspin-admin-style' );

    wp_register_style( 'gspin-free-plugin-style', GSPIN_FILES_URI . '/admin/css/gs_free_plugins.css', '', GSPIN_VERSION, $media );
    wp_enqueue_style( 'gspin-free-plugin-style' );
}
add_action( 'admin_enqueue_scripts', 'gspin_enque_admin_style' );