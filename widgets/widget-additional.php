<?php
/**
 * ==================
 *  WIDGET-additional SETTINGS
 * ==================
 *
 * @package salatik
 */
// Popular Posts Widget
class Salatik_Additional_Widget extends WP_Widget {	
	// setup the widget name, desc etc
	public function __construct() {
		$widget_ops = array (
			'classname' 	=> 'salatik-additional-widget',			
			'description' 	=> esc_html__( 'Дополнительный блок', 'salatik' ),	
		);
		parent::__construct( 'salatik_additional_widget', esc_html__( 'Дополнительный блок', 'salatik' ), $widget_ops );	// id(имя) виджета, название виджета в админке, аргументы
    }
    
	// Back-end display of widget
	public function form( $instance ) {
        $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'Описание', 'salatik' ) );
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
	    $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'Ссылка', 'salatik' );
		?>
		
		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Ссылка:' ); ?></label>
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
        $instance[ 'title' ] = ( !empty ($new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
	    $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Дополнительный блок', 'salatik' ) : $instance['title'] );
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $link = ! empty( $instance['link'] ) ? $instance['link'] : 'https://';

        echo $args[ 'before_widget' ];
        
            echo '<div class="sim__content">';
                if ( $title  ):
                    echo '<h6 class="sim__title">'.$title.'</h6>';
                endif;
            echo '<div class="sim__body">
                    <a href="'.$link.'">';
                if ( $image ):
                    echo '<img src="'.esc_url($image).'" alt="">';
                endif;
            echo  '</a>
                </div>
            </div>';

		echo $args[ 'after_widget' ];
	}
}