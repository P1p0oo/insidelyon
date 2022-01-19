<?php
/**
 * Custom template functions for this theme.
 *
 * @package Fluid_JMagazine
 */

if( ! function_exists( 'fluid_magazine_doctype_cb' ) ) :
/**
 * Doctype Declaration
*/
function fluid_magazine_doctype_cb(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_head' ) ) :
/**
 * Before wp_head 
*/
function fluid_magazine_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_page_start' ) ) :
/**
 * Page Start
*/
function fluid_magazine_page_start(){
    ?>
    <div id="page" class="site">
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_before_header_cb' ) ) :
/**
 * Page Start
*/
function fluid_magazine_before_header_cb(){
    
    $fluid_magazine_ed_slider = get_theme_mod( 'fluid_magazine_ed_slider' );
    
    if( is_front_page() && $fluid_magazine_ed_slider ) do_action( 'fluid_magazine_slider' ); ?>
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_header_start' ) ) :
/**
 * Header Start
*/
function fluid_magazine_header_start(){
    ?>
    <header class="site-header">
    <?php 
}
endif;

if( ! function_exists( 'fluid_magazine_header_top' ) ) :
/**
 * Header Top
*/
function fluid_magazine_header_top(){
    
    ?>
    <div class="sticky-holder"></div>
    <div class="header-t">
        <div class="container">
            <div id="mobile-header">
                <a id="responsive-menu-button" href="#sidr-main">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->

        <?php $ed_search_form = get_theme_mod( 'fluid_magazine_ed_search', '1' ); ?>
            
                <div class="right">
                    <?php if( $ed_search_form ){ ?>
                    <div class="btn-search">
                        <i class="fa fa-search"></i>
                        <div class="form-holder">
                        <?php get_search_form(); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php fluid_magazine_get_social_links(); ?>
                </div>
            
        </div>
    </div>

    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_header_bottom' ) ) :
/**
 * Header Bottom
*/
function fluid_magazine_header_bottom(){

    ?>
        <div class="header-b">
            <div class="container">
                <div class="site-branding">
                <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                        the_custom_logo();
                    } 
                ?>  
                    <div class="text-logo">  
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                                <?php
                                endif; 
                        ?>
                    </div> 
                </div><!-- .site-branding -->
                
                <?php
                /**
                 * Header Advertisement
                 * 
                 * @hooked fluid_magazine_header_ads_cb
                 */
                  do_action( 'fluid_magazine_header_ad' ); ?>
            </div>
        </div>

    

    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_header_end' ) ) :
/**
 * Header End
*/
function fluid_magazine_header_end(){
    ?>
    </header>
    <?php
}
endif;


if( ! function_exists( 'fluid_magazine_after_header_cb' ) ) :
/**
 * After Header
*/
function fluid_magazine_after_header_cb(){

    $fluid_magazine_ed_featured = get_theme_mod( 'fluid_magazine_ed_featured_section' );

    if( is_front_page() && $fluid_magazine_ed_featured ) do_action( 'fluid_magazine_featured' ); ?>
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_before_content_start' ) ) :
/**
 * Before Content Start
*/
function fluid_magazine_before_content_start(){
        
    if( ! is_page_template( 'template-home.php' ) || ! is_archive () ){
    ?>
    <div id="content" class="site-content">
    <?php
    }
}
endif;


if( ! function_exists( 'fluid_magazine_pg_header' ) ) :
/**
 * Page Header for inner pages
*/
function fluid_magazine_pg_header(){    
    if( ! is_front_page() && ! is_page_template( 'template-home.php' ) ){
        
        $class = is_single() ? 'entry-header' : 'page-header' ;
        $ed_bc = get_theme_mod( 'fluid_magazine_ed_breadcrumb' ); //from customizer
    
        if( is_single() ){ 
            if( $ed_bc ){ ?>
            
            <div class="top-bar">
        		<div class="container">
                    <?php do_action( 'fluid_magazine_breadcrumbs' ); // breadcrumb ?>
                </div>
            </div>
            
        <?php   
            }
        }else{
            ?>
            <!-- Page Header for inner pages only -->
            <div class="top-bar">
                <?php do_action( 'fluid_magazine_breadcrumbs' ); // breadcrumb ?>
                <header class="<?php echo esc_attr( $class ); ?>">
                    <h1 class="page-title">
                    <?php                
                    
                        if( is_home() ) single_post_title();
                        
                        if( is_page() ) the_title(); //For Page, Post & Attachment
                        
                        if( is_search() ) printf( esc_html__( 'Search Results for "%s"', 'fluid-magazine' ), get_search_query() ); 
                        
                        if( is_404() ) echo esc_html__( '404 - Page not Found', 'fluid-magazine' ); //For 404
                        
                        if( is_archive() ) the_archive_title();
                        
                    ?>
                    </h1>
                </header>

        	</div>
        <?php
        }
    }
}
endif;



if( ! function_exists( 'fluid_magazine_content_start' ) ) :
/**
 * Content Start
*/
function fluid_magazine_content_start(){
    $class1 = is_404() ? 'error-page' : 'latest-blog' ; 
    $class2 = is_404() ? 'holder' : 'blog-holder' ; ?>
    <section class="<?php echo esc_attr( $class1 ); ?>">
        <div class="<?php echo esc_attr( $class2 ); ?>">
    <?php
}
endif;


if( ! function_exists( 'fluid_magazine_page_content_image' ) ) :
/**
 * Page Featured Image
*/
function fluid_magazine_page_content_image(){
    $sidebar_layout = fluid_magazine_sidebar_layout();
    if( has_post_thumbnail() ){
        echo '<div class="post-thumbnail">';
        ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'fluid-magazine-with-sidebar' ) : the_post_thumbnail( 'fluid-magazine-without-sidebar' );    
        echo '</div>';
    }
}
endif;

if( ! function_exists( 'fluid_magazine_post_content_image' ) ) :
/**
 * Post Featured Image
*/
function fluid_magazine_post_content_image(){
    if( has_post_thumbnail() ){ 
        echo is_single() ? '<div class="post-thumbnail">' : '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';    
        
        is_active_sidebar( 'right-sidebar' ) ? the_post_thumbnail( 'fluid-magazine-with-sidebar' ) : the_post_thumbnail( 'fluid-magazine-without-sidebar' );    
        
        echo is_single() ? '</div>' : '</a>';
    }        
}
endif;

if( ! function_exists( 'fluid_magazine_archive_content_image' ) ) :
/**
 * Post Featured Image
*/
function fluid_magazine_archive_content_image(){
    if( has_post_thumbnail() ){ 
        echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' ;
            the_post_thumbnail( 'fluid-magazine-archive' ); 
        echo '</a>';
    }        
}
endif;

if( ! function_exists( 'fluid_magazine_cat_content_image' ) ) :
/**
 * Post Featured Image
*/
function fluid_magazine_cat_content_image(){
    $first_cat  = get_theme_mod( 'fluid_magazine_category_one' ); //from customizer
    $second_cat = get_theme_mod( 'fluid_magazine_category_two' ); 
    $sidebar_layout = fluid_magazine_sidebar_layout();

    if( has_post_thumbnail() && $first_cat && $second_cat ){ 
        echo '<div class = "img-holder"><a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' ;
            ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'fluid-magazine-cat-post-with-sidebar' ) : the_post_thumbnail( 'fluid-magazine-cat-post' );
        echo '</a></div>' ;
    }
    else{
        fluid_magazine_blog_content_image();
    }        
}
endif;

if( ! function_exists( 'fluid_magazine_blog_content_image' ) ) :
/**
 * Post Featured Image
*/
function fluid_magazine_blog_content_image(){

    $sidebar_layout = fluid_magazine_sidebar_layout();

    if( has_post_thumbnail() ){ 
        echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' ;
            ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'fluid-magazine-blogs-with-sidebar' ) : the_post_thumbnail( 'fluid-magazine-blogs' );
        echo '</a>' ;
    }        
}
endif;

if( ! function_exists( 'fluid_magazine_search_content_image' ) ) :
/**
 * Post Featured Image
*/
function fluid_magazine_search_content_image(){
    if( has_post_thumbnail() ){ ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
            <?php the_post_thumbnail( 'fluid-magazine-search-thumbnail' ); ?>
        </a>
<?php
    }        
}
endif;

if( ! function_exists( 'fluid_magazine_start_post_entry_header' ) ) :
/**
 * Post Entry Header
*/
function fluid_magazine_start_post_entry_header(){
    echo '<div class="text-holder">';
}
endif;

if( ! function_exists( 'fluid_magazine_end_post_entry_content' ) ) :
/**
 * Post Entry Header
*/
function fluid_magazine_end_post_entry_content(){
    echo '</div>';
}
endif;

if( ! function_exists( 'fluid_magazine_post_entry_header' ) ) :
/**
 * Post Entry Header
*/
function fluid_magazine_post_entry_header(){
    ?>
    <header class="entry-header">
		<?php
            if( is_single() ){
                the_title( '<h1 class="entry-title">', '</h1>' );
            }else{
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

            if ( 'post' === get_post_type() ){ 
                                
                echo '<div class="entry-meta">';
                    fluid_magazine_posted_on();
                echo '</div>';
                
            } 
        ?>
	</header><!-- .entry-header -->
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_blog_entry_header' ) ) :
/**
 * Post Entry Header
*/
function fluid_magazine_blog_entry_header(){
    ?>
    <header class="entry-header">
		<?php
            if ( 'post' === get_post_type() ){ 
                                
                echo '<div class="entry-meta">';
                    fluid_magazine_posted_on();
                echo '</div>';
                
            }
            
            if( is_single() ){
                the_title( '<h1 class="entry-title">', '</h1>' );
            }else{
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

        ?>
	</header><!-- .entry-header -->
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_search_entry_header' ) ) :
/**
 * Post Entry Header
*/
function fluid_magazine_search_entry_header(){
    ?>
    <header class="entry-header">
		<?php
            if ( 'post' === get_post_type() ){ 
                                
                echo '<div class="entry-meta">';
                    fluid_magazine_posted_on();
                echo '</div>';
                
            }
            
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

        ?>
	</header><!-- .entry-header -->
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_post_author' ) ) :
/**
 * Author Bio
 * 
*/
function fluid_magazine_post_author(){
    if( get_the_author_meta( 'description' ) ){
    ?>
    <section class="author">
		<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 105 ); ?></div>
		<div class="text-holder">
			<h2 class="title"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h2>				
			<?php echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ); ?>
		</div>
	</section>
    <?php  
    }  
}
endif;

if( ! function_exists( 'fluid_magazine_get_comment_section' ) ) :
/**
 * Comment template
 * 
*/
function fluid_magazine_get_comment_section(){
    // If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
endif;



if( ! function_exists( 'fluid_magazine_content_end' ) ) :
/**
 * Content Start
*/
function fluid_magazine_content_end(){
?>
        </div>
    </section>  
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_after_content_end' ) ) :
/**
 * Content End
*/
function fluid_magazine_after_content_end(){
    if( ! is_page_template( 'template-home.php' ) ){
    ?>
        </div>
    <?php
    }
}
endif;

if( ! function_exists( 'fluid_magazine_footer_start' ) ) :
/**
 * Footer Start
*/
function fluid_magazine_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_footer_top' ) ) :
/**
 * Footer Top
*/
function fluid_magazine_footer_top(){    
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ){
    ?>
    <div class="footer-t">
		<div class="container">
			<div class="row">
				<?php if( is_active_sidebar( 'footer-one' ) ){ ?>
					<div class="column">
					   <?php dynamic_sidebar( 'footer-one' ); ?>	
					</div>
                <?php } ?>
				
                <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                    <div class="column">
					   <?php dynamic_sidebar( 'footer-two' ); ?>	
					</div>
                <?php } ?>
                
                <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                    <div class="column">
					   <?php dynamic_sidebar( 'footer-three' ); ?>	
					</div>
                <?php } ?>

                <?php if( is_active_sidebar( 'footer-four' ) ){ ?>
                    <div class="column">
                       <?php dynamic_sidebar( 'footer-four' ); ?>  
                    </div>
                <?php } ?>
			</div>
		</div>
	</div>
    <?php 
    }   
}
endif;

if( ! function_exists( 'fluid_magazine_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function fluid_magazine_footer_bottom(){
    $copyright_text  = get_theme_mod( 'fluid_magazine_footer_copyright_text' );
    ?>
        <div class="site-info">
		    <div class="container">
                <?php 
                if( $copyright_text ){ ?>
    				<div class="copyright">
                        <?php echo wp_kses_post( $copyright_text ); ?>
                    </div>
                <?php 
                }else{ ?>
                    <div class="copyright">
                        <?php echo esc_html__( '&copy; Copyright ', 'fluid-magazine' ) . date_i18n( esc_html__( 'Y', 'fluid-magazine' ) ); ?> 
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>.
                    </div>               
                <?php } ?>				
                <div class="by">
                    <a href="<?php echo 'http://raratheme.com/wordpress-themes/fluid-magazine/'; ?>" rel="author" target="_blank"><?php echo esc_html__( 'Fluid Magazine by Rara Theme', 'fluid-magazine' ); ?></a>.
                    <?php printf( esc_html__( 'Powered by %s', 'fluid-magazine' ), '<a href="https://wordpress.org/" target="_blank">WordPress</a>' ); ?>.
                    <?php
                    if ( function_exists( 'the_privacy_policy_link' ) ) {
                        the_privacy_policy_link();
                    }
                    ?>
                </div>                
			</div>
		</div>
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_footer_end' ) ) :
/**
 * Footer End 
*/
function fluid_magazine_footer_end(){
    ?>
    </footer><!-- #colophon -->
    <?php
}
endif;

if( ! function_exists( 'fluid_magazine_page_end' ) ) :
/**
 * Page End
*/
function fluid_magazine_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;





if( ! function_exists( 'fluid_magazine_two_col_double_cat_content' ) ) :
/**
 * Category Section One/Two
*/
function fluid_magazine_two_col_double_cat_content(){
    $first_cat  = get_theme_mod( 'fluid_magazine_category_one' ); //from customizer
    $second_cat = get_theme_mod( 'fluid_magazine_category_two' ); //from customizer
    if( $first_cat || $second_cat ){
        echo '<section class="category-post">';
        echo '<div class="row">';
        if( $first_cat && $second_cat ) echo '<div class="col">';
                fluid_magazine_get_home_catpost( $first_cat, 2);
            if( $first_cat && $second_cat )echo '</div><div class="col">';
                fluid_magazine_get_home_catpost( $second_cat, 2 );
            if( $first_cat && $second_cat )echo '</div>';
        echo '</div>';
    echo '</section>';
    }
}
endif;


if( ! function_exists( 'fluid_magazine_stories' ) ) :
/**
 * Helper function to retrieve category listing in home page.
*/
function fluid_magazine_stories(){
    if( get_theme_mod( 'fluid_magazine_ed_stories_section' ) == 1 ){
    $fluid_magazine_stories_section_title = get_theme_mod('fluid_magazine_stories_section_title');
    $fluid_magazine_stories_section_cat = get_theme_mod('fluid_magazine_stories_section_cat');
    $fluid_magazine_stories_section_total = get_theme_mod('fluid_magazine_stories_section_total');

?>
    <section class="top-stories">
        <?php 

            if($fluid_magazine_stories_section_title) {
                echo '<h2 class="main-title">'.  esc_html (  $fluid_magazine_stories_section_title ).'</h2>';
                }
                echo '<div class="row">';

                    if( $fluid_magazine_stories_section_cat ){
                        $stories_qry = new WP_Query( array( 
                            'cat'           => $fluid_magazine_stories_section_cat,
                            'post_status'           => 'publish',
                            'posts_per_page'    => 3,
                            'ignore_sticky_posts'   => true ) );
                        if( $stories_qry->have_posts() ){
                            while ($stories_qry->have_posts()) : $stories_qry->the_post(); 
                                echo '<div class="col">';
                                    echo '<article class="post">';
                                        if( has_post_thumbnail() ){ ?>
                                            <a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'fluid-magazine-stories-post' ); ?></a>
                                    <?php } ?>
                                        <div class="text-holder">
                                            <header class="entry-header">
                                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <div class="entry-meta">
                                                    <?php fluid_magazine_entry_date(); ?>
                                                </div>     
                                            </header>
                                            <div class="entry-content">
                                            <?php the_excerpt(); ?>
                                            </div>
                                            <footer class="entry-footer">
                                                <span class="byline"><?php echo esc_html('Posted by') ; ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
                                            </footer>
                                        </div>
                                <?php 
                                    echo '</article>' ;
                                echo '</div>';
                            endwhile;
                        }
                    }
                echo '</div>';
        ?>
    </section>
    <?php
    }
}
endif;

if( ! function_exists( 'fluid_magazine_blog_post_content' ) ) :
/**
 * Helper function to retrieve category listing in home page.
*/
function fluid_magazine_blog_post_content(){
    $blog_cat = get_theme_mod( 'fluid_magazine_blogs_section_cat' ); //from customizer
    if( is_front_page() ){
        if( $blog_cat ){
            fluid_magazine_get_home_blog_post( $blog_cat, 2 );
        }else{
            fluid_magazine_get_home_blog_post( false, 2 );
        }
    }

}
endif;
