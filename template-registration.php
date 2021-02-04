<?php
/**
 * ======================
 *  REGISTRATION PAGE TEMPLATE
 * ======================
 * 
 * Template Name: Регистрация
 * 
 * @package salatik
 */
?>

<?php get_header(); ?>

<main class="reg">
    <div class="reg__bg">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/reg-login/registration.webp'; ?>" alt="изображение салата с рыбой и рисом">
    </div>
    <div class="reg__form">

        <?php echo do_shortcode('[register_form]'); ?>
        
    </div>
</main>

<?php get_footer(); ?>