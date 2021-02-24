<?php
/**
 * ==========================
 * CUSTOM POST TYPE SETTINGS
 * ==========================
 *
 * @package salatik
 */

add_action( 'init', 'salatik_register_post_types' );
add_filter( 'manage_recipe_posts_columns', 'set_recipe_columns' );
add_action( 'manage_recipe_posts_custom_column', 'recipe_custom_column', 10, 2 );

function salatik_register_post_types(){
	register_post_type( 'recipe', [
		'label'  => null,
		'labels' => [
			'name'               	=> esc_html__( 'Рецепты', 'salatik' ), 		
			'singular_name'      	=> esc_html__( 'Рецепт', 'salatik' ), 	
			'add_new'            	=> esc_html__( 'Добавить рецепт', 'salatik' ), 	
			'add_new_item'      	=> esc_html__( 'Добавление рецепта', 'salatik' ), 	
			'edit_item'          	=> esc_html__( 'Редактировать рецепт', 'salatik' ),  
			'new_item'          	=> esc_html__( 'Новый рецепт', 'salatik' ),	
			'view_item'          	=> esc_html__( 'Посмотреть рецепт', 'salatik' ), 
			'search_items'      	=> esc_html__( 'Поиск рецепта', 'salatik' ), 
			'not_found'         	=> esc_html__( 'Не найдено', 'salatik' ), 
			'not_found_in_trash' 	=> esc_html__( 'Не найдено в корзине', 'salatik' ), 
			'parent_item_colon'  	=> esc_html__( '', 'salatik' ), 						
			'menu_name'          	=> esc_html__( 'Рецепты', 'salatik' ), 						
		],
		'description'         		=> esc_html__( 'Рецепты салатов', 'salatik' ),		
		'public'              		=> true,							
	    'exclude_from_search'		=> false, 													
		'show_in_menu'       		=> null, 												
		'show_in_rest'        		=> null, 												
		'menu_position'       		=> 7,						
		'menu_icon'          		=> 'dashicons-products', 								
		'hierarchical'        		=> false,
		'supports'            		=> [ 'title', 'editor', 'author', 'thumbnail', 'comments' ],  // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          		=> ['category', 'ingredients', 'calories', 'time'],
		'has_archive'         		=> true,
		'rewrite' 					=> true,
		'query_var'           		=> true,
	] );
}

// Taxonomies
add_action( 'init', 'recipe_create_taxonomy' );

