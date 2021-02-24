<?php
/**
 * ===========================
 *  WIDGET-SUBSCRIBE SETTINGS
 * ===========================
 *
 * @package salatik
 */
// Subscribe Widget
class Salatik_Subscribe_Widget extends WP_Widget {
	// setup the widget name, desc etc
	public function __construct() {
		$widget_ops = array (
			'classname' 	=> 'salatik-subscribe-widget',		
			'description' 	=> esc_html__( 'Подписка', 'salatik' ),	 	
		);
		parent::__construct( 'salatik_subscribe_widget', esc_html__( 'Подписка', 'salatik' ), $widget_ops );	
	}

	// Back-end display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'Подпишись на обновления', 'theme_name' ) );
        
        $output ='<p>';
		$output.='<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">'. esc_html_e( 'Title: ', 'theme_name' ).'</lable>';
		$output.='<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="'.esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
        $output.='</p>';
        
        echo $output;
    }
	
	//Update widget
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = ( !empty ($new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );

		return $instance;
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {

        echo $args[ 'before_widget' ];

        echo '<form class="subscribe__content">
                <h6 class="subscribe__title">'.apply_filters( 'widget_title', $instance[ 'title' ] ).'</h6>
                <input type="email" placeholder="Введите ваш e-mail" class="subscribe__input">
                <button type="submit" class="subscribe__btn">Подписаться</button>
              </form>';

		echo $args[ 'after_widget' ];
	}
}
