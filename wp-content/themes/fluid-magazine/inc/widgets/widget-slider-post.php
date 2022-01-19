<?php
/**
 * Widget Slider Post
 *
 * @package Fluid_Magazine
 */
 
// register Fluid_Magazine_Slider_Post widget
function fluid_magazine_register_slider_post_widget() {
    register_widget( 'Fluid_Magazine_Slider_Post' );
}
add_action( 'widgets_init', 'fluid_magazine_register_slider_post_widget' );


if ( ! class_exists( 'Fluid_Magazine_Slider_Post' ) ):  
 /**
 * Adds Fluid_Magazine_Slider_Post widget.
 */
class Fluid_Magazine_Slider_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'fluid_magazine_slider_post', // Base ID
			__( 'RARA: Slider Post', 'fluid-magazine' ), // Name
			array( 'description' => __( 'A Slider Post Widget', 'fluid-magazine' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $post_id_one = !empty( $instance['post_list_one'] ) ? absint( $instance['post_list_one'] ) : '' ;
        $post_id_two = !empty( $instance['post_list_two'] ) ? absint( $instance['post_list_two'] ) : '' ;
        $post_id_three = !empty( $instance['post_list_three'] ) ? absint( $instance['post_list_three'] ) : '' ;
        $show_caption = !empty( $instance['show_caption'] ) ? $instance['show_caption'] : 1;
        $show_content = !empty( $instance['show_content'] ) ? $instance['show_content'] : 1 ;

        if( $post_id_one || $post_id_two || $post_id_three ){
            $total = array( $post_id_one, $post_id_two, $post_id_three );
            $total = array_diff( array_unique( $total ), array('') );
            $qry = new WP_Query( array( 
                'post_type'             => 'post',
                'posts_per_page'        => -1,
                'post__in'              => $total,
                'orderby'               => 'post__in',
                'ignore_sticky_posts'   => true
            ) );

        if( $qry->have_posts() ){
            echo $args['before_widget'];
	        if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
            echo '<div class="post-slider owl-carousel">';
            while( $qry->have_posts() ){
                $qry->the_post();
                echo '<div>';
                    
                    if( has_post_thumbnail() ){ ?>                    
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php the_post_thumbnail( 'fluid-magazine-slider-post' ); ?>
                        </a>				
                    <?php 
                    } 
                    if($show_caption){ ?>
                        <div class="entry-header">
                           
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="entry-meta">
                                <?php fluid_magazine_entry_date(); ?>
                            </div>

                        </div>
                    <?php } ?>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                           
                <?php 
                echo '</div>';   
            }
            wp_reset_postdata(); 
       
            echo '</div>';
            echo $args['after_widget'];       
        }
        
	}
    }
    

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
       
		$postlist[0] = array(
    		'value' => 0,
    		'label' => __('&mdash;Choose&mdash;', 'fluid-magazine'),
    	);
    	$arg = array('posts_per_page'   => -1, 'post_type' => array( 'post', 'page' ));
    	$posts = get_posts($arg);
    	
        foreach( $posts as $p ){ 
    		$postlist[$p->ID] = array(
    			'value' => $p->ID,
    			'label' => $p->post_title
    		);

    	}
		
      
        
        $title              = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $show_caption       = ! empty( $instance['show_caption'] ) ? $instance['show_caption'] : 1 ;
        $show_content       = ! empty( $instance['show_content'] ) ? $instance['show_content'] : 1 ;
        $post_list_one      = ! empty( $instance['post_list_one'] ) ? $instance['post_list_one'] : '' ;
        $post_list_two      = ! empty( $instance['post_list_two'] ) ? $instance['post_list_two'] : '' ;
        $post_list_three    = ! empty( $instance['post_list_three'] ) ? $instance['post_list_three'] : '' ;
        ?>

         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'fluid-magazine' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) );  ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id( 'post_list_one' ); ?>"><?php esc_html_e( 'Posts', 'fluid-magazine' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'post_list_one' ); ?>" id="<?php echo $this->get_field_id( 'post_list_one' ); ?>" class="widefat">
				<?php
				foreach ( $postlist as $single_post_one ) { ?>
					<option value="<?php echo $single_post_one['value']; ?>" id="<?php echo $this->get_field_id( $single_post_one['label'] ); ?>" <?php selected( $single_post_one['value'], $post_list_one ); ?>><?php echo $single_post_one['label']; ?></option>
				<?php } ?>
			</select>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'post_list_two' ); ?>"><?php esc_html_e( 'Posts', 'fluid-magazine' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'post_list_two' ); ?>" id="<?php echo $this->get_field_id( 'post_list_two' ); ?>" class="widefat">
                <?php
                foreach ( $postlist as $single_post_two ) { ?>
                    <option value="<?php echo $single_post_two['value']; ?>" id="<?php echo $this->get_field_id( $single_post_two['label'] ); ?>" <?php selected( $single_post_two['value'], $post_list_two ); ?>><?php echo $single_post_two['label']; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'post_list_three' ); ?>"><?php esc_html_e( 'Posts', 'fluid-magazine' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'post_list_three' ); ?>" id="<?php echo $this->get_field_id( 'post_list_three' ); ?>" class="widefat">
                <?php
                foreach ( $postlist as $single_post_three ) { ?>
                    <option value="<?php echo $single_post_three['value']; ?>" id="<?php echo $this->get_field_id( $single_post_three['label'] ); ?>" <?php selected( $single_post_three['value'], $post_list_three ); ?>><?php echo $single_post_three['label']; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id( 'show_caption' ); ?>" name="<?php echo $this->get_field_name( 'show_caption' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_caption ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_caption' ); ?>"><?php esc_html_e( 'Show Post Caption', 'fluid-magazine' ); ?></label>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_content ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php esc_html_e( 'Show Post content', 'fluid-magazine' ); ?></label>
        </p>
        
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

        
        
        $instance['title']              = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['post_list_one']      = !empty( $new_instance['post_list_one'] ) ? absint( $new_instance['post_list_one'] ) : '';
        $instance['post_list_two']      = !empty( $new_instance['post_list_two'] ) ? absint( $new_instance['post_list_two'] ) : '';
        $instance['post_list_three']    = !empty( $new_instance['post_list_three'] ) ? absint( $new_instance['post_list_three'] ) : '';
        $instance['show_caption']       = !empty( $new_instance['show_caption'] ) ? absint( $new_instance['show_caption'] ) : '1';
        $instance['show_content']       = !empty( $new_instance['show_content'] ) ? absint( $new_instance['show_content'] ) : '1';

		return $instance;
	}

} // class Fluid_Magazine_Slider_Post
endif;