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

              <?php 
              $slides = Kirki::get_option( 'salatik_slider', 'my_repeater_setting');
              foreach( $slides as $slide ) : 
                $img_id = $slide["link_img"];
                $img_url = wp_get_attachment_image_url( $img_id, 'full' );
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
              ?>

              <div class="slider__slide">
                <div id="slide_1_img" class="slider__bg">
                  <img src="<?php echo $img_url ?>" alt="<?php echo $img_alt ?>">
                </div>
                <div id="slide_1_text" class="slider__text">
                  <h1><?php echo $slide["link_title"] ?></h1>
                  <h2><?php echo $slide["link_text"] ?></h2>
                </div>
              </div>

              <?php endforeach; ?>

            </section>
          </div>

          <section class="about">
            <h3 class="about__title"> <?php echo Kirki::get_option( 'salatik', 'text_setting' ); ?></h3>
            <div class="about__cards">
              <div class="about__cards_container">

                <?php 
                $cards = Kirki::get_option( 'salatik', 'my_repeater_setting');
                foreach( $cards as $card ) : 
                  $card_icon = $card["link_icon"];
                  $card_text = $card["link_text"];
                ?>

                <div class="about__card card">
                  <div class="card__img">
                    <i class="<?php echo $card_icon ?>"></i>
                  </div>
                  <div class="card__text"><?php echo $card_text ?></div>
                </div>

                <?php endforeach; ?>

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
              </div>
            </div>
          </section>
          
        </main>
      
    </div>

<?php get_footer(); ?>