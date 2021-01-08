<?php
/**
 * ==============
 *  WIDGETS INIT
 * ==============
 *
 * @package salatik
 */

add_action( 'widgets_init', 'salatik_widgets_init');

function salatik_widgets_init() {
	register_widget( 'Salatik_Subscribe_Widget' );
	register_widget( 'Salatik_Popular_Posts_Widget' );
	register_widget( 'Salatik_Sidebar_Ad_Widget' );
	register_widget( 'Salatik_Additional_Widget' );		
 }