function recipe_create_taxonomy(){

	// INGREDIENTS TAXONOMY
	register_taxonomy( 'ingredients', [ 'recipe' ], [ 
		'label'        	=> esc_html__( 'Ингредиенты', 'salatik' ), 			// определяется параметром $labels->name
		'labels'              => [
			'name'             		=> esc_html__( 'Ингредиенты', 'salatik' ),
			'singular_name'    		=> esc_html__( 'Ингредиент', 'salatik' ),
			'search_items'      	=> esc_html__( 'Поиск ингредиентов', 'salatik' ),
			'all_items'        		=> esc_html__( 'Все ингредиенты', 'salatik' ),
			'view_item '       		=> esc_html__( 'Просмотр ингредиентов', 'salatik' ),
			'parent_item'       	=> esc_html__( 'Родительский ингредиент', 'salatik' ),
			'parent_item_colon' 	=> esc_html__( 'Родительский ингредиент', 'salatik' ),
			'edit_item'         	=> esc_html__( 'Редактировать ингредиент', 'salatik' ),
			'update_item'       	=> esc_html__( 'Обновить ингредиент', 'salatik' ),
			'add_new_item'      	=> esc_html__( 'Добавить новый ингредиент', 'salatik' ),
			'new_item_name'     	=> esc_html__( 'Новый ингредиент', 'salatik' ),
			'menu_name'         	=> esc_html__( 'Ингредиенты', 'salatik' ),
		],
		'description'          		=> esc_html__( 'Ингредиенты рецепта', 'salatik' ), 	
		'public'               		=> true,
		'show_in_menu'          	=> false, 						
		'hierarchical'          		=> false, 					
		'rewrite'               		=> true,
		'capabilities'          		=> array(),
		'meta_box_cb'           		=> 'recipe_ingredients_meta_box',  
		'show_admin_column'    			=> true, 					
		'show_in_rest'          		=> true, 						
	] );

	// CALORIES TAXONOMY
	register_taxonomy( 'calories', [ 'recipe' ], [ 
		'label'        	=> esc_html__( 'Калории', 'salatik' ), 		
		'labels'              => [
			'name'             		=> esc_html__( 'Калории', 'salatik' ),
			'singular_name'    		=> esc_html__( 'Калории', 'salatik' ),
			'search_items'      	=> esc_html__( 'Поиск калорий', 'salatik' ),
			'all_items'        		=> esc_html__( 'Все Калории', 'salatik' ),
			'view_item '       		=> esc_html__( 'Просмотр Калорий', 'salatik' ),
			'parent_item'       	=> esc_html__( 'Родительский Калории', 'salatik' ),
			'parent_item_colon' 	=> esc_html__( 'Родительский Калории', 'salatik' ),
			'edit_item'         	=> esc_html__( 'Редактировать Калории', 'salatik' ),
			'update_item'       	=> esc_html__( 'Обновить Калории', 'salatik' ),
			'add_new_item'      	=> esc_html__( 'Добавить новый Калории', 'salatik' ),
			'new_item_name'     	=> esc_html__( 'Новый Калории', 'salatik' ),
			'menu_name'         	=> esc_html__( 'Калории', 'salatik' ),
		],
		'description'          		=> esc_html__( 'Калории рецепта', 'salatik' ), 	
		'public'               		=> true,
		'show_in_menu'          	=> false, 					
		'hierarchical'          		=> false, 					
		'rewrite'               		=> true,
		'capabilities'          		=> array(),
		'meta_box_cb'           		=> 'recipe_calories_meta_box',  
		'show_admin_column'    			=> true, 					
		'show_in_rest'          		=> true, 					
	] );

	// TIME TAXONOMY
	register_taxonomy( 'time', [ 'recipe' ], [ 
		'label'        	=> esc_html__( 'Время готовки готовки', 'salatik' ), 	
		'labels'              => [
			'name'             		=> esc_html__( 'Время готовки', 'salatik' ),
			'singular_name'    		=> esc_html__( 'Время готовки', 'salatik' ),
			'search_items'      	=> esc_html__( 'Поиск Время готовки', 'salatik' ),
			'all_items'        		=> esc_html__( 'Все Время готовки', 'salatik' ),
			'view_item '       		=> esc_html__( 'Просмотр Время готовки', 'salatik' ),
			'parent_item'       	=> esc_html__( 'Родительский Время готовки', 'salatik' ),
			'parent_item_colon' 	=> esc_html__( 'Родительский Время готовки', 'salatik' ),
			'edit_item'         	=> esc_html__( 'Редактировать Время готовки', 'salatik' ),
			'update_item'       	=> esc_html__( 'Обновить Время готовки', 'salatik' ),
			'add_new_item'      	=> esc_html__( 'Добавить новый Время готовки', 'salatik' ),
			'new_item_name'     	=> esc_html__( 'Новый Время готовки', 'salatik' ),
			'menu_name'         	=> esc_html__( 'Время готовки', 'salatik' ),
		],
		'description'          		=> esc_html__( 'Время готовки рецепта', 'salatik' ), 
		'public'               		=> true,
		'show_in_menu'          	=> false, 					
		'hierarchical'          		=> false, 				
		'rewrite'               		=> true,
		'capabilities'          		=> array(),
		'meta_box_cb'           		=> 'recipe_time_meta_box',  
		'show_admin_column'    			=> true, 					
		'show_in_rest'          		=> true, 					
	] );
}


// Set custom post type columns
function set_recipe_columns( $columns ){
    // Columns
    $newColumns = array();
    $newColumns[ 'title' ] 	        = esc_html__( 'Название', 'salatik' ); 
    $newColumns[ 'thumbnail' ] 	    = esc_html__( 'Изображение', 'salatik' ); 
    $newColumns[ 'editor' ] 	    = esc_html__( 'Описание', 'salatik' ); 
	$newColumns[ 'category' ] 	    = esc_html__( 'Рубрики', 'salatik' );
	$newColumns[ 'ingredients' ] 	= esc_html__( 'Ингредиенты', 'salatik' );
	$newColumns[ 'calories' ] 		= esc_html__( 'Калории', 'salatik' );
	$newColumns[ 'time' ] 			= esc_html__( 'Время готовки', 'salatik' );
	$newColumns[ 'author' ] 	    = esc_html__( 'Автор', 'salatik' );
    $newColumns[ 'date' ] 	        = esc_html__( 'Дата', 'salatik' ); 

    return $newColumns;
}

