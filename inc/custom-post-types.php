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
		// 'publicly_queryable'  	=> null, 							
	    'exclude_from_search'		=> false, 							
		// 'show_ui'             	=> null, 							
		// 'show_in_nav_menus'  	=> null, 							
		'show_in_menu'       		=> null, 							
		// 'show_in_admin_bar'  	=> null, 						
		'show_in_rest'        		=> null, 							
		//'rest_base'           	=> null, 							
		'menu_position'       		=> 7,						
		'menu_icon'          		=> 'dashicons-products', 				
		//'capability_type'   		=> 'post',
		//'capabilities'      		=> 'post', 						
		//'map_meta_cap'      		=> null, 						
		'hierarchical'        		=> false,
		'supports'            		=> [ 'title', 'editor', 'author', 'thumbnail', 'comments' ],  // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          		=> ['category'],
		'has_archive'         		=> true,
		'rewrite'             		=> true,
		'query_var'           		=> true,
	] );
}



// Set custom post type columns
function set_recipe_columns( $columns ){
    /* Убрать колонку */
    // unset ( $columns['tags'] );  // Убрать колонку ($column_name - название колонки) из админки кастомного поста (записи)
    // return $columns;
    // Columns
    $newColumns = array();
    $newColumns[ 'title' ] 	        = esc_html__( 'Название', 'salatik' ); 
    $newColumns[ 'thumbnail' ] 	    = esc_html__( 'Изображение', 'salatik' ); 
    $newColumns[ 'editor' ] 	    = esc_html__( 'Описание', 'salatik' ); 
	$newColumns[ 'category' ] 	    = esc_html__( 'Рубрики', 'salatik' ); 
	$newColumns[ 'author' ] 	    = esc_html__( 'Автор', 'salatik' );
    $newColumns[ 'date' ] 	        = esc_html__( 'Дата', 'salatik' ); 

    return $newColumns;
}

// Custom post type columns
function recipe_custom_column( $column, $post_id ) {
    switch( $column ) {
        case 'title' : 
            the_title(); 
            break;

        case 'thumbnail' : 
            the_post_thumbnail( 'thumbnail' ); 
            break;
        
        case 'editor' :
            the_content();  
            break;

        case 'category' :
            the_category();  
            break;
			
		case 'author' :
			the_author();  
			break;

        case 'date' : 
            echo get_post_datetime();
            break;
    }
}