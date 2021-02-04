<?php
/**
 * ======================
 *  PROFILE PAGE TEMPLATE
 * ======================
 * 
 * Template Name: Профиль
 * 
 * @package salatik
 */

if ( !(is_user_logged_in() ) ) {
    wp_redirect( home_url('/login') );
    exit;
}
// global $wpdb;
// global $post;
$user_id = get_current_user_id();

// Comment Count By User
$comment_count = $wpdb->get_var('
             SELECT COUNT(comment_ID) 
             FROM ' . $wpdb->comments. ' 
             WHERE user_id = "' . $user_id . '"');

// Rate Count By User
$rate_count = get_user_meta( $user_id, 'rate_count', true );

// Posts Count By User
$comment_counter_args = array(
    'post_type'         => 'recipe',
    'post_status'       => 'publish',
    'posts_per_page'    => -1,
    'author'            => $user_id
);
$current_user_posts = get_posts( $comment_counter_args );
$total = count($current_user_posts);

$nickname = get_the_author_meta( 'user_login', $user_id);
$firstName = get_the_author_meta( 'user_firstname', $user_id);
$lastName = get_the_author_meta( 'user_lastname', $user_id);
$email = get_the_author_meta( 'user_email', $user_id);



switch(get_the_author_meta('user_level', $user_id )) {
    case 10:
        $status = esc_html__('Админ', 'salatik');
        break;
    case 5:
        $status =  esc_html__('Редактор', 'salatik');
        break;
    case 2:
        $status =  esc_html__('Автор', 'salatik');
        break;
    case 1:
        $status =  esc_html__('Участник', 'salatik');
        break;
    case 0:
        $status =  esc_html__('Подписчик', 'salatik');
        break;
};


?>

<?php get_header(); ?>

    <main class="main">
        <div class="main__container">
            <div class="main-content">
                <section class="profile">
                    <div class="profile__content">
                        <div class="profile__header">
                            <div class="profile__row">
                                <div class="profile__column">
                                    <div class="profile__row">
                                        <div class="profile__column profile__column--avatar">
                                            <div class="profile__avatar"></div>
                                            <label for="profile__download"><?php esc_html_e('Загрузить', 'salatik'); ?></label>
                                            <input type="file" accept=".jpg, .png, .gif, webp" class="formImage profile__download" id="profile__download">
                                        </div>
                                        <div class="profile__column profile__column--desc">
                                            <div class="profile__username">
                                                <span><?php echo $nickname ?></span>
                                            </div>
                                            <div class="profile__name">
                                                <span><?php echo $firstName ?>&nbsp;<?php echo $lastName?></span>
                                            </div>
                                            <div class="profile__email">
                                                <span><?php echo $email ?></span>
                                            </div>
                                            <div class="profile__status">
                                                <span><?php esc_html_e('Статус:', 'salatik'); ?></span>
                                                <span><?php echo $status ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__column">
                                    <div class="profile__logout">
                                        <a href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e('Выйти:', 'salatik'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile__panel panel-profile">
                            <div class="panel-profile__unit">
                                <span><?php echo $total ?></span>
                                <span><?php esc_html_e('Рецептов добавлено', 'salatik'); ?></span>
                            </div>
                            <div class="panel-profile__unit">
                                <span><?php echo $comment_count ?></span>
                                <span><?php esc_html_e('Комментариев', 'salatik'); ?></span>
                            </div>
                            <div class="panel-profile__unit">
                                <span>10</span>
                                <span><?php esc_html_e('Оценок', 'salatik'); ?></span>
                            </div>
                        </div>
                        <div class="profile__recepies recepies-profile">
                            <?php echo do_shortcode( '[profile_form]' ); ?>
                        </div>
                    </div>
                </section>
                <section class="bookmarks">
                    <div class="similars__container">
                        <h4 class="similars__title">Закладки</h4>
                        <div class="similars__content">
                            <div class="similars__row">
                                <?php
                                    $user_id = get_current_user_id();
                                    $favorites = get_user_meta( $user_id, 'wfm_favorites' );
                                    $args = array(
                                        'post__in'  => $favorites,
                                        'post_type' => 'recipe',
                                    );
                                    if (empty($favorites)) {
                                        $args['post_type'] = '';
                                    }
                                    $query = new WP_Query( $args );
                                    if ( $query->have_posts() ) :
                                        while ( $query->have_posts() ) : $query->the_post();
                                            get_template_part('template-parts/content/content-favorites', get_post_format());
                                        endwhile;
                                     endif;
                                     wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="aside__container">
				<?php get_sidebar(); ?>
            </div>
            
        </div>
    </main>

<?php get_footer(); ?>