// Custom post type columns
function recipe_custom_column( $column, $post_id ) {
	$content = get_the_content();
    switch( $column ) {
        case 'title' : 
            the_title(); 
            break;

        case 'thumbnail' : 
            the_post_thumbnail( 'thumbnail' ); 
            break;
        
        case 'editor' :
            echo mb_strimwidth($content, 0, 80, '...'); 
            break;

        case 'category' :
            the_category();  
            break;

		case 'ingredients' :
			echo get_post_meta( $post_id, 'ingredients', true); 
			break;

		case 'calories' :
			echo get_post_meta( $post_id, 'calories', true); 
			break;

		case 'time' :
			echo get_post_meta( $post_id, 'time', true); 
			break;
			
		case 'author' :
			the_author();  
			break;

        case 'date' : 
            echo get_post_datetime();
            break;
    }
}

// Ingredients Metabox Input
function recipe_ingredients_meta_box( $post ) {
	wp_nonce_field( 'recipe_ingredients_save_data','recipe_ingredients_meta_box_nonce' );   

	$value = get_post_meta( $post->ID, 'ingredients', true ); 

	echo '<input type="text" id="recipe_ingredients_value_key_field" name="recipe_ingredients_field" value="'.esc_attr( $value ).'" style = "width:100%"/>';  
}

// Ingredients Save Data
function recipe_ingredients_save_data( $post_id ){

	if( ! isset( $_POST['recipe_ingredients_meta_box_nonce'] ) ){
		return;
	}
	if( ! wp_verify_nonce( $_POST['recipe_ingredients_meta_box_nonce'], 'recipe_ingredients_save_data') ){
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	if( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if( ! isset( $_POST['recipe_ingredients_field'] ) ){
		return;
	}

	$my_data = sanitize_text_field( $_POST['recipe_ingredients_field'] );
	update_post_meta( $post_id, 'ingredients', $my_data );
}

add_action( 'save_post', 'recipe_ingredients_save_data');

// Calories Metabox Input 
function recipe_calories_meta_box( $post ) {
	wp_nonce_field( 'recipe_calories_save_data','recipe_calories_meta_box_nonce' );   

	$value = get_post_meta( $post->ID, 'calories', true ); 

	echo '<input type="text" id="recipe_calories_value_key_field" name="recipe_calories_field" value="'.esc_attr( $value ).'" style = "width:100%"/>';  
}

// Calories Save Data
function recipe_calories_save_data( $post_id ){

	if( ! isset( $_POST['recipe_calories_meta_box_nonce'] ) ){
		return;
	}
	if( ! wp_verify_nonce( $_POST['recipe_calories_meta_box_nonce'], 'recipe_calories_save_data') ){
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	if( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if( ! isset( $_POST['recipe_calories_field'] ) ){
		return;
	}

	$my_data = sanitize_text_field( $_POST['recipe_calories_field'] );
	update_post_meta( $post_id, 'calories', $my_data );
}

add_action( 'save_post', 'recipe_calories_save_data');

// Time Metabox Input 
function recipe_time_meta_box( $post ) {
	wp_nonce_field( 'recipe_time_save_data','recipe_time_meta_box_nonce' );   

	$value = get_post_meta( $post->ID, 'time', true ); 

	echo '<input type="text" id="recipe_time_value_key_field" name="recipe_time_field" value="'.esc_attr( $value ).'" style = "width:100%"/>';  
}

// Time Save Data
function recipe_time_save_data( $post_id ){

	if( ! isset( $_POST['recipe_time_meta_box_nonce'] ) ){
		return;
	}
	if( ! wp_verify_nonce( $_POST['recipe_time_meta_box_nonce'], 'recipe_time_save_data') ){
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	if( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	if( ! isset( $_POST['recipe_time_field'] ) ){
		return;
	}

	$my_data = sanitize_text_field( $_POST['recipe_time_field'] );
	update_post_meta( $post_id, 'time', $my_data );
}

add_action( 'save_post', 'recipe_time_save_data');

// Delete Deleted Post's Attachments
add_action( 'before_delete_post', 'salatik_delete_all_attached_media' );

function salatik_delete_all_attached_media( $post_id ) {

  if( get_post_type($post_id) == "recipe" ) {
    $attachments = get_attached_media( '', $post_id );

    foreach ($attachments as $attachment) {
      wp_delete_attachment( $attachment->ID, 'true' );
    }
  }

}