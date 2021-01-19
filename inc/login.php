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
        <h3 class="form-reg__title form-log__title">Вход</h3>
        <?php
            salatik_login_display_errors();
        ?>
        <div class="form-reg__subtitle form-log__subtitle">Логин</div>
        <input type="text" class="form-reg__input" id="form-log__login" name="form-log__login" placeholder="Введите ваш логин" required autocomplete="off">
        <div class="form-reg__subtitle form-log__subtitle">Пароль</div>
        <input type="password" class="form-reg__input" id="form-log__password" name="form-log__password" placeholder="Введите пароль" required autocomplete="on">
        <div class="checkbox form-log__checkbox">
            <input type="checkbox" id="form-log__checkbox" name="form-log__checkbox">
            <span>Запомнить меня</span>
        </div>
        <button type="submit" id="form-reg__btn" class="form-reg__btn">Вход</button>
        <a class="form-reg__log form-log__reg" href="#">Регистрация</a>
        <div class="form-reg__text form-log__text">
            <span>Или</span>
        </div>
        <div class="form-reg__socials socials-reg form-log__socials">
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/vk.svg" type="image/webp"><img src="img/socials/vk.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/facebook.svg" type="image/webp"><img src="img/socials/facebook.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/instagram.svg" type="image/webp"><img src="img/socials/instagram.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/google-plus.svg" type="image/webp"><img src="img/socials/google-plus.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/whatsapp.svg" type="image/webp"><img src="img/socials/whatsapp.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/viber.svg" type="image/webp"><img src="img/socials/viber.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/telegram.svg" type="image/webp"><img src="img/socials/telegram.svg" alt=""></picture>
            </a>
            <a href="#" class="socials-reg__icon">
                <picture><source srcset="img/socials/odnoklassniki.svg" type="image/webp"><img src="img/socials/odnoklassniki.svg" alt=""></picture>
            </a>
        </div>
        <div class="form-log__remind">
            <a href="#popup" class="popup-link">Забыли пароль?</a>
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