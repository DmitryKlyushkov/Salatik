<?php
/**
 * ================
 *  AJAX FUNCTIONS
 * ================
 * @package salatik
 */
// Inserting A New Post
add_action( 'wp_ajax_nopriv_salatik_save_user_recipe', 'salatik_save_user_recipe' );
add_action( 'wp_ajax_salatik_save_user_recipe', 'salatik_save_user_recipe' );

function salatik_save_user_recipe() {
   
       $user_id = get_current_user_id();
       
       // Input Variables
       $category_name = $_POST['category'];
       $cat_id = get_cat_ID( $category_name );
       $category = get_category($cat_id);
       $parent = category_has_parent($cat_id);
        if ($parent) {
            $parent_cat = get_category($category->parent);
            $parent_id = $parent_cat->cat_ID;
        } else {
            $parent_id = $cat_id;
        }
       $title       = wp_strip_all_tags($_POST['title']);
       $content     = wp_strip_all_tags($_POST['content']);
       $ingredients = wp_strip_all_tags($_POST['ingredients']);
       $calories    = wp_strip_all_tags($_POST['calories']);
       $time        = wp_strip_all_tags($_POST['time']);

       $args = array(
           'comment_status' 	=> 'open',                                     									
           'post_type'			=> 'recipe',										
           'post_status' 		=> 'publish',	// publish, future, draft, pending, private, trash, auto-draft, inherit
           'post_author'		=> $user_id,
           'post_category'		=> array($parent_id, $cat_id),
           'post_title' 		=> $title,
           'post_content'		=> $content
       );
    
        // Creating New Post
        $post_id = wp_insert_post( $args ); 

        $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/webp');	
        if (in_array($_FILES['file']['type'], $arr_img_ext)) {		
            $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));	
            //$upload['url'] will give you uploaded file path
            $file_path = $upload['url'];
            $file_mime = mime_content_type( $_FILES["file"]['tmp_name'] );
            $upload_id = wp_insert_attachment( array(
                'guid'           		=> $file_path, 
                'post_mime_type' 	    => $file_mime,
                'post_title'     		=> preg_replace( '/\.[^.]+$/', '', $_FILES["file"]['name'] ),
                'post_content'   		=> '',
                'post_status'    		=> 'inherit'
            ), $file_path, $post_id );
            
            // wp_generate_attachment_metadata() won't work if you do not include this file
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');	
            // require_once(ABSPATH . "wp-admin" . '/includes/file.php');	
            // require_once(ABSPATH . "wp-admin" . '/includes/media.php');	

            // Generate and save the attachment metas into the database
            wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $file_path ) );
            // Set Post Thumbnail
            set_post_thumbnail( $post_id, $upload_id );
            add_post_meta( $post_id, 'ingredients', $ingredients, true);
            add_post_meta( $post_id, 'calories', $calories, true);
            add_post_meta( $post_id, 'time', $time, true);
        }

    die();
}

// Add User Avatar
add_action( 'wp_ajax_nopriv_salatik_save_user_avatar', 'salatik_save_user_avatar' );
add_action( 'wp_ajax_salatik_save_user_avatar', 'salatik_save_user_avatar' );

function salatik_save_user_avatar() {
   
       $user_id = get_current_user_id();

       $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/webp');	
       if (in_array($_FILES['file']['type'], $arr_img_ext)) {	
            $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));	// Загружаем файл в wp-content/uploads/...
            //$upload['url'] will give you uploaded file path
            $file_path = $upload['url'];
            $file_mime = mime_content_type( $_FILES["file"]['tmp_name'] );
            $upload_id = wp_insert_attachment( array(		
                'guid'           		=> $file_path, 
                'post_mime_type' 	    => $file_mime,
                'post_title'     		=> preg_replace( '/\.[^.]+$/', '', $_FILES["file"]['name'] ),
                'post_content'   		=> '',
                'post_status'    		=> 'inherit'
            ), $file_path );
            
            // wp_generate_attachment_metadata() won't work if you do not include this file
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');	
                // require_once(ABSPATH . "wp-admin" . '/includes/file.php');	
                // require_once(ABSPATH . "wp-admin" . '/includes/media.php');	
    
            // Generate and save the attachment metas into the database
            wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $file_path ) );
            if (!empty(get_user_meta($user_id, '_user_img_url') )) {
                delete_user_meta($user_id, '_user_img_url');
                wp_delete_attachment( $upload_id, true );
            }
            add_user_meta( $user_id, '_user_img_url', $file_path);
        }
    die();  
}


