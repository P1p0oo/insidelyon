<?php
/**
 * GS Pinterest Follow Button Widgets
 */

class GS_Follow_Pin_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gs_follow_pinterest_widget', // Base ID
			__( 'GS Pinterest Follow Button', 'gs-pinterest' ), // Name
			array( 'description' => __( '
			Shows Pinterest Follow Button to any widget area.', 'gs-pinterest' ), ) // Args
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// print_r($instance);
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

        $pin_user = ! empty( $instance['pin_user'] ) ? $instance['pin_user'] : '';
        $follow_lebel = ! empty( $instance['follow_lebel'] ) ? $instance['follow_lebel'] : '';
       
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'pin_user' ); ?>"><?php _e( 'Pin User:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pin_user' ); ?>" name="<?php echo $this->get_field_name( 'pin_user' ); ?>" type="text" value="<?php echo esc_attr( $pin_user ); ?>"
				placeholder="pinterest" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'follow_lebel' ); ?>"><?php _e( 'Pin Button Text:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'follow_lebel' ); ?>" name="<?php echo $this->get_field_name( 'follow_lebel' ); ?>" type="text" value="<?php echo esc_attr( $follow_lebel ); ?>"
				placeholder="Follow Me on Pinterest" />
		</p>
		
		<?php 
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'single_pin_widget_title', $instance['title'] ). $args['after_title'];
		}

	    echo do_shortcode( '[gs_follow_pin_widget pin_user="'.$instance['pin_user'].'" follow_lebel="'.$instance['follow_lebel'].'"]' );
	 
	    echo $args['after_widget'];
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['pin_user'] = ( ! empty( $new_instance['pin_user'] ) ) ? strip_tags( $new_instance['pin_user'] ) : '';
        $instance['follow_lebel'] = ( ! empty( $new_instance['follow_lebel'] ) ) ? strip_tags( $new_instance['follow_lebel'] ) : '';

		return $instance;
	}
} 

function register_GS_follow_pin_widget() {
    register_widget( 'GS_Follow_Pin_Widget' );
}
add_action( 'widgets_init', 'register_GS_follow_pin_widget' );