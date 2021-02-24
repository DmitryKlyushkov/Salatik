<?php
/**
 * ===============================
 * THEME FUNCTIONS AND DIFINITIONS
 * ================================
 *
 * @package salatik
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Core Constants.
define( 'SALATIK_THEME_DIR', get_template_directory() );
define( 'SALATIK_THEME_URI', get_template_directory_uri() );

// Load text domain.
load_theme_textdomain( 'salatik', SALATIK_THEME_DIR . '/languages' );

// Clean Up 
require SALATIK_THEME_DIR . '/inc/cleanup.php';

// Enqueue Style/Scripts
require SALATIK_THEME_DIR . '/inc/enqueue.php';

// Theme-Support
require SALATIK_THEME_DIR . '/inc/theme-support.php';

// Menu Settings
require SALATIK_THEME_DIR . '/inc/menu.php';

// Custom Post Types
require SALATIK_THEME_DIR . '/inc/custom-post-types.php';

// Breadcrumbs
require SALATIK_THEME_DIR . '/inc/breadcrumbs.php';

// Sidebar Widget
require SALATIK_THEME_DIR . '/inc/sidebar.php';

// Widgets Init
require SALATIK_THEME_DIR . '/widgets/widgets.php';

// Widget-Sibscribe
require SALATIK_THEME_DIR . '/widgets/widget-subscribe.php';

// Widget-Popular
require SALATIK_THEME_DIR . '/widgets/widget-popular.php';

// Widget-Sidebar-Ad
require SALATIK_THEME_DIR . '/widgets/widget-sidebar-ad.php';

// Widget-Low-Ad
require SALATIK_THEME_DIR . '/widgets/widget-low-ad.php';

// Widget-Additional
require SALATIK_THEME_DIR . '/widgets/widget-additional.php';

// Login Form
require SALATIK_THEME_DIR . '/inc/login.php';

// Lost Password
require SALATIK_THEME_DIR . '/inc/lost-password.php';

// Registration Form
require SALATIK_THEME_DIR . '/inc/registration.php';

// Rating System Settings
require SALATIK_THEME_DIR . '/inc/rating-system.php';

// Shortcode Add To Favorites
require SALATIK_THEME_DIR . '/inc/add-to-favorites.php';

// Profile Form Settings
require SALATIK_THEME_DIR . '/inc/profile-form.php';

// Ajax Functions
require SALATIK_THEME_DIR . '/inc/ajax.php';

// Custom Customizer API Settings
require SALATIK_THEME_DIR . '/inc/customizer.php';







