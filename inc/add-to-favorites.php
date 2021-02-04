<?php
/**
 * ==================
 *  ADD TO FAVORITES
 * ==================
 * @package salatik
 */

add_shortcode('favorites', 'salatik_favorites_add' );

function salatik_favorites_add() {
	global $post;
	if( wfm_is_favorites($post->ID) ){
		return '<a href="#" data-action="del" class="main-panel__savetext">Удалить</a>';
	}
	return '<i class="icon-heart"></i>
		<a href="#" data-action="add" class="main-panel__savetext">В закладки</a>';
	
}