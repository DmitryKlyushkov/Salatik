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
                        <div class="footer__logo"><?php echo bloginfo('name'); ?></div>
                        <div class="footer__text"><?php echo bloginfo('description'); ?></div>
                    </div>
                    <div class="footer__column">
                        <div class="footer__title"><?php esc_html_e('Подписывайтесь на обновления и получайте новые рецепты каждый день!', 'salatik'); ?></div>
                        <form action="" id="footer-form" class="footer__form">
                            <input type="email" class="footer__email" name="footer-email" placeholder="<?php esc_html_e('Введите ваш e-mail', 'salatik'); ?>">
                            <button type="submit" class="footer__btn"><?php esc_html_e('Подписаться', 'salatik'); ?></button>
                            <div class="checkbox">
                                <input type="checkbox" name="footer-checkbox" class="footer__checkbox">
                                <span><?php esc_html_e('Согласие на обработку персональных данных', 'salatik'); ?></span>
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
                            <?php $socials_title = Kirki::get_option( 'salatik_footer', 'text_setting');  ?>
                            <div class="socials-footer__title"><?php echo $socials_title ?></div>
                            <div class="socials-footer__icons">
                                <?php 
                                $socials = Kirki::get_option( 'salatik_footer', 'my_repeater_setting');
                                foreach( $socials as $social ) :
                                    if (isset($social['link_socials'])) :
                                        switch ($social['link_socials']) {
                                            case 'Facebook': ?>
                                                <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/facebook.svg'; ?>" alt="facebook icon">
                                                </a>
                                            <?php
                                            break;
                                            
                                            case 'Instagram': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/instagram.svg'; ?>" alt="instagram icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Google Plus': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/google-plus.svg'; ?>" alt="google-plus icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'WhatsUp': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/whatsapp.svg'; ?>" alt="whatsup icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Viber': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/viber.svg'; ?>" alt="viber icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Vkontakte': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/vk.svg'; ?>" alt="telegram icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Odnoklassniki': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/odnoklassniki.svg'; ?>" alt="odnoklassniki icon">
                                            </a>
                                            <?php
                                            break;
                                        } 
                                    endif;
                                endforeach; ?>
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
                                <?php echo Kirki::get_option( 'salatik_copyrights', 'text_setting'); ?>
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