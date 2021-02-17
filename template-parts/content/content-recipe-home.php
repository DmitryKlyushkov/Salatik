<?php
/**
 *  ====================
 *  RECIPE-HOME POST FORMAT
 *  ====================
 * 
 * @package salatik
 */
$content = get_the_content();
$title = get_the_title();
?>

<article class="about__column">
    <a href="<?php the_permalink(); ?>" class="about__recipe recipe">
        <div class="recipe__left">
        <h5 class="recipe__title"><?php echo mb_strimwidth($title, 0, 20, '...'); ?></h5>
        <div class="recipe__text"><?php echo mb_strimwidth($content, 0, 60, '...'); ?></div>
        </div>
        <div class="recipe__right">
            <?php the_post_thumbnail( 'full', null ); ?>	
        </div>
    </a>
</article>