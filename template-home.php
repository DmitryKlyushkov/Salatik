<?php
/**
 * ========================
 *  THE MAIN TEMPLATE FILE
 * ========================
 * 
 * Template Name: Домашняя
 * 
 * @package salatik
 */
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

        <main class="main">

          <div class="slider__container">
            <section class="slider">
              <div class="slider__slide">
                <div class="slider__bg">
                  <picture><source srcset="img/main-screen/main-bg.webp" type="image/webp"><img src="img/main-screen/main-bg.png" alt=""></picture>
                </div>
                <div class="slider__text">
                  <h1>Салаты</h1>
                  <h2>на все случаи жизни</h2>
                </div>
              </div>
              <div class="slider__slide">
                <div class="slider__bg">
                  <picture><source srcset="img/gallery/01.webp" type="image/webp"><img data-lazy="img/gallery/01.png" src="img/gallery/01.png" alt=""></picture>
                </div>
                <div class="slider__text">
                  <h1>Салаты</h1>
                  <h2>на все случаи жизни</h2>
                </div>
              </div>
              <div class="slider__slide">
                <div class="slider__bg">
                  <picture><source srcset="img/main-screen/main-bg.webp" type="image/webp"><img data-lazy="img/main-screen/main-bg.png" src="img/main-screen/main-bg.png" alt=""></picture>
                </div>
                <div class="slider__text">
                  <h1>Салаты</h1>
                  <h2>на все случаи жизни</h2>
                </div>
              </div>
              <div class="slider__slide">
                <div class="slider__bg">
                  <picture><source srcset="img/main-screen/main-bg.webp"alt="" type="image/webp"><img data-lazy="img/main-screen/main-bg.png" src="img/main-screen/main-bg.png"alt=""></picture>
                </div>
                <div class="slider__text">
                  <h1>Салаты</h1>
                  <h2>на все случаи жизни</h2>
                </div>
              </div>
            </section>
          </div>

          <section class="about">
            <h3 class="about__title">Смотрите в этом блоге</h3>
            <div class="about__cards">
              <div class="about__cards_container">
                <div class="about__card card">
                  <div class="card__img">
                    <i class="icon-salad"></i>
                  </div>
                  <div class="card__text">Лучшие весенние салаты</div>
                </div>
                <div class="about__card card">
                  <div class="card__img">
                    <i class="icon-scale"></i>
                  </div>
                  <div class="card__text">Салаты для похудения</div>
                </div>
                <div class="about__card card">
                  <div class="card__img">
                    <i class="icon-chef"></i>
                  </div>
                  <div class="card__text">Кулинарные секреты</div>
                </div>
                <div class="about__card card">
                  <div class="card__img">
                    <i class="icon-book"></i>
                  </div>
                  <div class="card__text">И много других полезных рецептов!</div>
                </div>
              </div>
            </div>
            <div class="about__recipes">
              <div class="about__recepies_container">
                <div class="about__row">
                <?php 
                  $args = array(
                    'post_type'       => 'recipe',
                    'posts_per_page'  => 12,
                    'post_status'     => 'publish'
                  );

                  $query = new WP_Query( $args );

                  if ($query->have_posts() ) :
                     while ( $query->have_posts() ) : $query->the_post();
                      get_template_part('template-parts/content/content-recipe-home', get_post_format());
                     endwhile;
                  endif;
                  wp_reset_postdata();
                ?>
                </div>
              </div>
            </div>
            <div class="about__full-recipe full-recipe">
              <div class="full-recipe__container">
                <div class="full-recipe__column full-recipe__column_left">
                  <div class="full-recipe__card">
                    <div class="full-recipe__fruits dropdown">
                      <h3 class="full-recipe__title">Фрукты</h3>
                      <i class="icon-plus"></i>
                    </div>
                    <div class="full-recipe__hidden dropdown__container">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum
                    </div>
                  </div>
                  <div class="full-recipe__card">
                    <div class="full-recipe__meat dropdown">
                      <h3 class="full-recipe__title">Мясо</h3>
                      <i class="icon-plus"></i>
                    </div>
                    <div class="full-recipe__hidden dropdown__container">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum
                    </div>
                  </div>
                  <div class="full-recipe__card">
                    <div class="full-recipe__vegetables dropdown">
                      <h3 class="full-recipe__title">Овощи</h3>
                      <i class="icon-plus"></i>
                    </div>
                    <div class="full-recipe__hidden dropdown__container">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum
                    </div>
                  </div>
                </div>
                <div class="full-recipe__column full-recipe__column_center">
                  <picture><source srcset="img/blog/salad-big.webp" type="image/webp"><img src="img/blog/salad-big.png" alt=""></picture>
                </div>
                <div class="full-recipe__column full-recipe__column_right">
                  <div class="full-recipe__card">
                    <div class="full-recipe__herbs dropdown">
                      <i class="icon-plus"></i>
                      <h3 class="full-recipe__title">Травы</h3>
                    </div>
                    <div class="full-recipe__hidden full-recipe__hidden--right dropdown__container">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum
                    </div>
                  </div>
                  <div class="full-recipe__card">
                    <div class="full-recipe__fish dropdown">
                      <i class="icon-plus"></i>
                      <h3 class="full-recipe__title">Рыба</h3>
                    </div>
                    <div class="full-recipe__hidden full-recipe__hidden--right dropdown__container">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="about__author author-about">
              <div class="author-about__container">
                <div class="author-about__row">
                  <div class="author-about__column">
                    <a href="#">
                      <div class="author-about__img">
                      </div>
                    </a>
                  </div>
                  <div class="author-about__column">
                    <h3 class="author-about__title">Об авторе</h3>
                    <div class="author-about__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum cursus lorem a leo imperdiet, ac dignissim</div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="gallery">
            <div class="gallery__container">
              <div class="gallery__row">
              <?php 
                  $args2 = array(
                    'post_type'           => 'recipe',
                    'posts_per_page'      => 4,
                    'post_status'         => 'publish',
                  );

                  $query2 = new WP_Query( $args2 );

                  if ($query2->have_posts() ) :
                     while ( $query2->have_posts() ) : $query2->the_post();
                       get_template_part('template-parts/content/content-recipe-home-bottom', get_post_format());
                     endwhile;
                  endif;

                ?>
                <!-- <div class="gallery__column">
                  <div class="gallery__card">
                    <a class="gallery__img" href="img/gallery/01.png" data-caption="Описание">
                      <picture><source srcset="img/gallery/01.webp" type="image/webp"><img src="img/gallery/01.png" alt=""></picture>
                    </a>
                    <div class="gallery__text">Описание</div>
                  </div>
                </div>
                <div class="gallery__column">
                  <div class="gallery__card">
                    <a class="gallery__img" href="img/gallery/01.png"data-caption="Описание">
                      <picture><source srcset="img/gallery/01.webp" type="image/webp"><img src="img/gallery/01.png" alt=""></picture>
                    </a>
                    <div class="gallery__text">Описание</div>
                  </div>
                </div>
                <div class="gallery__column">
                  <div class="gallery__card">
                    <a class="gallery__img" href="img/gallery/01.png" data-caption="Описание">
                      <picture><source srcset="img/gallery/01.webp" type="image/webp"><img src="img/gallery/01.png" alt=""></picture>
                    </a>
                    <div class="gallery__text">Описание</div>
                  </div>
                </div>
                <div class="gallery__column">
                  <div class="gallery__card">
                    <a class="gallery__img" href="img/gallery/01.png" data-caption="Описание">
                      <picture><source srcset="img/gallery/01.webp" type="image/webp"><img src="img/gallery/01.png" alt=""></picture>
                    </a>
                    <div class="gallery__text">Описание</div>
                  </div>
                </div> -->
              </div>
            </div>
          </section>
          
        </main>
      
    </div>

<?php get_footer(); ?>