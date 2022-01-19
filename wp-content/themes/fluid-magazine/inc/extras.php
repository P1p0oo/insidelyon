<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Fluid_Magazine
 */

if ( ! function_exists( 'fluid_magazine_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function fluid_magazine_posted_on() {
    
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( ', ' );
    if ( $categories_list && fluid_magazine_categorized_blog() ) {
        echo '<span class="category">' .  $categories_list . '</span>'; // WPCS: XSS OK.
    }
    
    $byline = sprintf(
    esc_html_x( 'By %s', 'post author', 'fluid-magazine' ),
        '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
    );
    
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="comments-link">';
        /* translators: %s: post title */
        comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'fluid-magazine' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
    echo '</span>';
    }
    
    fluid_magazine_entry_date();
    
    if( ! is_archive() ){ echo '<span class="byline"> ' . $byline . '</span>'; }

}
endif;


if ( ! function_exists( 'fluid_magazine_entry_date' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function fluid_magazine_entry_date() {
    
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
   
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    
    echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';
}
endif;

function fluid_magazine_display_date(){

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    
    echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';
}

if ( ! function_exists( 'fluid_magazine_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function fluid_magazine_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        echo '<div class="left">';
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list();
        if ( $tags_list ) {
            printf( '<span class="tag">' . $tags_list . '</span>', $tags_list ); // WPCS: XSS OK.
        }
        echo '</div>';
    
    }
    
    edit_post_link(
    sprintf(
        /* translators: %s: Name of current post */
        esc_html__( 'Edit %s', 'fluid-magazine' ),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
    ),
    '<span class="edit-link">',
    '</span>'
    );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fluid_magazine_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'fluid_magazine_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
        'fields'     => 'ids',
        'hide_empty' => 1,
        // We only need to know if there is more than one category.
        'number'     => 2,
    ) );
    
    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );
    
    set_transient( 'fluid_magazine_categories', $all_the_cool_cats );
    }
    
    if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so fluid_magazine_categorized_blog should return true.
    return true;
    } else {
    // This blog has only 1 category so fluid_magazine_categorized_blog should return false.
    return false;
    }
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fluid_magazine_home_categories() {

/* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( ', ' );
    if ( $categories_list && fluid_magazine_categorized_blog() ) {
        printf( '<span class="category">%1$s</span>', $categories_list ); // WPCS: XSS OK.
    }
}

if( ! function_exists( 'fluid_magazine_get_social_links' ) ):
/**
 * Callback for Social Links 
 */
function fluid_magazine_get_social_links(){
    $facebook  = get_theme_mod( 'fluid_magazine_facebook' );
    $twitter   = get_theme_mod( 'fluid_magazine_twitter' );
    $pinterest = get_theme_mod( 'fluid_magazine_pinterest' );
    $linkedin  = get_theme_mod( 'fluid_magazine_linkedin' );
    $gplus     = get_theme_mod( 'fluid_magazine_gplus' );
    $instagram = get_theme_mod( 'fluid_magazine_instagram' );
    $youtube   = get_theme_mod( 'fluid_magazine_youtube' );
    $ok        = get_theme_mod( 'fluid_magazine_odnoklassniki' );
    $vk        = get_theme_mod( 'fluid_magazine_vk' );
    $xing      = get_theme_mod( 'fluid_magazine_xing' );
    
    if( $facebook || $twitter || $pinterest || $linkedin || $gplus || $instagram || $youtube || $ok || $vk || $xing ){
    ?>
    <ul class="social-networks">
    <?php if( $facebook ){ ?>
        <li><a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook" target="_blank" title="<?php esc_attr_e( 'Facebook', 'fluid-magazine' );?>"></a></li>
    <?php } if( $twitter ){ ?>
        <li><a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter" target="_blank" title="<?php esc_attr_e( 'Twitter', 'fluid-magazine' );?>"></a></li>
    <?php } if( $gplus ){ ?>
        <li><a href="<?php echo esc_url( $gplus ); ?>" class="fa fa-google-plus" target="_blank" title="<?php esc_attr_e( 'Google Plus', 'fluid-magazine' );?>"></a></li>
    <?php } if( $linkedin ){ ?>
        <li><a href="<?php echo esc_url( $linkedin ); ?>" class="fa fa-linkedin" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'fluid-magazine' );?>"></a></li>
    <?php } if( $pinterest ){ ?>
        <li><a href="<?php echo esc_url( $pinterest ); ?>" class="fa fa-pinterest" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'fluid-magazine' );?>"></a></li>
    <?php } if( $instagram ){ ?>
        <li><a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram" target="_blank" title="<?php esc_attr_e( 'Instagram', 'fluid-magazine' );?>"></a></li>
    <?php } if( $youtube ){ ?>
        <li><a href="<?php echo esc_url( $youtube ); ?>" class="fa fa-youtube" target="_blank" title="<?php esc_attr_e( 'YouTube', 'fluid-magazine' );?>"></a></li>
    <?php } if( $ok ){?>
            <li><a href="<?php echo esc_url( $ok );?>" class="fa fa-odnoklassniki" target="_blank" title="<?php esc_attr_e( 'OK', 'fluid-magazine' ); ?>"></a></li>
    <?php } if( $vk ){?>
            <li><a href="<?php echo esc_url( $vk );?>" class="fa fa-vk" target="_blank" title="<?php esc_attr_e( 'VK', 'fluid-magazine' ); ?>"></a></li>
    <?php } if( $xing ){?>
            <li><a href="<?php echo esc_url( $xing );?>" class="fa fa-xing" target="_blank" title="<?php esc_attr_e( 'Xing', 'fluid-magazine' ); ?>"></a></li>
    <?php } ?>
  </ul>
    <?php
    }
}
endif;

