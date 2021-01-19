<?php
/**
 * ======================
 *  PROFILE PAGE TEMPLATE
 * ======================
 * 
 * Template Name: Профиль
 * 
 * @package salatik
 */
?>

<?php 
if ( !(is_user_logged_in() ) ) {
    wp_redirect( home_url('login') );
    exit;
}
// global $wpdb;
// global $post;
$user_id = get_current_user_id();

// Comment Count By User
$comment_count = $wpdb->get_var('
             SELECT COUNT(comment_ID) 
             FROM ' . $wpdb->comments. ' 
             WHERE user_id = "' . $user_id . '"');

// Rate Count By User
$rate_count = get_user_meta( $user_id, 'rate_count', true );

// Posts Count By User
$comment_counter_args = array(
    'post_type'         => 'recipe',
    'post_status'       => 'publish',
    'posts_per_page'    => -1,
    'author'            => $user_id
);
$current_user_posts = get_posts( $comment_counter_args );
$total = count($current_user_posts);

$nickname = get_the_author_meta( 'user_login', $user_id);
$firstName = get_the_author_meta( 'user_firstname', $user_id);
$lastName = get_the_author_meta( 'user_lastname', $user_id);
$email = get_the_author_meta( 'user_email', $user_id);



switch(get_the_author_meta('user_level', $user_id )) {
    case 10:
        $status = esc_html__('Админ', 'salatik');
        break;
    case 5:
        $status =  esc_html__('Редактор', 'salatik');
        break;
    case 2:
        $status =  esc_html__('Автор', 'salatik');
        break;
    case 1:
        $status =  esc_html__('Участник', 'salatik');
        break;
    case 0:
        $status =  esc_html__('Подписчик', 'salatik');
        break;
};


?>

<?php get_header(); ?>

    <main class="main">
        <div class="main__container">
            <div class="main-content">
                <section class="profile">
                    <div class="profile__content">
                        <div class="profile__header">
                            <div class="profile__row">
                                <div class="profile__column">
                                    <div class="profile__row">
                                        <div class="profile__column profile__column--avatar">
                                            <div class="profile__avatar"></div>
                                            <label for="profile__download"><?php esc_html_e('Загрузить', 'salatik'); ?></label>
                                            <input type="file" accept=".jpg, .png, .gif, webp" class="formImage profile__download" id="profile__download">
                                        </div>
                                        <div class="profile__column profile__column--desc">
                                            <div class="profile__username">
                                                <span><?php echo $nickname ?></span>
                                            </div>
                                            <div class="profile__name">
                                                <span><?php echo $firstName ?>&nbsp;<?php echo $lastName?></span>
                                            </div>
                                            <div class="profile__email">
                                                <span><?php echo $email ?></span>
                                            </div>
                                            <div class="profile__status">
                                                <span><?php esc_html_e('Статус:', 'salatik'); ?></span>
                                                <span><?php echo $status ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__column">
                                    <div class="profile__logout">
                                        <a href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e('Выйти:', 'salatik'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile__panel panel-profile">
                            <div class="panel-profile__unit">
                                <span><?php echo $total ?></span>
                                <span><?php esc_html_e('Рецептов добавлено', 'salatik'); ?></span>
                            </div>
                            <div class="panel-profile__unit">
                                <span><?php echo $comment_count ?></span>
                                <span><?php esc_html_e('Комментариев', 'salatik'); ?></span>
                            </div>
                            <div class="panel-profile__unit">
                                <span>10</span>
                                <span><?php esc_html_e('Оценок', 'salatik'); ?></span>
                            </div>
                        </div>
                        <div class="profile__recepies recepies-profile">
                            <form action="" class="recepies-profile__form">
                                <div class="recepies-profile__header">
                                    <h4 class="recepies-profile__title">Мои рецепты</h4>
                                    <button class="recepies-profile__btn--up" type="submit">Добавить рецепт</button>
                                </div>
                                <div class="recepies-profile__body">
                                    <div class="recepies-profile__subtitle">Добавление рецепта:</div>
                                    <div class="recepies-profile__select">
                                        <div class="recepies-profile__placeholder">Выберите категорию</div>
                                        <i class="icon-arrow"></i>
                                        <select name="recepies-profile__select">
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
                                    <input type="text" class="recepies-profile__name" name="recepies-profile__name" placeholder="Название рецепта">
                                    <div class="recepies-profile__subtitle">Выберите фото и добавьте описание</div>
                                    <div class="recepies-profile__photos">
                                        <div class="recepies-profile__input recepies-profile__photo">
                                            <label for="formImage"><i class="icon-plus"></i></label>
                                            <input id="formImage" accept=".jpg, .png, .gif, webp" type="file" name="image" class="formImage">
                                        </div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                        <div class="recepies-profile__photo file__preview"></div>
                                    </div>
                                    <textarea class="recepies-profile__text" name="recepies-profile__text" placeholder="Описание рецепта"></textarea>
                                    <div class="recepies-profile__btn">
                                        <button type="submit">Добавить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="similars--p">
                    <div class="similars__container">
                        <h4 class="similars__title">Похожие рецепты:</h4>
                        <div class="similars__content">
                            <div class="similars__row">
                                <article class="similars__column">
                                    <div class="similars__card card-similars">
                                        <div class="card-similars__row">
                                            <div class="card-similars__column">
                                                <div class="card-similars__title">Бутерброд с сыром</div>
                                                <div class="card-similars__text">Приготовь себе и близким интересный перекус</div>
                                                <div class="card-similars__panel">
                                                    <div class="card-similars__likes">
                                                        <a href="#">
                                                            <i class="icon-likes"></i>
                                                        </a>
                                                        <span>100</span>
                                                    </div>
                                                    <div class="card-similars__comments">
                                                        <a href="#">
                                                            <i class="icon-commets"></i>
                                                        </a>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="card-similars__views">
                                                        <i class="icon-views"></i>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-similars__column">
                                                <div class="card-similars__img">
                                                    <picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </article>
                                <article class="similars__column">
                                    <div class="similars__card card-similars">
                                        <div class="card-similars__row">
                                            <div class="card-similars__column">
                                                <div class="card-similars__title">Салат с рукколой</div>
                                                <div class="card-similars__text">Наслаждайся вкусным салатом каждый день</div>
                                                <div class="card-similars__panel">
                                                    <div class="card-similars__likes">
                                                        <a href="#">
                                                            <i class="icon-likes"></i>
                                                        </a>
                                                        <span>100</span>
                                                    </div>
                                                    <div class="card-similars__comments">
                                                        <a href="#">
                                                            <i class="icon-commets"></i>
                                                        </a>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="card-similars__views">
                                                        <i class="icon-views"></i>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-similars__column">
                                                <div class="card-similars__img">
                                                    <picture><source srcset="img/recipe/01.webp" type="image/webp"><img src="img/recipe/01.png" alt=""></picture>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </article>
                                <article class="similars__column">
                                    <div class="similars__card card-similars">
                                        <div class="card-similars__row">
                                            <div class="card-similars__column">
                                                <div class="card-similars__title">Бутерброд с сыром</div>
                                                <div class="card-similars__text">Приготовь себе и близким интересный перекус</div>
                                                <div class="card-similars__panel">
                                                    <div class="card-similars__likes">
                                                        <a href="#">
                                                            <i class="icon-likes"></i>
                                                        </a>
                                                        <span>100</span>
                                                    </div>
                                                    <div class="card-similars__comments">
                                                        <a href="#">
                                                            <i class="icon-commets"></i>
                                                        </a>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="card-similars__views">
                                                        <i class="icon-views"></i>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-similars__column">
                                                <div class="card-similars__img">
                                                    <picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </article>
                                <article class="similars__column">
                                    <div class="similars__card card-similars">
                                        <div class="card-similars__row">
                                            <div class="card-similars__column">
                                                <div class="card-similars__title">Салат с рукколой</div>
                                                <div class="card-similars__text">Наслаждайся вкусным салатом каждый день</div>
                                                <div class="card-similars__panel">
                                                    <div class="card-similars__likes">
                                                        <a href="#">
                                                            <i class="icon-likes"></i>
                                                        </a>
                                                        <span>100</span>
                                                    </div>
                                                    <div class="card-similars__comments">
                                                        <a href="#">
                                                            <i class="icon-commets"></i>
                                                        </a>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="card-similars__views">
                                                        <i class="icon-views"></i>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-similars__column">
                                                <div class="card-similars__img">
                                                    <picture><source srcset="img/recipe/01.webp" type="image/webp"><img src="img/recipe/01.png" alt=""></picture>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bookmarks">
                    <div class="similars__container">
                        <h4 class="similars__title">Закладки</h4>
                        <div class="similars__content">
                            <div class="similars__row">
                                <article class="similars__column">
                                    <div class="similars__card card-similars">
                                        <div class="card-similars__row">
                                            <div class="card-similars__column">
                                                <div class="card-similars__title">Бутерброд с сыром</div>
                                                <div class="card-similars__text">Приготовь себе и близким интересный перекус</div>
                                                <div class="card-similars__panel">
                                                    <div class="card-similars__likes">
                                                        <a href="#">
                                                            <i class="icon-likes"></i>
                                                        </a>
                                                        <span>100</span>
                                                    </div>
                                                    <div class="card-similars__comments">
                                                        <a href="#">
                                                            <i class="icon-commets"></i>
                                                        </a>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="card-similars__views">
                                                        <i class="icon-views"></i>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-similars__column">
                                                <div class="card-similars__img">
                                                    <picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </article>
                                <article class="similars__column">
                                    <div class="similars__card card-similars">
                                        <div class="card-similars__row">
                                            <div class="card-similars__column">
                                                <div class="card-similars__title">Салат с рукколой</div>
                                                <div class="card-similars__text">Наслаждайся вкусным салатом каждый день</div>
                                                <div class="card-similars__panel">
                                                    <div class="card-similars__likes">
                                                        <a href="#">
                                                            <i class="icon-likes"></i>
                                                        </a>
                                                        <span>100</span>
                                                    </div>
                                                    <div class="card-similars__comments">
                                                        <a href="#">
                                                            <i class="icon-commets"></i>
                                                        </a>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="card-similars__views">
                                                        <i class="icon-views"></i>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-similars__column">
                                                <div class="card-similars__img">
                                                    <picture><source srcset="img/recipe/01.webp" type="image/webp"><img src="img/recipe/01.png" alt=""></picture>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <aside class="aside">
                <div class="aside__container">
                    <section class="subscribe">
                        <form class="subscribe__content">
                            <h6 class="subscribe__title">Подпишись на обновления</h6>
                            <input type="email" placeholder="Введите ваш e-mail" class="subscribe__input">
                            <button type="submit" class="subscribe__btn">Подписаться</button>
                        </form>
                    </section>
                    <section class="popular">
                        <div class="popular__content">
                            <h6 class="popular__title">Полулярные рецепты</h6>
                            <div class="popular__recipe recipe-popular">
                                <div class="recipe-popular__row">
                                    <div class="recipe-popular__column">
                                        <div class="recipe-popular__title">Бутерброд с сыром</div>
                                        <div class="recipe-popular__panel">
                                            <div class="recipe-popular__unit">
                                                <i class="icon-likes"></i>
                                                <span>100</span>
                                            </div>
                                            <div class="recipe-popular__unit">
                                                <i class="icon-commets"></i>
                                                <span>10</span>
                                            </div>
                                            <div class="recipe-popular__unit">
                                                <i class="icon-views"></i>
                                                <span>10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recipe-popular__column">
                                        <a href="#">
                                            <div class="recipe-popular__img">
                                                <picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="popular__recipe recipe-popular">
                                <div class="recipe-popular__row">
                                    <div class="recipe-popular__column">
                                        <div class="recipe-popular__title">Бутерброд с сыром</div>
                                        <div class="recipe-popular__panel">
                                            <div class="recipe-popular__unit">
                                                <i class="icon-likes"></i>
                                                <span>100</span>
                                            </div>
                                            <div class="recipe-popular__unit">
                                                <i class="icon-commets"></i>
                                                <span>10</span>
                                            </div>
                                            <div class="recipe-popular__unit">
                                                <i class="icon-views"></i>
                                                <span>10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recipe-popular__column">
                                        <a href="#">
                                            <div class="recipe-popular__img">
                                                <picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="popular__recipe recipe-popular">
                                <div class="recipe-popular__row">
                                    <div class="recipe-popular__column">
                                        <div class="recipe-popular__title">Бутерброд с сыром</div>
                                        <div class="recipe-popular__panel">
                                            <div class="recipe-popular__unit">
                                                <i class="icon-likes"></i>
                                                <span>100</span>
                                            </div>
                                            <div class="recipe-popular__unit">
                                                <i class="icon-commets"></i>
                                                <span>10</span>
                                            </div>
                                            <div class="recipe-popular__unit">
                                                <i class="icon-views"></i>
                                                <span>10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recipe-popular__column">
                                        <a href="#">
                                            <div class="recipe-popular__img">
                                                <picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="extra">
                        <div class="extra__content">
                            <h6 class="extra__title">Реклама</h6>
                            <div class="extra__body">
                                <div class="extra__part">
                                    <span>Блок с рекламой</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="sim">
                        <div class="sim__content">
                            <h6 class="sim__title">Дополнительный блок</h6>
                            <div class="sim__body"></div>
                        </div>
                    </section>
                </div>
            </aside>  
        </div>
    </main>

<?php get_footer(); ?>