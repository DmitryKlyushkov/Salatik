<?php
/**
 * =============
 * MENU SETTINGS
 * =============
 * 
 * @package salatik
 */

// Activate Login Menu
 function salatik_register_login_menu() {
	register_nav_menu( 'login', 'login menu' );
}
add_action( 'after_setup_theme', 'salatik_register_login_menu'  ); 

// Add class names to exact menu links <a>
add_filter( 'nav_menu_link_attributes', 'salatik_filter_login_menu_link_attributes', 10, 4 );
function salatik_filter_login_menu_link_attributes( $atts, $item, $args, $depth ) {

	if ( 39 === $item->ID  && 'login' === $args->theme_location  ) {
		$atts['class'] = 'header__login';
    }
    if ( 38 === $item->ID  && 'login' === $args->theme_location  ) {
		$atts['class'] = 'header__reg';
    }
	
	return $atts;
}

/** ================================================================================================================= */
 // Activate Header-Bottom Menu
 function salatik_register_header_bottom_menu() {
	register_nav_menu( 'header_bottom', 'header bottom menu' );
}
add_action( 'after_setup_theme', 'salatik_register_header_bottom_menu'  ); 

// Add class names to all menu items <li>
add_filter( 'nav_menu_css_class', 'salatik_change_header_bottom_menu_item_css_classes', 15, 4 );

function salatik_change_header_bottom_menu_item_css_classes( $classes, $item, $args, $depth ) {

	if ( 'header_bottom' === $args->theme_location ) {  
		$classes = [ 'header-nav-bot__link' ];  
	} else {
		$classes = [];
	}

	return $classes;
}

// Add class name to the menu item if it has sub-menu
add_filter( 'nav_menu_css_class', 'salatik_add_header_bottom_aria_haspopup_atts', 15, 4 );
function salatik_add_header_bottom_aria_haspopup_atts( $atts, $item, $args ) {

 	if (in_array('menu-item-has-children', $item->classes) && 'header_bottom' === $args->theme_location ) { //primary - id  меню(theme-location)
    		$atts['class'] = 'has-children';  //имя класса для <li>
  	}

 	 return $atts;
}

/** ================================================================================================================= */
 // Activate Mobile Primary Menu
 function salatik_register_mobile_primary_menu() {
	register_nav_menu( 'mobile_primary', 'mobile primary menu' );
}
add_action( 'after_setup_theme', 'salatik_register_mobile_primary_menu'  ); 

// Add class names to all menu links <a>
add_filter( 'nav_menu_link_attributes', 'salatik_filter_mobile_primary_link_attributes', 10, 4 );
function salatik_filter_mobile_primary_link_attributes( $atts, $item, $args, $depth ) {

	if ( in_array( $args->theme_location, ['mobile_primary'] ) ) { 
		$atts['class'] = 'mobile-menu__link';  
	}
	
	return $atts;
}

/** ================================================================================================================= */
 // Activate Mobile Bottom Menu
 function salatik_register_mobile_bottom_menu() {
	register_nav_menu( 'mobile_bottom', 'mobile bottom menu' );
}
add_action( 'after_setup_theme', 'salatik_register_mobile_bottom_menu'  ); 

// Add class name to the menu item if it has sub-menu
add_filter( 'nav_menu_css_class', 'salatik_add_mobile_bottom_aria_haspopup_atts', 15, 4 );
function salatik_add_mobile_bottom_aria_haspopup_atts( $atts, $item, $args ) {

 	if (in_array('menu-item-has-children', $item->classes) && 'mobile_bottom' === $args->theme_location ) {
    		$atts['class'] = 'dropdown'; 
  	}

 	 return $atts;
}

// Add class names to all menu links <a>
add_filter( 'nav_menu_link_attributes', 'theme_name_filter_nav_mobile_bottom_menu_link_attributes', 10, 4 );
function theme_name_filter_nav_mobile_bottom_menu_link_attributes( $atts, $item, $args, $depth ) {

	if ( in_array( $args->theme_location, ['mobile_bottom'] ) ) { 
		$atts['class'] = 'mobile-menu__link';
	}
	
	return $atts;
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {   
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);    
		$output .= "\n$indent<ul class=\"sub-menu dropdown__container\">\n";   
	} 
}

/** ================================================================================================================= */
// Activate Footer Menu
function salatik_register_footer_menu() {
	register_nav_menu( 'footer', 'footer menu' );
}
add_action( 'after_setup_theme', 'salatik_register_footer_menu'  ); 

// Add class names to all menu links <a>
add_filter( 'nav_menu_link_attributes', 'theme_name_filter_footer_menu_link_attributes', 10, 4 );
function theme_name_filter_footer_menu_link_attributes( $atts, $item, $args, $depth ) {

	if ( in_array( $args->theme_location, ['footer', 'footer'] ) ) {  //можно перечислять меню через запятую
		$atts['class'] = 'footer__link';   //название класса для всех <a> в этом меню
	}
	
	return $atts;
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**==================================================================================================================== */