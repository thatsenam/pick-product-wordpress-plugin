<?php

/*
Plugin Name:  Pick Product
Plugin URI:   https://thecheapcutter.com/
Description:  Pick a product with affiliate link
Version:      1.0
Author:       Enam
Author URI:   https://thecheapcutter.com/author/enam
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
class My_Widget extends WP_Widget {

/**
 * Sets up the widgets name etc
 */
public function __construct() {
    $widget_ops = array(
        'classname' => 'my_widget',
        'description' => 'a widget that helps to implement the product with affiliate link.',
    );
    parent::__construct( 'my_widget', 'Pick Product', $widget_ops );
}

/**
 * Outputs the content of the widget
 *
 * @param array $args
 * @param array $instance
 */
public function widget( $args, $instance ) {
 echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) && ! empty( $instance['affiliate_link']) && ! empty( $instance['market_name']) && ! empty( $instance['p_description']) && ! empty( $instance['title']) && ! empty( $instance['title']) && ! empty( $instance['title']) && ! empty( $instance['title']) && ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo '<div class="pick_container"> Pick Widget By Enam </div>';
}

/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
public function form( $instance ) {
   $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Product Title', 'text_domain' );
   $affiliate_link= ! empty( $instance['a_link'] ) ? $instance['a_link'] : esc_html__( 'Affiliate Link', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Product Title', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			
			
			
			<label for="<?php echo esc_attr( $this->get_field_id( 'a_link' ) ); ?>"><?php esc_attr_e( 'Affiliate Link', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'a_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'a_link' ) ); ?>" type="text" value="<?php echo esc_attr( $affiliate_link ); ?>">
			
			
			
			<label for="<?php echo esc_attr( $this->get_field_id( 'market_name' ) ); ?>"><?php esc_attr_e( 'Market Name', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'market_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'market_name' ) ); ?>" type="text" >
			
		</p>
<?php
}

/**
 * Processing widget options on save
 *
 * @param array $new_instance The new options
 * @param array $old_instance The previous options
 *
 * @return array
 */
public function update( $new_instance, $old_instance ) {
    $instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['a_link'] = ( ! empty( $new_instance['a_link'] ) ) ? sanitize_text_field( $new_instance['a_link'] ) : '';
	    $instance['market_name'] = ( ! empty( $new_instance['market_name'] ) ) ? sanitize_text_field( $new_instance['market_name'] ) : '';
	
	return $instance;
}
}

function addStyleScript()
{
	wp_register_style('mycss', plugins_url('assets/css/main.css',__FILE__ ));
	wp_enqueue_style("mycss");
	wp_register_script( 'pickjs', plugins_url('assets/js/main.js',__FILE__ ));
    wp_enqueue_script('pickjs');
}
add_action("wp_enqueue_scripts", "addStyleScript");

add_action( 'widgets_init', function(){
	register_widget( 'My_Widget' );
});
