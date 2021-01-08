<?php
/**
 *  ==============================
 *  RECIPE-HOME-BOTTOM POST FORMAT
 *  ==============================
 * 
 * @package salatik
 */
?>

<article class="gallery__column">
    <div class="gallery__card">
    <a class="gallery__img" href="<?php the_post_thumbnail_url(); ?>" data-caption="Описание">
        <?php the_post_thumbnail( 'thumbnail', null ); ?>	
    </a>
    <div class="gallery__text"><?php the_content(); ?></div>
    </div>
</article>