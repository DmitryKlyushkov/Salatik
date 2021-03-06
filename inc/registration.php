<?php
/**
 * ============================
 *  REGISTRATION PAGE SETTINGS
 * ============================
 *
 * @package salatik
 */

add_shortcode('register_form', 'salatik_registration_fields' );

function salatik_registration_fields() {
    ob_start(); ?>

    <form id="reg-form" class="form-reg" action="" method="POST">
    	<h3 class="form-reg__title">Зарегистрируйся и делись своими лучшими рецептами</h3>
    	<?php
            salatik_display_errors();
        ?>
        <label for="user_login" class="form-reg__subtitle">Логин</label>
        <input type="text" class="form-reg__input"  name="user_login" id="user_login" placeholder="<?php _e( 'Никнейм или логин', 'wp-recall' ); ?>" required autocomplete="off">
        
        <label for="user_email" class="form-reg__subtitle">Электронная почта</label>
        <input type="email" class="form-reg__input" name="user_email" id="user_email" placeholder="<?php _e( 'email@example.com', 'wp-recall' ); ?>"  required autocomplete="off">
        
        <label for="user_name" class="form-reg__subtitle">Имя</label>
        <input type="text" class="form-reg__input" id="user_name" name="user_name" placeholder="<?php _e( 'Укажите Ваше реальное имя', 'wp-recall' ); ?>" required autocomplete="off">
        
        <label for="user_name" class="form-reg__subtitle">Информация о себе</label>
        <input type="text" class="form-reg__input" id="user_bio" name="user_bio" placeholder="<?php _e( 'Укажите информацию о себе', 'wp-recall' ); ?>" required autocomplete="off">

        <label for="user_password" class="form-reg__subtitle">Пароль</label>
        <input type="password" class="form-reg__input" id="user_password" name="user_password" placeholder="Не менее 8 символов" required autocomplete="on">
        <input type="password" class="form-reg__input" id="user_password_re" name="user_password_re" placeholder="Повторите пароль" required autocomplete="on">
            <div class="form-reg__captcha">
                <span>Капча</span>
            </div>
        <input type="hidden" name="salatik_csrf" value="<?php echo wp_create_nonce('salatik-csrf'); ?>" />
        <input type="submit" id="form-reg__btn" class="form-reg__btn" value="<?php _e('Создать аккаунт', 'salatik'); ?>"/>
        <a class="form-reg__log" href="#">Войти</a>
        <div class="form-reg__text">
            <span>Или</span>
        </div>
        <div class="form-reg__socials socials-reg">
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
        </div>
    </form>

    <?php
    return ob_get_clean();
}

// Register New User
function salatik_add_new_user() {
    if (isset( $_POST['user_login']) && wp_verify_nonce($_POST['salatik_csrf'], 'salatik-csrf')) {
    	
    	// Input Variables
        $user_login 	= $_POST['user_login'];
        $user_email 	= $_POST['user_email'];
        $user_name 	    = $_POST['user_name'];
        $user_bio       = $_POST['user_bio'];
        $user_password  = $_POST['user_password'];
        $user_password_re  = $_POST['user_password_re'];
	
	require_once ABSPATH . WPINC . '/user.php';
        // Login Validation
        if(username_exists($user_login)) {
            salatik_errors()->add('username_exists', __('* Этот логин занят', 'salatik'));
        }
        // Email Validation
        if(email_exists($user_email)) {
            salatik_errors()->add('email_exists', __('* Эта электронная почта уже занята', 'salatik'));
        }
        // Password Validation
        if($user_password !== $user_password_re) {
            salatik_errors()->add('password_match', __('* Пароли не совпадают', 'salatik'));
        }

        $errors = salatik_errors()->get_error_messages();
        if(empty($errors)) {
		// User Data
	        $user_data = array(
	            'user_login'        	=> $user_login,
	            'user_pass'         	=> $user_password,
	            'user_email'        	=> $user_email,
	            'user_nicename'  	    => $user_login,
	            'display_name'      	=> $user_login,
	            'nickname'          	=> $user_login,
	            'first_name'        	=> $user_name,
	            'last_name'         	=> '',
	            'description'       	=> $user_bio,
	            'rich_editing'     	    => 'true', 
	            'user_registered'   	=> date('Y-m-d H:i:s'),
	            'role'              	=> 'subscriber',
	        );
	        
	        $new_user_id = wp_insert_user($user_data);
		    // add_user_meta( $user_id, $meta_key, $meta_value, $unique );
		
	        if($new_user_id) {
	            // Send an email to the admin
	            wp_new_user_notification( $new_user_id );	
	
	            // Log the user in
	            
	            //wp_set_auth_cookie( $new_user_id, true );
	            //wp_set_current_user($new_user_id, $user_login);
	            //do_action('wp_login', $user_login);
	
	            wp_redirect(home_url()); exit;	
	        }
	  }
    }
}
add_action('init', 'salatik_add_new_user' );

function salatik_errors() {
    static $wp_error;
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// Display error messages
function salatik_display_errors(){
    if($codes = salatik_errors()->get_error_codes()){
        echo '<div class="error__container">';		
        // loop error codes and display errors
        foreach ($codes as $code) {
            $message = salatik_errors()->get_error_message($code);
            echo '<p class="error">'.$message.'</p><br>';
        }
        echo '</div>';
    } else {
        echo '<div class="error__container">';		
        echo '<p class="success">'.__("Аккаунт создан", "salatik").'</p>';
        echo '</div>';
    }
}
