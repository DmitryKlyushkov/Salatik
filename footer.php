<?php
/**
 * =================
 *  FOOTER TEMPLATE
 * =================
 *
 * @package salatik
 */
?>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__row">
                    <div class="footer__column">
                        <div class="footer__logo">salatik</div>
                        <div class="footer__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum et malesuada fames ac ante ipsum primis in</div>
                    </div>
                    <div class="footer__column">
                        <div class="footer__title">Подписывайтесь на обновления и получайте новые рецепты каждый день!</div>
                        <form action="" id="footer-form" class="footer__form">
                            <input type="email" class="footer__email" name="footer-email" placeholder="Введите ваш e-mail">
                            <button type="submit" class="footer__btn">Подписаться</button>
                            <div class="checkbox">
                                <input type="checkbox" name="footer-checkbox" class="footer__checkbox">
                                <span>Согласие на обработку персональных данных</span>
                            </div>
                        </form>
                    </div>
                    <div class="footer__column">
                        <?php wp_nav_menu( [
                            'theme_location'  	    => 'footer',
                            'menu'            		=> 'footer', 
                            'container'       		=>  false,
                            'menu_class'      	    => 'footer__nav', 
                            'echo'            		=> true,
                            'items_wrap'      	    => '<ul class="%2$s">%3$s</ul>',
                            'depth'           		=> 0,
                        ] );?>
                        <div class="footer__socials socials-footer">
                            <div class="socials-footer__title">Мы в социальных сетях</div>
                            <div class="socials-footer__icons">
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/vk.svg" type="image/webp"><img src="img/socials/vk.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/facebook.svg" type="image/webp"><img src="img/socials/facebook.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/instagram.svg" type="image/webp"><img src="img/socials/instagram.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/google-plus.svg" type="image/webp"><img src="img/socials/google-plus.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/whatsapp.svg" type="image/webp"><img src="img/socials/whatsapp.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/viber.svg" type="image/webp"><img src="img/socials/viber.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/telegram.svg" type="image/webp"><img src="img/socials/telegram.svg" alt=""></picture>
                                </a>
                                <a href="#" class="socials-footer__icon">
                                    <picture><source srcset="img/socials/odnoklassniki.svg" type="image/webp"><img src="img/socials/odnoklassniki.svg" alt=""></picture>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copyrights-container">
                <div class="footer__copyrights copyrights">
                    <div class="copyrights__row">
                        <div class="copyrights__column">
                            <div class="copyrights__rights">
                                2019 SALATIK - All Rights Reserved
                            </div>
                        </div>
                        <div class="copyrights__column">
                            <div class="copyrights__btn">Счетчик</div>
                            <div class="copyrights__btn">Счетчик</div>
                            <div class="copyrights__btn">Счетчик</div>
                            <div class="copyrights__btn">Счетчик</div>
                        </div>
                    </div>
                </div>
            </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>