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
                <div class="slider__bg">
                  <img src="<?php echo $img_url ?>" alt="<?php echo $img_alt ?>">
                </div>
                <div class="slider__text">
                  <h1 class="slider__title"><?php echo $slide["link_title"] ?></h1>
                  <h2 class="slider__subtitle"><?php echo $slide["link_text"] ?></h2>
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
            
            <!-- <div class="pagination">
              <div class="pagination__prev">  
                    
                <a href="#" class="prev"></a> 
                </div>
                
              <div class="pagination__pages"> 
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
              </div>
              <div class="pagination__next">
                    
                <a href="#" class="next"></a>
              </div>
            </div> -->
              <div class="about__recepies_container">
                <div class="about__row">

                <?php 
                  $args = array(
                    'post_type'       => 'recipe',
                    'posts_per_page'  => 9,
                    'post_status'     => 'publish',
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
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

            <?php
              $post_ids = get_posts(array(
                'numberposts'   => -1, 
                'post_type'     => 'recipe',
                'fields'        => 'ids', 
              ));
              $rand = array_rand( $post_ids, 1 );
              $post_id = $post_ids[$rand];

              $post_content = get_the_content( null, null, $post_id );

              $meta_ingredients = trim( get_post_meta( $post_id, 'ingredients', true ) );
              //preg_match_all("/[A-Za-zА-Яа-я]+\s([A-Za-zА-Яа-я]?)+/imu", $meta_ingredients, $ingredients_names );
              preg_match_all("/([^(),]+)(?:$|\()/imu", $meta_ingredients, $ingredients_names );  
              preg_match_all("/(?<=\()(.*?)(?=\))/m", $meta_ingredients, $ingredients_numbers );
                      
              $meta_calories = trim( get_post_meta( $post_id, 'calories', true ) );
              preg_match_all("/[A-Za-zА-Яа-я]+\s([A-Za-zА-Яа-я]?)+/imu", $meta_calories, $calories_names );
              preg_match_all("/(?<=\()(.*?)(?=\))/m", $meta_calories, $calories_numbers);

              $post_thumbnail = get_the_post_thumbnail( $post_id, 'full' );

              $post_author_id = get_post_field( 'post_author', $post_id );
              $post_author_bio = get_the_author_meta( 'user_description', $post_author_id );
              
              $avatar = get_user_meta($post_author_id, '_user_img_url', true);
              $title = get_the_title($post_id);

              if(!empty($post_ids)):
            ?>
            <div class="about__full-recipe full-recipe">
              <h3 class="about__title"><?php esc_html_e('Случайный рецепт:', 'salatik'); ?></h3>
              <a href="<?php the_permalink( $post_id ); ?>" class="about__link">
                <h3 class="about__title"><?php echo $title ?></h3>
              </a>
              <div class="full-recipe__container">
                <div class="full-recipe__column full-recipe__column_left">
                  <div class="full-recipe__card">
                    <div class="full-recipe__fruits dropdown">
                      <h3 class="full-recipe__title"><?php esc_html_e('Описание', 'salatik'); ?></h3>
                      <i class="icon-plus"></i>
                    </div>
                    <div class="full-recipe__hidden dropdown__container">
                      <?php if(!empty($post_content)) {
                        echo $post_content;
                      } else {
                        esc_html_e('Описание отсутствует', 'salatik');
                      } ?>
                    </div>
                  </div>
                </div>
                <div class="full-recipe__column full-recipe__column_center">
                    <?php echo $post_thumbnail ?>
                </div>
                <div class="full-recipe__column full-recipe__column_right">
                  <div class="full-recipe__card">
                    <div class="full-recipe__herbs dropdown">
                      <i class="icon-plus"></i>
                      <h3 class="full-recipe__title"><?php esc_html_e('Состав', 'salatik'); ?></h3>
                    </div>
                    <div class="full-recipe__hidden full-recipe__hidden--right dropdown__container">
                    <?php 
                    if(!empty($ingredients_names[0])): 
                    ?>
                          <div class="ingredients__header">
                            <span class="ingredients__header--value"><?php esc_html_e('Ингредиенты', 'salatik'); ?></span>
                          </div>
                          <div class="ingredients__content">

                          <?php 
                            foreach ($ingredients_names[0] as $key => $value): ?>
                              <?php $name = str_replace('(', '', $ingredients_names[0][$key]);
                                    $ingredient = $ingredients_numbers[0][$key];
                              ?>
                              <div class="ingredients__row">
                                <div class="ingredients__ingredient">
                                
                                  <?php if(!empty($name)){
                                          echo $name;
                                        } else {
                                          echo '';
                                        } ?>

                                </div>
                                <div class="ingredients__amount">

                                <?php if($ingredient){
                                          echo $ingredient;
                                        } else {
                                          echo '';
                                        } ?>
                                  
                                </div>
                              </div>

                            <?php endforeach; ?>

                      </div>
                      <?php endif; ?>

                      <?php 
                      if(!empty($calories_names[0])): 
                      ?>
                        <div class="calories__header">
                          <span class="calories__header--value"><?php esc_html_e('Калорийность', 'salatik'); ?></span>
                        </div>
                        <div class="calories__content">
                        
                          <?php 
                          foreach ($calories_names[0] as $key => $value): 
                          ?>
                          <div class="calories__row">
                            <div class="calories__chem">

                              <?php echo $calories_names[0][$key] ?>

                            </div>
                            <div class="calories__amount">

                              <?php echo $calories_numbers[0][$key] ?>

                            </div>
                          </div>
                          <?php endforeach; ?>
                      
                      </div>
                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="about__author author-about">
              <div class="author-about__container">
                <div class="author-about__row">
                  <div class="author-about__column">
                      <div class="author-about__img">
                      <?php if(!empty($avatar)): ?>
                              <img src="<?php echo $avatar ?>">
                      <?php else: echo get_avatar($post_author_id); 
                            endif;
                      ?>
                      </div>
                  </div>
                  <div class="author-about__column">
                    <h3 class="author-about__title"><?php esc_html_e('ОБ авторе', 'salatik'); ?></h3>
                    <div class="author-about__text"><?php echo $post_author_bio ?></div>
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

          <?php endif; ?>
        </main>
      
    </div>

<?php get_footer(); ?>