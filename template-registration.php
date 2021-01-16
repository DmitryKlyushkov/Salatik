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
        <!-- <form action="" class="form-reg">
            <h3 class="form-reg__title">Зарегистрируйся и делись своими лучшими рецептами</h3>
            <div class="form-reg__subtitle">Логин</div>
            <input type="text" class="form-reg__input" id="form-reg__login" name="form-reg__login" placeholder="Никнейм или логин" required autocomplete="off">
            <div class="form-reg__subtitle">Электронная почта</div>
            <input type="email" class="form-reg__input"id="form-reg__email" name="form-reg__email" placeholder="email@example.com" required autocomplete="off">
            <div class="form-reg__subtitle">Имя</div>
            <input type="text" class="form-reg__input" id="form-reg__name" name="form-reg__name" placeholder="Укажите Ваше реальное имя" required autocomplete="off">
            <div class="form-reg__subtitle">Пароль</div>
            <input type="password" class="form-reg__input" id="form-reg__password" name="form-reg__password" placeholder="Не менее 8 символов" required autocomplete="on">
            <input type="password" class="form-reg__input" id="form-reg__password_re" name="form-reg__password_re" placeholder="Повторите пароль" required autocomplete="on">
            <div class="form-reg__captcha">
                <span>Капча</span>
            </div>
            <button type="submit" id="form-reg__btn" class="form-reg__btn">Создать аккаунт</button>
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
        </form> -->
    </div>
</main>

<?php get_footer(); ?>