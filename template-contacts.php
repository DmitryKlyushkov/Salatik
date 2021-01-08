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
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

    <main class="main">
        <div class="main__container">
            <div class="main-content">
                <section class="category contacts__header">
                    <div class="category__content">
                        <h2 class="category__title">Контакты</h2>
                        <div class="category__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum cursus lorem a leo imperdiet, ac dignissim</div>
                    </div>
                </section>
                <section class="contacts">
                    <div class="contacts__content recepies-profile">
                        <form action="" class="contacts__form form-contacts">
                            <h4 class="form-contacts__title recepies-profile__subtitle">Остались вопросы?</h4>
                            <div class="form-contacts__subtitle">Тема сообщения</div>
                            <div class="form-contacts__select recepies-profile__select">
                                <div class="form-contacts__placeholder recepies-profile__placeholder">Выберите тему</div>
                                <i class="icon-arrow"></i>
                                <select  name="recepies-profile__select">
                                    <option value="Салаты">Салаты</option>
                                    <option value="Бутерброды">Бутерброды</option>
                                    <option value="Канапе">Канапе</option>
                                    <option value="Гренки">Гренки</option>
                                    <option value="Тосты">Тосты</option>
                                    <option value="Тартинки">Тартинки</option>
                                    <option value="Закуски">Закуски</option>
                                    <option value="Заправки">Заправки</option>
                                </select>
                            </div>
                            <input type="text" class="form-contacts__name recepies-profile__name" name="form-contacts__name" placeholder="Ваше имя">
                            <input type="text" class="form-contacts__email recepies-profile__name" name="form-contacts__email" placeholder="Введите ваш email">
                            <textarea class="form-contacts__text recepies-profile__text" name="form-contacts__text" placeholder="Введите текст сообщения"></textarea>
                            <div class="form-contacts__btn recepies-profile__btn">
                                <button type="submit">Отправить</button>
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