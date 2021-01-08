<?php
/**
 * ===========================
 *  WIDGET-POPULAR SETTINGS
 * ===========================
 *
 * @package salatik
 */
// Popular Posts Widget
class Salatik_Popular_Posts_Widget extends WP_Widget {
	// setup the widget name, desc etc
	public function __construct() {
		$widget_ops = array (
			'classname' 	=> 'salatik-popular-posts-widget',			// Название виджета
			'description' 	=> esc_html__( 'Популярные рецепты', 'salatik' ),	 	// Описание виджета в админке
		);
		parent::__construct( 'salatik_popular_posts', esc_html__( 'Популярные рецепты', 'salatik' ), $widget_ops );	// id(имя) виджета, название виджета в админке, аргументы
	}

	// Back-end display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'Популярные рецепты', 'salatik' ) );
		$tot 	 = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output ='<p>';
		$output.='<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">'. esc_html_e( 'Заголовок: ', 'salatik' ).'</lable>';
		$output.='<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="'.esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output.='</p>';

		$output.='<p>';
		$output.='<label for="'.esc_attr( $this->get_field_id( 'tot' ) ).'">' . esc_html_e( 'Кол-во рецептов: ', 'salatik' ) . '</lable>';
		$output.='<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id( 'tot' ) ).'" name="'.esc_attr( $this->get_field_name( 'tot' ) ).'" value="'.esc_attr( $tot ).'"';
		$output.='</p>';

		echo $output;
	}
	
	// Update widget
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = ( !empty ($new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty ($new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}
	
	// front-end display of widget
	public function widget( $args, $instance ) {
        $tot = absint( $instance[ 'tot' ] );
        
		$posts_args = array(
			'post_type'			=> 'recipe',	 			// Тип записи
			'posts_per_page'	=> $tot,					// Кол-во записей на странице
			'meta_key'			=> 'post_views_count',	// $metaKey в функции salatik_save_post_views( $postID )
			'orderby'			=> 'meta_value_num',	 		// Кол-во meta_keys
			'order'			    => 'DESC'					// От большего кол-ва к меньшему
		);
		$posts_query = new WP_Query( $posts_args );

        echo $args[ 'before_widget' ];
        
		
        echo '<div class="popular__content">';
        if ( !empty( $instance[ 'title' ] ) ):
            echo '<h6 class="popular__title">' . apply_filters( 'widget_title', $instance[ 'title' ] ) . '</h6>';
        endif;
		if ( $posts_query->have_posts() ):
            while( $posts_query->have_posts() ): $posts_query->the_post();
				get_template_part( 'template-parts/content/content-popular', get_post_format() );	// Вывод вёрстки записи
            endwhile;
        endif;
        echo '</div>';
        wp_reset_postdata();
        
		echo $args[ 'after_widget' ];
	}
}
