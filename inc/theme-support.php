<?php
/**
 * =============
 * THEME SUPPORT
 * =============
 * 
 * @package salatik
 */
 
// RSS Feed Links Support
// add_theme_support( 'automatic-feed-links' ); 

// Title-Tag Support
add_theme_support( 'title-tag' );

// Post Thumbnails Support
add_theme_support( 'post-thumbnails' ); 

// Activate HTML5 Features
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) ); 

// Post Formats Support
add_theme_support( 'post-formats', array( 'video', 'gallery' ));

//Visible Edit Shortcuts
add_theme_support( 'customize-selective-refresh-widgets' );


// Delete all <li> classes in menu 
add_filter( 'nav_menu_css_class', '__return_empty_array' );

 // Activate Nav Menu
 function salatik_register_nav_menu() {
	register_nav_menu( 'primary', 'primary menu' );
}
add_action( 'after_setup_theme', 'salatik_register_nav_menu'  ); 

// Add class names to all menu links <a>
add_filter( 'nav_menu_link_attributes', 'salatik_filter_nav_menu_link_attributes', 10, 4 );
function salatik_filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

	if ( in_array( $args->theme_location, ['primary'] ) ) {
		$atts['class'] = 'header__link';
	}
	
	return $atts;
}

// Redirect Wp-admin URL
function only_admin()
{
if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
                wp_redirect( site_url() );
    }
}
add_action( 'admin_init', 'only_admin', 1 );

// Check If Category Has A Parent
function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

