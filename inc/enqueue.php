<?php
/**
 * =================
 *  ENQUEUE SCRIPTS
 * =================
 *
 * @package salatik
 */

 // Frontend Enqueue Scripts
 add_action( 'wp_enqueue_scripts', 'salatik_load_scripts' );
 
 function salatik_load_scripts() {
    // Styles
    wp_register_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array(), null, 'all' );
    wp_enqueue_style( 'style' );

    // Scripts
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/libs/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'beguettebox', get_template_directory_uri(  ) . '/assets/js/libs/baguetteBox.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'slick', get_template_directory_uri(  ) . '/assets/js/libs/slick.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'mask', get_template_directory_uri(  ) . '/assets/js/libs/jquery.inputmask.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'script', get_template_directory_uri(  ) . '/assets/js/script.min.js', array('jquery'), null, true );
 }

 // Admin Panel Enqueue Scripts
 add_action( 'admin_enqueue_scripts', 'salatik_load_admin_scripts', 99 );

function salatik_load_admin_scripts() {
   // Scripts
   wp_enqueue_script( 'my-wp-admin', get_template_directory_uri() .'/assets/js/admin/admin-script.min.js', array('jquery'), null, true );
}