<?php
/**
 * =====================
 *  LOGIN PAGE SETTINGS
 * ======================
 *
 * @package salatik
 */

add_shortcode('login_form', 'salatik_login_fields' );

function salatik_login_fields() {
    ob_start(); ?>

    <form id="log-form" class="form-reg form-log" action="" method="POST">
        <h3 class="form-reg__title form-log__title"><?php esc_html_e('Вход', 'salatik'); ?></h3>
        <?php
            salatik_login_display_errors();
        ?>
        <div class="form-reg__subtitle form-log__subtitle"><?php esc_html_e('Логин', 'salatik'); ?></div>
        <input type="text" class="form-reg__input" id="form-log__login" name="form-log__login" placeholder="<?php esc_html_e('Введите ваш пароль', 'salatik'); ?>" required autocomplete="off">
        <div class="form-reg__subtitle form-log__subtitle"><?php esc_html_e('Пароль', 'salatik'); ?></div>
        <input type="password" class="form-reg__input" id="form-log__password" name="form-log__password" placeholder="<?php esc_html_e('Введите пароль', 'salatik'); ?>" required autocomplete="on">
        <div class="checkbox form-log__checkbox">
            <input type="checkbox" id="form-log__checkbox" name="form-log__checkbox">
            <span><?php esc_html_e('Запомнить меня', 'salatik'); ?></span>
        </div>
        <button type="submit" id="form-reg__btn" class="form-reg__btn"><?php esc_html_e('Вход', 'salatik'); ?></button>
        <a class="form-reg__log form-log__reg" href="#"><?php esc_html_e('Регистрация', 'salatik'); ?></a>
        <div class="form-reg__text form-log__text">
            <span><?php esc_html_e('Или', 'salatik'); ?></span>
        </div>
        <div class="form-reg__socials socials-reg form-log__socials">
        <?php 
            $socials = Kirki::get_option( 'salatik_footer', 'my_repeater_setting');
            foreach( $socials as $social ) :
                if (isset($social['link_socials'])) :
                    switch ($social['link_socials']) {
                        case 'Facebook': ?>
                            <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/facebook.svg'; ?>" alt="facebook icon">
                            </a>
                        <?php
                        break;
                        
                        case 'Instagram': ?>
                        <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/instagram.svg'; ?>" alt="instagram icon">
                        </a>
                        <?php
                        break;

                        case 'Google Plus': ?>
                        <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/google-plus.svg'; ?>" alt="google-plus icon">
                        </a>
                        <?php
                        break;

                        case 'WhatsUp': ?>
                        <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/whatsapp.svg'; ?>" alt="whatsup icon">
                        </a>
                        <?php
                        break;

                        case 'Viber': ?>
                        <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/viber.svg'; ?>" alt="viber icon">
                        </a>
                        <?php
                        break;

                        case 'Vkontakte': ?>
                        <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/vk.svg'; ?>" alt="telegram icon">
                        </a>
                        <?php
                        break;

                        case 'Odnoklassniki': ?>
                        <a href="<?php echo $social['link_url']; ?>" class="socials-reg__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/odnoklassniki.svg'; ?>" alt="odnoklassniki icon">
                        </a>
                        <?php
                        break;
                    } 
                endif;
            endforeach; ?>
        </div>
        <div class="form-log__remind">
            <a href="#popup" class="popup-link"><?php esc_html_e('Забыли пароль?', 'salatik'); ?></a>
        </div>
    </form>
    <?php
    return ob_get_clean();
}

add_action('template_redirect', 'salatik_login');

function salatik_login() {
    if( is_page('login') && !(is_user_logged_in()) && isset($_POST['form-log__login']) && isset($_POST['form-log__password'])) {
        $user_login = esc_sql($_POST['form-log__login']);
        $user_password = esc_sql($_POST['form-log__password']);
        $remember = isset($_POST['form-log__checkbox']) ? true : false;

        $user_info = array(
            'user_login'    => $user_login,
            'user_password' => $user_password,
            'remember'      => $remember,
        );

        $user_auth = wp_authenticate($user_login, $user_password);
        
        if(is_wp_error($user_auth) ) {
            salatik_login_errors()->add('auth_failed', __('Неверные данные пользователя', 'salatik'));
        } else {
            wp_signon( $user_info, false );
            wp_redirect( home_url() );
            exit;
        }
    }
}
add_action('init', 'salatik_login' );
add_action('wp_logout', 'salatik_logout_redirection' );

// Redirection After Logout
function salatik_logout_redirection() {
    wp_redirect( home_url('login') );
    exit;
}

function salatik_login_errors() {
    static $login_errors;
    return isset($login_errors) ? $login_errors : ($login_errors = new WP_Error(null, null, null));
}

// Display error messages
function salatik_login_display_errors(){
    if($codes = salatik_login_errors()->get_error_codes() ){
        echo '<div class="error__container">';
        // loop error codes and display errors
        foreach ($codes as $code) {
            $message = salatik_login_errors()->get_error_message($code);
            echo '<p class="error">'.$message.'</p><br>';
        }
        echo '</div>';
    } 
}