if( ! function_exists( 'fluid_magazine_breadcrumbs_cb' ) ) :
/**
 * Breadcrumb 
*/
function fluid_magazine_breadcrumbs_cb(){
    
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = esc_html( get_theme_mod( 'fluid_magazine_breadcrumb_separator', '>' ) ); // delimiter between crumbs
    $home = esc_html( get_theme_mod( 'fluid_magazine_breadcrumb_home_text', __( 'Home', 'fluid-magazine' ) ) ); // text for the 'Home' link
    $showCurrent = get_theme_mod( 'fluid_magazine_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    
    global $post;
    $homeLink = esc_url( home_url( ) );
    
    if( get_theme_mod( 'fluid_magazine_ed_breadcrumb' ) ){
        if ( is_front_page() ) {
        
            if ( $showOnHome == 1 ) echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div>';
        
        } else {
        
            echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
            if ( is_category() ) {
                $thisCat = get_category( get_query_var( 'cat' ), false );
                if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
                echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
            
            } elseif ( is_search() ) {
                echo $before . esc_html__( 'Search Results for "', 'fluid-magazine' ) . esc_html( get_search_query() ) . '"' . $after;
            
            } elseif ( is_day() ) {
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'fluid-magazine' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'fluid-magazine' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'fluid-magazine' ) ), get_the_time( __( 'm', 'fluid-magazine' ) ) ) ) . '">' . esc_html( get_the_time( __( 'F', 'fluid-magazine' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'd', 'fluid-magazine' ) ) ) . $after;
            
            } elseif ( is_month() ) {
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'fluid-magazine' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'fluid-magazine' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'F', 'fluid-magazine' ) ) ) . $after;
            
            } elseif ( is_year() ) {
                echo $before . esc_html( get_the_time( __( 'Y', 'fluid-magazine' ) ) ) . $after;
        
            } elseif ( is_single() && !is_attachment() ) {
                
                if ( get_post_type() != 'post' ) {
                    
                    $post_type = get_post_type_object( get_post_type() );
                    
                    if( $post_type->has_archive == true ){
                       
                        // Add support for a non-standard label of 'archive_title' (special use case).
                       $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                       // Core filter hook.
                       $label = apply_filters( 'post_type_archive_title', $label, $post_type->name );
                       printf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type ) ), $label );
                       echo '<span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
                    }
                    if ( $showCurrent == 1 ){ 
                       
                        echo $before . esc_html( get_the_title() ) . $after;
                    }

                } else {
                    $cat = get_the_category(); 
                    if( $cat ){
                        $cat = $cat[0];
                        $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                        if ( $showCurrent == 0 ) $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
                        echo $cats;
                    }
                    if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
                }
            
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                if ( get_query_var('paged') ) {
                    echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '">' . esc_html( $post_type->label ) . '</a>';
                    if( $showCurrent == 1 ) echo ' <spa n class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . sprintf( __('Page %s','fluid-magazine'), get_query_var('paged') ) . $after;
                } else {
                    if ( $showCurrent == 1 ) echo $before . esc_html( $post_type->label ) . $after;
                }

            } elseif ( is_attachment() ) {
                $parent = get_post( $post->post_parent );
                $cat = get_the_category( $parent->ID ); 
                if( $cat ){
                    $cat = $cat[0];
                    echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                    echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                if ( $showCurrent == 1 ) echo  $before . esc_html( get_the_title() ) . $after;
            
            } elseif ( is_page() && !$post->post_parent ) {
                if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
        
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while( $parent_id ){
                    $page = get_post( $parent_id );
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                    echo $breadcrumbs[$i];
                    if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
            
            } elseif ( is_tag() ) {
                echo $before . esc_html( single_tag_title( '', false ) ) . $after;
            
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata( $author );
                echo $before . esc_html( $userdata->display_name ) . $after;
            
            } elseif ( is_404() ) {
                echo $before . esc_html__( '404 Error - Page not Found', 'fluid-magazine' ) . $after;
            } elseif( is_home() ){
                echo $before;
                single_post_title();
                echo $after;
            }
        
            echo '</div>';
        
        }
    }
}
endif;

