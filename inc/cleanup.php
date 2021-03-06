<?php
/**
 * ===================
 *  CLEAN UP FUNCTIONS
 * ===================
 * @package salatik
 */

// Remove version string from js and css
function salatik_remove_wp_version_strings( $src ) {

    global $wp_version;
    parse_str( parse_url($src, PHP_URL_QUERY), $query );
    if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'salatik_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'salatik_remove_wp_version_strings' );

// Remove Admin Bar To Everyone Except Admin
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

// Remove metatag generator from header
function salatik_remove_meta_version() {
    return '';
}

add_filter( 'the_generator', 'salatik_remove_meta_version' );
remove_action( 'wp_head', 'wp_generator' );

// Remove link rel='EditURI' 
remove_action( 'wp_head', 'rsd_link' );

// Remove link rel=’wlwmanifest’ Windows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remove link rel=’shortlink’
remove_action('wp_head', 'wp_shortlink_wp_head');

// Remove link rel='canonical'
remove_action( 'wp_head', 'rel_canonical' );

// Remove RSS Feed
remove_action('wp_head','adjacent_posts_rel_link_wp_head');
remove_action('wp_head','feed_links_extra', 3);

// Remove DNS-prefetch
remove_action( 'wp_head', 'wp_resource_hints', 2);

// Remove WordPress Emojis
function disable_emoji_feature() {
	
	// Prevent Emoji from loading on the front-end
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove from admin area also
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	// Remove from RSS feeds also
	remove_filter( 'the_content_feed', 'wp_staticize_emoji');
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji');

	// Remove from Embeds
	remove_filter( 'embed_head', 'print_emoji_detection_script' );

	// Remove from emails
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Disable from TinyMCE editor. Currently disabled in block editor by default
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );

	/** Finally, prevent character conversion too
         ** without this, emojis still work 
         ** if it is available on the user's device
	 */

	add_filter( 'option_use_smilies', '__return_false' );

}

function disable_emojis_tinymce( $plugins ) {
	if( is_array($plugins) ) {
		$plugins = array_diff( $plugins, array( 'wpemoji' ) );
	}
	return $plugins;
}

add_action('init', 'disable_emoji_feature');
add_filter( 'option_use_smilies', '__return_false' );

// Unregister Default Widgets
function unregister_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Gallery');
	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Custom_HTML');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);