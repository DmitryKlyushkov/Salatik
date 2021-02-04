<?php
/**
 * ======================
 *  LOGIN PAGE TEMPLATE
 * ======================
 * 
 * Template Name: Логин
 * 
 * @package salatik
 */

if(is_user_logged_in()){
    wp_redirect(home_url()); exit;		// Если юзер залогинен - перенаправляет его на главную траницу
}
get_header(); ?>

<main class="reg log">
            <div class="reg__bg log__bg">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/reg-login/login.webp'; ?>" alt="картинка салата">
            </div>
            <div class="log__form">

                <?php echo do_shortcode( '[login_form]' ); ?>

            </div>
        </main>
        
        <?php echo do_shortcode( '[lost_password_form]' ); ?>

<?php get_footer(); ?>