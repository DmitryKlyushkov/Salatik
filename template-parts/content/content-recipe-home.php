<?php
/**
 *  ====================
 *  RECIPE-HOME POST FORMAT
 *  ====================
 * 
 * @package salatik
 */
?>

<article class="about__column">
    <a href="<?php the_permalink(); ?>" class="about__recipe recipe">
        <div class="recipe__left">
        <h5 class="recipe__title"><?php the_title(); ?></h5>
        <div class="recipe__text"><?php the_content(); ?></div>
        </div>
        <div class="recipe__right">
            <?php the_post_thumbnail( 'full', null ); ?>	
        </div>
    </a>
</article>