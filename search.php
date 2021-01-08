<?php
/**
 * ======================
 *    THE SEARCH PAGE
 * ======================
 *
 * @package theme_name
 */
?>

<?php get_header(); ?>

<h3 class="about__title about__title--search">Результаты поиска:</h3>
<section class="about about--search">
    <div class="about__recipes about__recipes--search">
        <div class="about__recepies_container">
            <div class="about__row">
            <?php 
            if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content/content-recipe-home', get_post_format() );		// Выводим найденные записи
                        endwhile;
                else :
                    echo '<p class="search-not-found">'.esc_html__('Не найдено', 'salatik').'</p>';	// Если ничего не найдено - выводим это (написать подходящий код)
                endif;
                
                    wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>