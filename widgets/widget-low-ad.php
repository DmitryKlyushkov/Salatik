<?php
/**
 * ==================
 *  WIDGET-Low-Ad SETTINGS
 * ==================
 *
 * @package salatik
 */
// Popular Posts Widget
class Salatik_Low_Ad_Widget extends WP_Widget {	
	// setup the widget name, desc etc
	public function __construct() {
		$widget_ops = array (
			'classname' 	=> 'salatik-low-ad-widget',			
			'description' 	=> esc_html__( 'Рекламный виджет внизу страницы', 'salatik' ),	 	
		);
		parent::__construct( 'salatik_low-ad_widget', esc_html__( 'Рекламный виджет внизу страницы', 'salatik' ), $widget_ops );	
	}

	// Back-end display of widget
	public function form( $instance ) {
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'https://', 'salatik' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Ссылка:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
        </p>
        <p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="hidden" value="<?php echo esc_url( $image ); ?>" />
            <button class="upload_image_button button button-primary"><?php esc_html_e('Загрузить изображение', 'salatik'); ?></button>
        </p>
        <?php
	}
	
	// Update widget
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

        return $instance;
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $link = ! empty( $instance['link'] ) ? $instance['link'] : 'https://';

		echo ' <a href="'.$link.'">';
                        if($image):
                            echo '<img src="'.esc_url($image).'" alt="">';
                        endif;
               echo '</a>';

	}
}