<?php
/**
 * ============================
 *  REGISTRATION PAGE SETTINGS
 * ============================
 *
 * @package theme_name
 */

add_shortcode('register_form', 'theme_name_registration_fields' );

function theme_name_registration_fields() {
    ob_start(); ?>

    <form id="reg-form" class="form-reg" action="" method="POST">
    	<h3 class="form-reg__title">Зарегистрируйся и делись своими лучшими рецептами</h3>
    	<?php
            theme_name_display_errors();
        ?>
        <label for="user_login" class="form-reg__subtitle">Логин</label>
        <input type="text" class="form-reg__input"  name="user_login" id="user_login" placeholder="<?php _e( 'Никнейм или логин', 'wp-recall' ); ?>" required autocomplete="off">
        
        <label for="user_email" class="form-reg__subtitle">Электронная почта</label>
        <input type="email" class="form-reg__input" name="user_email" id="user_email" placeholder="<?php _e( 'email@example.com', 'wp-recall' ); ?>"  required autocomplete="off">
        
        <label for="user_name" class="form-reg__subtitle">Имя</label>
        <input type="text" class="form-reg__input" id="user_name" name="user_name" placeholder="<?php _e( 'Укажите Ваше реальное имя', 'wp-recall' ); ?>" required autocomplete="off">
        
        <label for="user_password" class="form-reg__subtitle">Пароль</label>
        <input type="password" class="form-reg__input" id="user_password" name="user_password" placeholder="Не менее 8 символов" required autocomplete="on">
        <input type="password" class="form-reg__input" id="user_password_re" name="user_password_re" placeholder="Повторите пароль" required autocomplete="on">
            <div class="form-reg__captcha">
                <span>Капча</span>
            </div>
        <input type="hidden" name="theme_name_csrf" value="<?php echo wp_create_nonce('theme_name-csrf'); ?>" />
        <input type="submit" id="form-reg__btn" class="form-reg__btn" value="<?php _e('Создать аккаунт', 'theme_name'); ?>"/>
        <a class="form-reg__log" href="#">Войти</a>
        <div class="form-reg__text">
            <span>Или</span>
        </div>
        <div class="form-reg__socials socials-reg">
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
        </div>
    </form>

    <?php
    return ob_get_clean();
}

// Register New User
function theme_name_add_new_user() {
    if (isset( $_POST['user_login']) && wp_verify_nonce($_POST['theme_name_csrf'], 'theme_name-csrf')) {
    	
    	// Input Variables
        $user_login 	= $_POST['user_login'];
        $user_email 	= $_POST['user_email'];
        $user_name 	    = $_POST['user_name'];
        $user_password  = $_POST['user_password'];
        $user_password_re  = $_POST['user_password_re'];
	
	require_once ABSPATH . WPINC . '/user.php';
        // Login Validation
        if(username_exists($user_login)) {
            theme_name_errors()->add('username_exists', __('* Этот логин занят', 'theme_name'));
        }
        // Email Validation
        if(email_exists($user_email)) {
            theme_name_errors()->add('email_exists', __('* Эта электронная почта уже занята', 'theme_name'));
        }
        // Password Validation
        if($user_password !== $user_password_re) {
            theme_name_errors()->add('password_match', __('* Пароли не совпадают', 'theme_name'));
        }

        $errors = theme_name_errors()->get_error_messages();
        if(empty($errors)) {
		// User Data
	        $user_data = array(
	            'user_login'        	=> $user_login,
	            'user_pass'         	=> $user_password,
	            'user_email'        	=> $user_email,
	            'user_nicename'  	    => $user_login,
	            'display_name'      	=> $user_login,
	            'nickname'          	=> $user_login,
	            'first_name'        	=> '',
	            'last_name'         	=> '',
	            'description'       	=> '',
	            'rich_editing'     	    => 'true', 
	            'user_registered'   	=> date('Y-m-d H:i:s'),
	            'role'              	=> 'subscriber',
	        );
	        
	        $new_user_id = wp_insert_user($user_data);
		    // add_user_meta( $user_id, $meta_key, $meta_value, $unique );	// кастомные метаданные
		
	        if($new_user_id) {
	            // Send an email to the admin
	            wp_new_user_notification( $new_user_id );	// при успешном создании пользователя - оповещает админа
	
	            // Log the user in
	            
	            //wp_set_auth_cookie( $new_user_id, true );
	            //wp_set_current_user($new_user_id, $user_login);
	            //do_action('wp_login', $user_login);
	
	            wp_redirect(home_url()); exit;		// при успешном создании пользователя - перенаправляет на главную страницу
	        }
	  }
    }
}
add_action('init', 'theme_name_add_new_user' );

function theme_name_errors() {
    static $wp_error;
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// Display error messages
function theme_name_display_errors(){
    if($codes = theme_name_errors()->get_error_codes()){
        echo '<div class="error__container">';		// Вывод контейнера с ошибками 
        // loop error codes and display errors
        foreach ($codes as $code) {
            $message = theme_name_errors()->get_error_message($code);
            echo '<p class="error">'.$message.'</p><br>';
        }
        echo '</div>';
    } else {
        echo '<div class="error__container">';		// Если ошибок нет, то выводится этот контейнер
        echo '<p class="success">'.__("Аккаунт создан", "theme_name").'</p>';
        echo '</div>';
    }
}
