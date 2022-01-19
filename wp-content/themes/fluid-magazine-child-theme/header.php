<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fluid_Magazine
 */

/**
 * Doctype
 * 
 * @hooked fluid_magazine_doctype_cb
*/
do_action( 'fluid_magazine_doctype' );
?>

<head>

<?php
/**
 * Before wp_head
 * 
 * @hooked fluid_magazine_head
*/
do_action( 'fluid_magazine_before_wp_head' );

wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,700|Roboto:300,400,700|Oxygen:300,700" rel="stylesheet">
<meta name="google-site-verification" content="Ppo2jg13Z6LLm-SkFoOt75m5_--Mw74aq-nPcAc2hC4" />
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1298232293618297'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1298232293618297&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

</head>

<body <?php body_class(); ?>>
<?php
    /**
     * Before Header
     * 
     * @see fluid_magazine_page_start - 20
     * @see fluid_magazine_before_header_cb - 30
    */
    do_action( 'fluid_magazine_before_header' );

    /**
     * fluid_magazine Header
     * 
     * @see fluid_magazine_header_start  - 20
     * @see fluid_magazine_header_top    - 30
     * @see fluid_magazine_header_bottom - 40
     * @see fluid_magazine_header_end    - 100 
    */
    do_action( 'fluid_magazine_header' );
    
    
    /**
     * After Header
     * 
     * @see fluid_magazine_after_header_cb
    */
    do_action( 'fluid_magazine_after_header' );

    
    /**
     * Before Content
     * 
     * @see fluid_magazine_before_content_start - 20
    */
    do_action( 'fluid_magazine_before_content' );