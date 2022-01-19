<?php
/**
 * Template Hooks
 *
 * @package Fluid_Magazine
 */

/**
 * Doctype
 * 
 * @see fluid_magazine_doctype_cb
*/
add_action( 'fluid_magazine_doctype', 'fluid_magazine_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see fluid_magazine_head
*/
add_action( 'fluid_magazine_before_wp_head', 'fluid_magazine_head' );

/**
 * Before Header
 * 
 * @see fluid_magazine_page_start - 20
 * @see fluid_magazine_before_header_cb - 30
*/
add_action( 'fluid_magazine_before_header', 'fluid_magazine_page_start', 20 );
add_action( 'fluid_magazine_before_header', 'fluid_magazine_before_header_cb',30);

/**
 * fluid_magazine Header
 * 
 * @see fluid_magazine_header_start  - 20
 * @see fluid_magazine_header_top    - 30
 * @see fluid_magazine_header_bottom - 40
 * @see fluid_magazine_header_end    - 100 
 */
add_action( 'fluid_magazine_header', 'fluid_magazine_header_start', 20 );
add_action( 'fluid_magazine_header', 'fluid_magazine_header_top', 30 );
add_action( 'fluid_magazine_header', 'fluid_magazine_header_bottom', 40 );
add_action( 'fluid_magazine_header', 'fluid_magazine_header_end', 100 );


/**
 * After Header
 * 
 * @see fluid_magazine_after_header_cb
*/
add_action( 'fluid_magazine_after_header', 'fluid_magazine_after_header_cb' );

/**
 * fluid_magazine Content
 * 
 * @see fluid_magazine_before_content_start - 20 
*/
add_action( 'fluid_magazine_before_content', 'fluid_magazine_before_content_start', 20 );


/**
 * Before Content
 * 
 * @see fluid_magazine_pg_header - 30
*/
add_action( 'fluid_magazine_page_header', 'fluid_magazine_pg_header', 20 );


/**
 * fluid_magazine Content
 * 
 * @see fluid_magazine_content_start
*/
add_action( 'fluid_magazine_content', 'fluid_magazine_content_start', 10 );

/**
 * Before Page entry content
 * 
 * @see fluid_magazine_page_content_image
*/
add_action( 'fluid_magazine_before_page_entry_content', 'fluid_magazine_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see fluid_magazine_post_content_image - 10
 * @see fluid_magazine_start_post_entry_header - 20
 * @see fluid_magazine_post_entry_header  - 30
*/
add_action( 'fluid_magazine_before_post_entry_content', 'fluid_magazine_post_content_image', 10 );
add_action( 'fluid_magazine_before_post_entry_content', 'fluid_magazine_start_post_entry_header', 20 );
add_action( 'fluid_magazine_before_post_entry_content', 'fluid_magazine_post_entry_header', 30 );


/**
 * Before Blog entry content
 * 
 * @see fluid_magazine_blog_content_image - 10
 * @see fluid_magazine_start_post_entry_header - 20
 * @see fluid_magazine_post_entry_header  - 30
*/
add_action( 'fluid_magazine_before_blog_entry_content', 'fluid_magazine_blog_content_image', 10 );	
add_action( 'fluid_magazine_before_blog_entry_content', 'fluid_magazine_start_post_entry_header', 20 );
add_action( 'fluid_magazine_before_blog_entry_content', 'fluid_magazine_blog_entry_header', 30 );

/**
 * Before Archive entry content
 * 
 * @see fluid_magazine_archive_content_image - 10
 * @see fluid_magazine_start_post_entry_header - 20
 * @see fluid_magazine_post_entry_header  - 30
*/
add_action( 'fluid_magazine_before_archive_entry_content', 'fluid_magazine_archive_content_image', 10 );
add_action( 'fluid_magazine_before_archive_entry_content', 'fluid_magazine_start_post_entry_header', 20 );
add_action( 'fluid_magazine_before_archive_entry_content', 'fluid_magazine_post_entry_header', 30 );	

/**
 * Before Search entry content
 * 
 * @see fluid_magazine_search_content_image - 10
 * @see fluid_magazine_start_post_entry_header  - 20
 * @see fluid_magazine_search_post_entry_header  - 20
*/
add_action( 'fluid_magazine_before_search_entry_content', 'fluid_magazine_search_content_image', 10 );	
add_action( 'fluid_magazine_before_search_entry_content', 'fluid_magazine_start_post_entry_header', 20 );
add_action( 'fluid_magazine_before_search_entry_content', 'fluid_magazine_search_entry_header', 30 );

/**
 * After Post content Footer
 * 
 * @see fluid_magazine_entry_footer
*/
add_action( 'fluid_magazine_entry_footer','fluid_magazine_entry_footer' );

/**
 * After post Entry content
 * 
 * @see fluid_magazine_end_post_entry_content - 20
*/
add_action( 'fluid_magazine_after_post_entry_content', 'fluid_magazine_end_post_entry_content', 10 );

/**
 * After post content
 * 
 * @see fluid_magazine_post_author - 20
*/
add_action( 'fluid_magazine_after_post_content', 'fluid_magazine_post_author', 20 );

/**
 * Comment
 * 
 * @see fluid_magazine_get_comment_section 
*/
add_action( 'fluid_magazine_comment', 'fluid_magazine_get_comment_section' );

/**
 * After Content
 * 
 * @see fluid_magazine_content_end - 20
 * @see fluid_magazine_after_content_end - 30
*/
add_action( 'fluid_magazine_after_content', 'fluid_magazine_content_end', 20 );
add_action( 'fluid_magazine_after_content', 'fluid_magazine_after_content_end', 30 );

/**
 * fluid_magazine Footer
 * 
 * @see fluid_magazine_footer_start  - 20
 * @see fluid_magazine_footer_top    - 30
 * @see fluid_magazine_footer_bottom - 40
 * @see fluid_magazine_footer_end    - 50
*/
add_action( 'fluid_magazine_footer', 'fluid_magazine_footer_start', 20 );
add_action( 'fluid_magazine_footer', 'fluid_magazine_footer_top', 30 );
add_action( 'fluid_magazine_footer', 'fluid_magazine_footer_bottom', 40 );
add_action( 'fluid_magazine_footer', 'fluid_magazine_footer_end', 50 );

/**
 * After Footer
 * 
 * @see fluid_magazine_page_end - 20
*/
add_action( 'fluid_magazine_after_footer', 'fluid_magazine_page_end', 20 );


/**
 * Home Page Content
 * 
 * @see fluid_magazine_stories - 10
 * @see fluid_magazine_two_col_double_cat_content - 20
 * @see fluid_magazine_blog_post_content - 30
*/

add_action( 'fluid_magazine_home_page', 'fluid_magazine_stories', 10 );
add_action( 'fluid_magazine_home_page', 'fluid_magazine_two_col_double_cat_content', 20 );
add_action( 'fluid_magazine_home_page', 'fluid_magazine_blog_post_content', 30 );

/**
 * Slider Section
 * 
 * @see fluid_magazine_slider_cb 
*/
add_action( 'fluid_magazine_slider', 'fluid_magazine_slider_cb' );

/**
 * Header Adversisement
 * 
 * @see fluid_magazine_header_ads_cb 
*/
add_action( 'fluid_magazine_header_ad', 'fluid_magazine_header_ads_cb' );

/**
 * Featured Section
 * 
 * @see fluid_magazine_feature_cat_post 
*/ 
add_action( 'fluid_magazine_featured', 'fluid_magazine_feature_cat_post' );

/**
 * Breadcrumbs
 * 
 * @see fluid_magazine_breadcrumbs_cb 
*/
add_action( 'fluid_magazine_breadcrumbs', 'fluid_magazine_breadcrumbs_cb' );