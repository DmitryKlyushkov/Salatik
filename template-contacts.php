<?php
/**
 * ======================
 *  CONTACTS PAGE TEMPLATE
 * ======================
 * 
 * Template Name: Контакты
 * 
 * @package salatik
 */
?>
<?php
/**
 * ========================
 *  THE MAIN TEMPLATE FILE
 * ========================
 *
 * @package salatik
 */

 $title =  Kirki::get_option( 'salatik_contacts', 'text_setting' );
 $desc=  Kirki::get_option( 'salatik_contacts_2', 'text_setting' );
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

    <main class="main">
        <div class="main__container">
            <div class="main-content">
                <section class="category contacts__header">
                    <div class="category__content">
                        <h2 class="category__title"><?php echo $title ?></h2>
                        <div class="category__text"><?php echo $desc ?></div>
                    </div>
                </section>
                <section class="contacts">
                    <div class="contacts__content recepies-profile">
                        <form action="" class="contacts__form form-contacts">
                            <h4 class="form-contacts__title recepies-profile__subtitle"><?php esc_html_e('Остались вопросы?', 'salatik'); ?></h4>
                            <div class="form-contacts__subtitle"><?php esc_html_e('Тема сообщения', 'salatik'); ?></div>
                            <div class="form-contacts__select recepies-profile__select">
                                <div class="form-contacts__placeholder recepies-profile__placeholder"><?php esc_html_e('Выберите тему', 'salatik'); ?></div>
                                <i class="icon-arrow"></i>
                                <select  name="recepies-profile__select">
                                    <option value="Салаты"><?php esc_html_e('Салаты', 'salatik'); ?></option>
                                    <option value="Бутерброды"><?php esc_html_e('Бутерброды', 'salatik'); ?></option>
                                    <option value="Канапе"><?php esc_html_e('Канапе', 'salatik'); ?></option>
                                    <option value="Гренки"><?php esc_html_e('Гренки', 'salatik'); ?></option>
                                    <option value="Тосты"><?php esc_html_e('Тосты', 'salatik'); ?></option>
                                    <option value="Тартинки"><?php esc_html_e('Тортинки', 'salatik'); ?></option>
                                    <option value="Закуски"><?php esc_html_e('Закуски', 'salatik'); ?></option>
                                    <option value="Заправки"><?php esc_html_e('Заправки', 'salatik'); ?></option>
                                </select>
                            </div>
                            <input type="text" class="form-contacts__name recepies-profile__name" name="form-contacts__name" placeholder="<?php esc_html_e('Ваше имя', 'salatik'); ?>">
                            <input type="text" class="form-contacts__email recepies-profile__name" name="form-contacts__email" placeholder="<?php esc_html_e('Введите ваш емэйл', 'salatik'); ?>">
                            <textarea class="form-contacts__text recepies-profile__text" name="form-contacts__text" placeholder="<?php esc_html_e('Введите текст сообщения', 'salatik'); ?>"></textarea>
                            <div class="form-contacts__btn recepies-profile__btn">
                                <button type="submit"><?php esc_html_e('Отправить', 'salatik'); ?></button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <?php get_sidebar(); ?>   
        </div>
    </main>
      
    </div>

<?php get_footer(); ?>