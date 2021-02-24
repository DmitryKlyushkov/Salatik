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
	// Sidebar 1
	register_sidebar( array(
		'name'          	=> 'sidebar',  
		'id'            	=> 'sidebar',
		'description'   	=> esc_html__( 'Основной сайдбар', 'salatik' ),	
		'class'         	=> 'aside',
		'before_widget' 	=> '<section class="subscribe">',     	
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h6 class="widgettitle">',        
		'after_title'   	=> '</h6>',
	) );
	
	// Sidebar 2
	register_sidebar( array(
		'name'          	=> 'sidebar-low-ad',  
		'id'            	=> 'sidebar-low-ad',
		'description'   	=> esc_html__( 'Второй сайдбар', 'salatik' ),	
		'class'         	=> 'fff',
	) );
}