<?php
/**
 *  ==============================
 *  RECIPE-HOME-BOTTOM POST FORMAT
 *  ==============================
 * 
 * @package salatik
 */
$content = get_the_content();
?>

<article class="gallery__column">
    <div class="gallery__card">
    <a class="gallery__img" href="<?php the_post_thumbnail_url(); ?>" data-caption="<?php esc_html_e('Описание', 'salatik'); ?>">
        <?php the_post_thumbnail( 'thumbnail', null ); ?>	
    </a>
    <div class="gallery__text"><?php echo mb_strimwidth($content, 0, 80, '...'); ?></div>
    </div>
</article>