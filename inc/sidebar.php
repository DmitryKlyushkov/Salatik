<?php
/**
 * ==================
 *  SIDEBAR SETTINGS
 * ==================
 *
 * @package salatik
 */

add_action( 'widgets_init', 'salatik_register_my_widgets' );

function salatik_register_my_widgets(){
	register_sidebar( array(
		'name'          	=> 'sidebar',  
		'id'            	=> 'sidebar',
		'description'   	=> esc_html__( 'Основной сайдбар', 'salatik' ),	// Описание сайдбара
		'class'         	=> 'aside',
		'before_widget' 	=> '<section class="subscribe">',     	// Во что оборачивается виджет
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h6 class="widgettitle">',        	// Во что оборачивается заголовок виджета
		'after_title'   	=> '</h6>',
	) );
}