if( ! function_exists( 'fluid_magazine_pagination' ) ) :
/**
 * Pagination
*/
function fluid_magazine_pagination(){
    
    if( is_single() ){
        the_post_navigation();
    }else{
        the_posts_pagination( array(
            'prev_text'          => __('Prev', 'fluid-magazine'),
            'next_text'          => __('Next', 'fluid-magazine'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fluid-magazine' ) . ' </span>',
         ) );
    }
    
}
endif;

/**
 * Return sidebar layouts for pages
*/
function fluid_magazine_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'fluid_magazine_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'fluid_magazine_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

/**
 * Returns Section header
*/
function fluid_magazine_get_section_header( $section_title, $section_content ){
    if( $section_title || $section_content ){ ?>
    <header class="header">
    <?php 
        if( $section_title ) echo '<h2 class="title">' . esc_html( $section_title ) . '</h2>';
        if( $section_content ) echo wpautop( wp_kses_post( $section_content ) ); 
    ?>
    </header>
    <?php
    }
}

/**
 * Filer For Archive Header 
*/
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
	  else {
        $title = ( single_month_title( ' ',false ) ); 
    }

    return $title;
});


/**
 * Returns Slider Section Callack 
*/
function fluid_magazine_slider_cb(){
    
    $fluid_magazine_slider_caption  = get_theme_mod( 'fluid_magazine_slider_caption', '1' );
    $fluid_magazine_slider_cat      = get_theme_mod( 'fluid_magazine_slider_cat' );   
    $fluid_magazine_slider_readmore = get_theme_mod( 'fluid_magazine_slider_readmore', __( 'Read More', 'fluid-magazine' ) );

    if( $fluid_magazine_slider_cat ){
        $slider_qry = new WP_Query( array( 
            'post_type'             => 'post', 
            'post_status'           => 'publish',
            'posts_per_page'        => -1,                    
            'cat'                   => $fluid_magazine_slider_cat,
            'ignore_sticky_posts'   => true
        ) );
        if( $slider_qry->have_posts() ){
            echo '<div class="banner"><div id="banner-slider" class="owl-carousel" >';
            
            while( $slider_qry->have_posts()) {
                $slider_qry->the_post();
                if( has_post_thumbnail() ){
                ?>
                <div>
                <?php 
                    the_post_thumbnail( 'fluid-magazine-slider' ); 
                    if( $fluid_magazine_slider_caption ){ ?> 
                        <div class="banner-text">
                            <div class="holder">    
                                <?php fluid_magazine_home_categories(); ?>
                                <strong class="title">
                                    <a href ="<?php echo get_permalink($slider_qry->ID); ?>">
                                        <?php the_title(); ?>
                                    </a> 
                                </strong>
                                <?php if( $fluid_magazine_slider_readmore ){ ?><a href="<?php the_permalink(); ?>" class="btn-readmore"><?php echo esc_html( $fluid_magazine_slider_readmore ); ?></a> <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php 
                }
            } 
            echo '</ul></div><div class="btn-down">';
                esc_html_e('Go Down','fluid-magazine' );
            echo '</div></div><div id="next-section"></div>';
            wp_reset_postdata(); 
        }
    }   
}

if( ! function_exists( 'fluid_magazine_header_ads_cb' ) ) :
/**
 * Header AD
*/
function fluid_magazine_header_ads_cb(){
    $ed_header_ad = get_theme_mod( 'fluid_magazine_ed_header_ad' ); //from customizer
    $ad_img       = get_theme_mod( 'fluid_magazine_header_ad' ); //from customizer
    $ad_link      = get_theme_mod( 'fluid_magazine_header_ad_link' ); //from customizer
    $ad_image     = wp_get_attachment_image_src( $ad_img, 'full' );
    $target       = get_theme_mod( 'fluid_magazine_open_link_diff_tab', '1' ) ? 'target="_blank"' : '';
    
    if( $ed_header_ad && $ad_img ){ ?>
    <div class="advertise-holder">
        <?php if( $ad_link ) echo '<a href="' . esc_url( $ad_link ) . '" ' . $target . '>'; ?>
            <img src="<?php echo esc_url( $ad_image[0] ); ?>"  />
        <?php if( $ad_link ) echo '</a>'; ?>        
    </div>
    <?php
    }
}
endif;

if( ! function_exists( 'fluid_magazine_get_home_catpost' ) ) :
/**
 * Helper function to retrieve category listing in home page.
*/
function fluid_magazine_get_home_catpost( $cat_id, $paged){
    
    if( $cat_id ){
    $cat = get_category( $cat_id );    
    $single_qry = new WP_Query( "post_type=post&posts_per_page=1&cat=$cat_id" );
?>
      
         <h2 class="main-title"><a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></h2>
          <?php
                $post_one_qry = new WP_Query( array( 
                    'cat'                   => $cat_id ,
                    'post_status'           => 'publish',
                    'posts_per_page'        => $paged,
                    'ignore_sticky_posts'   => true ) );

                    if( $post_one_qry->have_posts() ){
                          while ($post_one_qry->have_posts()) : $post_one_qry->the_post(); 
                          
                              echo '<article class="post">';

                                  fluid_magazine_cat_content_image();
                                  ?>
                              <div class="text-holder">
                                  <header class="entry-header">
                              
                                          <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                          <div class="entry-meta">
                                              <?php fluid_magazine_entry_date() ?>
                                          </div>
                              
                                  </header>
                                      <div class="entry-content">
                                          <?php the_excerpt(); ?>
                                      </div>
                                  <footer class="entry-footer">
                                      <span class="byline"><?php esc_html_e( 'Posted by', 'fluid-magazine' ) ; ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
                                  </footer>
                              </div>
                          <?php echo '</article>' ;
                          
                          endwhile;
                    } ?>


<?php
    }       
}
endif;


if( ! function_exists( 'fluid_magazine_get_home_blog_post' ) ) :
/**
 * Helper function to retrieve category listing in home page.
*/
function fluid_magazine_get_home_blog_post( $cat_id, $paged){ 
    if( $cat_id ){
        $cat = get_category( $cat_id );    
    }
?>
    <section class="latest-blog">
    <?php

    $fluid_magazine_readmore_text = get_theme_mod( 'fluid_magazine_readmore_text', __( 'Read More', 'fluid-magazine' ) );

          if ($cat_id) { ?>
                <h2 class="main-title"><a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></h2>
    <?php }else{ ?>
                <h2 class="main-title"><?php esc_html_e( 'Latest Blog','fluid-magazine' ); ?></h2>
    <?php }

              echo '<div class="blog-holder">';
    
              $blog_qry = new WP_Query( array( 
                  'cat'                   => $cat_id,
                  'post_status'           => 'publish',
                  'posts_per_page'        => $paged,
                  'ignore_sticky_posts'   => true ) );
              if( $blog_qry->have_posts() ){
                  while ($blog_qry->have_posts()) : $blog_qry->the_post(); 
                     echo '<div class="post">';
                        /**
                         * Before Post entry content
                         * 
                         * @see fluid_magazine_blog_content_image - 10
                         * @see fluid_magazine_start_post_entry_header - 20
                         * @see fluid_magazine_post_entry_header  - 30
                        */
                        do_action( 'fluid_magazine_before_blog_entry_content' ); 
                    ?>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
            <?php if( $fluid_magazine_readmore_text ){ ?>
                <div class="entry-footer">
                    <a href="<?php the_permalink() ?>" class="btn-readmore"><?php echo esc_html( $fluid_magazine_readmore_text ); ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php endwhile;
        }
    echo '</div>';
    ?>
    </section>

<?php
}
endif;



if( class_exists( 'WP_Customize_Control') ) {

class Fluid_Magazine_Info_Text extends WP_Customize_Control{

    public function render_content(){
    ?>
        <span class="customize-control-title">
            <?php echo esc_html( $this->label ); ?>
        </span>

        <?php if($this->description){ ?>
            <span class="description customize-control-description">
            <?php echo wp_kses_post($this->description); ?>
            </span>
        <?php }
    }

}
}

/**
 * Is Woocommerce activated
*/
if ( ! function_exists( 'fluid_magazine_woocommerce_activated' ) ) {
  function fluid_magazine_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}


if( ! function_exists( 'fluid_magazine_featured_post_query' ) ) :
/**
 * Function to query category posts in home page
*/
function fluid_magazine_featured_post_query( $grid_class=false, $image_size, $post_per_page, $offset = false ){
    global $classes;
    $fluid_magazine_feature_section_cat = get_theme_mod( 'fluid_magazine_featured_section_cat' );
    $args = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'cat'                 => $fluid_magazine_feature_section_cat,
        'posts_per_page'      => $post_per_page
    );

    if( $offset ) $args['offset'] = $offset;
        
    $qry = new WP_Query( $args );
            
    if( $qry->have_posts() ){      
        
        while( $qry->have_posts() ){
            $qry->the_post(); 

            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( $grid_class ); ?>>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <?php if( has_post_thumbnail() ){ ?> 
                            <?php the_post_thumbnail( $image_size ); ?>
                        <?php }else{
                            ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/<?php echo esc_html( $image_size ); ?>-fallback.png">
                            <?php } ?>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php fluid_magazine_home_categories(); ?>
                    </header>
                </article>
            <?php
            }
            wp_reset_postdata();                                          
        }
    }
endif;


if( ! function_exists( 'fluid_magazine_feature_cat_post' ) ) :
/**
 * Function to query category posts in home page
*/
function fluid_magazine_feature_cat_post(){
?>
    <div class="featured-post">
        <div class="grid-sizer"></div>
        <?php 
            fluid_magazine_featured_post_query(  'grid-item--width1', 'fluid-magazine-thumb-large', 1 ); 
            fluid_magazine_featured_post_query(  '', 'fluid-magazine-thumb-small', 2, 1 ); 
            fluid_magazine_featured_post_query(  'grid-item--width3', 'fluid-magazine-thumb-medium', 1, 3 ); 
            fluid_magazine_featured_post_query(  '', 'fluid-magazine-thumb-small', 2, 4 ); 
            fluid_magazine_featured_post_query(  'grid-item--width1', 'fluid-magazine-thumb-large', 1, 6 ); 
            fluid_magazine_featured_post_query(  'grid-item--width3', 'fluid-magazine-thumb-medium', 1, 7 ); 
        ?>
    </div>
<?php
}
endif;

