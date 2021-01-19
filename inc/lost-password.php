<?php
/**
 * ============================
 *  LOST PASSWORD SETTINGS
 * ============================
 *
 * @package salatik
 */

add_shortcode('lost_password_form', 'salatik_lost_password_form' );

function salatik_lost_password_form() {
    ob_start(); ?>

    <div id="popup" class="popup">
        <div class="popup__body">
            <div class="popup__content">
                <a href="" class="popup__close close-popup">x</a>
                <h3 class="popup__title form-reg__title form-log__title"><?php esc_html_e('Забыли пароль?', 'salatik'); ?></h3>
                <?php salatik_lost_password_display_errors(); ?>
                <form class="popup__form lost-pass" action="" method="POST">
                    <label for="lost-pass__login" class="popup__subtitle form-reg__subtitle form-log__subtitle"><?php esc_html_e('Ваш логин', 'salatik'); ?></label>
                    <input type="text" class="form-reg__input" id="user_login" name="user_login" placeholder="<?php esc_html_e('Введите логин', 'salatik'); ?>" required="">

                    <label for="lost-pass__email" class="popup__subtitle form-reg__subtitle form-log__subtitle"><?php esc_html_e('Электронная почта', 'salatik'); ?></label>
                    <input type="email" class="form-reg__input" id="lost-pass__email" name="lost-pass__email" placeholder="<?php esc_html_e('Введите вашу электронную почту', 'salatik'); ?>" required="">
                    
                    <button type="submit" id="lost-pass__btn" class="form-reg__btn"><?php esc_html_e('Восстановить пароль', 'salatik'); ?></button>
                </form>
            </div>
        </div>
    </div>

    <?php return ob_get_clean();
}

// Lost Password
add_action('wp_ajax_salatik_lost_password', 'salatik_lost_password', 0);
add_action('wp_ajax_nopriv_salatik_lost_password', 'salatik_lost_password');
function salatik_lost_password() {
    if(isset($_POST['user_login'])) {
        $user_login = esc_sql($_POST['user_login']);

        require_once ABSPATH . WPINC . '/user.php';
        if(!email_exists( $user_login )) {
            salatik_lost_password_errors()->add('lost_pass_fail', __('Неверная электронная почта', 'salatik'));
        }

    }
}

add_action( 'init', 'salatik_lost_password' );

// Lost Password Errors
function salatik_lost_password_errors() {
    static $lost_password_errors;
    return isset($lost_password_errors) ? $lost_password_errors : ($lost_password_errors = new WP_Error(null, null, null));
}

// Display Error Messages
function salatik_lost_password_display_errors(){
    if($codes = salatik_lost_password_errors()->get_error_codes()){
        echo '<div class="error__container">';
        // loop error codes and display errors
        foreach ($codes as $code) {
            $message = salatik_lost_password_errors()->get_error_message($code);
            echo '<p class="error">'.$message.'</p><br>';
        }
        echo '</div>';
    } 
}

// Password Message
add_filter( 'retrieve_password_message', 'replace_retrieve_password_message', 10, 4 );

function replace_retrieve_password_message( $message, $key, $user_login, $user_data ) {
    // Create new message
    $msg  = __( 'Hello!', 'personalize-login' ) . "\r\n\r\n";
    $msg .= sprintf( __( 'You asked us to reset your password for your account using the email address %s.', 'personalize-login' ), $user_login ) . "\r\n\r\n";
    $msg .= __( "If this was a mistake, or you didn't ask for a password reset, just ignore this email and nothing will happen.", 'personalize-login' ) . "\r\n\r\n";
    $msg .= __( 'To reset your password, visit the following address:', 'personalize-login' ) . "\r\n\r\n";
    $msg .= site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . "\r\n\r\n";
    $msg .= __( 'Thanks!', 'personalize-login' ) . "\r\n";
 
    return $msg;
}

// Password Reset Redirection
add_action( 'login_form_rp', 'redirect_to_custom_password_reset' );
add_action( 'login_form_resetpass', 'redirect_to_custom_password_reset' );

function redirect_to_custom_password_reset() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        // Verify key / login combo
        $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( 'member-login?login=expiredkey' ) );
            } else {
                wp_redirect( home_url( 'member-login?login=invalidkey' ) );
            }
            exit;
        }
 
        $redirect_url = home_url( 'member-password-reset' );
        $redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
        $redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
 
        wp_redirect( $redirect_url );
        exit;
    }
}