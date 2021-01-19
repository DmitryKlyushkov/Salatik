<?php
/**
 * ========================
 *  RATING SYSTEM SETTINGS
 * ========================
 *
 * @package salatik
 */

add_action( 'rmp_after_vote', 'salatik_after_vote', 10, 4 );

function salatik_after_vote( $post_id, $new_avg_rating, $new_vote_count, $submitted_rating ) {
    $user_id = get_current_user_id();
    $rate_count = 0;
    if( !get_user_meta( $user_id, 'rate_count', true )){
        $rate_count = 0;
        add_user_meta( $user_id, 'rate_count', $rate_count, true );
    } else {
        $rate_count = get_user_meta( $user_id, 'rate_count', true );
        $rate_count++;
        update_user_meta( $user_id, 'rate_count', $rate_count, true );
    };
}