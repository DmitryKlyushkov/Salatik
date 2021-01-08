<?php
/**
 * ===============
 *    COMMENTS
 * ===============
 *
 * @package salatik
 */

if ( post_password_required() ) {  
	return;
}
?>

<section id="comments" class="commentaries">
	<?php 
		if ( have_comments() ):
	?>
		<ul class="commentaries__comments comments">
			<?php 
				$args = array(
					'walker' 			=> null,									
					'max_depth' 		=> 2,  										
					'style' 			=> 'ul', 								
					'callback'			=> 'salatik_custom_comment_callback',		
					'end-callback'		=> 'salatik_custom_comment_end_callback',	
					'type'				=> 'all', 								
					'reply_text'		=> esc_html__( 'Ответить', 'salatik'), 		
					'page'				=> 1,										
					'per_page'			=> 5,									
					'avatar_size'		=> 50,									
					'reverse_top_level'	=> null,								               
					'reverse_children'	=> '',									
					'format'			=> 'html5',								
					'short_ping'		=> true,							
					'echo'				=> true,							
				);
				wp_list_comments( $args );
			?>
		</ul>
	<?php
		if ( !comments_open() && get_comments_number() ):
	?>
		<p class="no-comments"><?php esc_html_e( 'Комментарии отключены', 'salatik' ); ?></p>
	<?php
		endif;
	?>
	<?php
		endif;
	?>
	<?php 
		$args = array(
			'comment_field'			=> '<textarea name="comment" id="commentary" class="commentaries__textarea" placeholder="Введите текст комментария"></textarea>',	
            'id_form'				=> 'commentaries__form',
			'class_form'			=> 'commentaries__form',			
			'title_reply'			=> 'Добавить комментарий:',	
			'title_reply_before'	=> '<h4 class="commentaries__title">',	
			'title_reply_after	'	=> '</h4>',	
            'title_reply_to'		=> 'Ответить',		
            'submit_button'			=> '<button type="submit" class="commentaries__btn">отправить</button>',	
            'submit_field'			=> '<div class="commentaries__footer">
                                            <div class="commentaries__emojis">
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                                <a href="#"><div class="commentaries__emoji"></div></a>
                                            </div>
                                            %1$s %2$s
                                        </div>',			
            'cancel_reply_link'		=> 'Отменить',	
			'class_container'		=> '',	
		);
		comment_form( $args );
	?>
</section>

<?php
// Custom Comment Callback
function salatik_custom_comment_callback( $comment, $args, $depth) {
    $id = $comment->comment_ID;
    $author = get_comment_author( $id );
    $authotURL = get_comment_author_url( $id );
    $avatar = get_avatar( $id, 'gravatar_default', '', '' );
    $text =  get_comment_text( $id );
    $date = get_comment_date( 'd.m.Y', $id );
    $reply_href = wp_make_link_relative(
        get_permalink( $comment->comment_post_ID ) 
        ) 
        . '?replytocom=' . $comment->comment_ID . '#respond';

    echo '<li class="comments__comment">
    <div class="comments__row">
        <div class="comments__column">
            <a href="'.$authotURL.'">
                <div class="comments__avatar">'.$avatar.'</div>
            </a>
        </div>
        <div class="comments__column">
            <div class="comments__content">
                <div class="comments__header">
                    <div class="comments__username">
                        <span>'.$author.'</span>
                    </div>
                    <div class="comments__datetime">
                        <span>'.$date.'</span>
                    </div>
                        <a class="comments__reply" href="'.$reply_href.'" >
                            <span>Ответить</span>
                        </a>
                </div>
                <div class="comments__footer">
                    <span class="comments__text">'.$text.'</span>
                </div>
            </div>
        </div>
    </div>';
}
// Custom Comment End Callback
function salatik_custom_comment_end_callback() {
    echo '</li>';
}
