<?php
/**
 * ======================
 * PROFILE FORM SETTINGS
 * ======================
 * 
 * @package salatik
 */
add_shortcode('profile_form', 'salatik_profile_form' );

function salatik_profile_form() {
    ob_start(); ?>

    <form id="profile-form" class="recepies-profile__form" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" enctype="multipart/form-data">
        <div class="recepies-profile__header">
            <h4 class="recepies-profile__title">Мои рецепты</h4>
            <button class="recepies-profile__btn--up" type="submit">Добавить рецепт</button>
        </div>
        <div class="recepies-profile__body">
            <div class="recepies-profile__subtitle">Добавление рецепта*:</div>
            <div class="recepies-profile__select">
                <i class="icon-arrow"></i>
                <?php
                $args = array(
                    'id'            => 'category',
                    'hide_empty'    => 0, 
                    'name'          => 'recepies-profile__select', 
                    'orderby'       => 'name', 
                    'hierarchical'  => true,
                    'value_field'   => 'name'
                ); 

                wp_dropdown_categories( $args );
                ?>
            </div>
            <input type="text" id="profile-form__name" class="recepies-profile__name" name="recepies-profile__name" placeholder="Название рецепта" required>
            <div class="recepies-profile__subtitle">Выберите фото и добавьте описание*</div>
            <div class="recepies-profile__photos">
                <div class="recepies-profile__input recepies-profile__photo">
                    <label for="formImage"><i class="icon-plus"></i></label>
                    <input id="formImage" accept=".jpg, .png, .gif, webp" type="file" name="image" class="formImage" required>
                </div>
                <div class="recepies-profile__photo file__preview"></div>
            </div>
            <textarea id="profile-form__text" class="recepies-profile__text" name="recepies-profile__text" placeholder="Описание рецепта" required></textarea>
            <div class="recepies-profile__subtitle">Укажите ингредиенты(количество)*</div>
            <input type="text" id="profile-form__ingredients" class="recepies-profile__name" name="recepies-profile__ingredients" placeholder="Например: Руколла(100г), Сыр(50г)" required>
            <div class="recepies-profile__subtitle">Укажите калорийность(количество)*</div>
            <input type="text" id="profile-form__calories" class="recepies-profile__name" name="profile-form__calories" placeholder="Например: Белки(10г), Жиры(15г)" required>
            <div class="recepies-profile__subtitle">Укажите время готовки в минутах*</div>
            <input type="text" id="profile-form__time" class="recepies-profile__name" name="profile-form__time" placeholder="Например: 30 минут(ы)" required>
            <div class="recepies-profile__btn">
                <button type="submit">Добавить</button>
            </div>
        </div>
    </form>

    <?php
    return ob_get_clean();
}