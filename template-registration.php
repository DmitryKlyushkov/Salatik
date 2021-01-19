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
        <picture><source srcset="img/reg-login/registration.webp" type="image/webp"><img src="img/reg-login/registration.png" alt=""></picture>
    </div>
    <div class="reg__form">

        <?php echo do_shortcode('[register_form]'); ?>
        
    </div>
</main>

<?php get_footer(); ?>