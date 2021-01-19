<?php
/**
 *  ===========================
 *  RECIPE-POPULAR POST FORMAT
 *  ==========================
 * 
 * @package salatik
 */
?>
<div class="popular__recipe recipe-popular">
    <div class="recipe-popular__row">
        <div class="recipe-popular__column">
            <div class="recipe-popular__title"><?php the_title(); ?></div>
            <div class="recipe-popular__panel">
                <div class="recipe-popular__unit">
                    <i class="icon-likes"></i>
                    <span><?php echo rmp_get_vote_count( get_the_ID() ); ?></span>
                </div>
                <div class="recipe-popular__unit">
                    <i class="icon-commets"></i>
                    <span><?php echo get_comments_number(); ?> </span>
                </div>
                <div class="recipe-popular__unit">
                    <i class="icon-views"></i>
                    <span><?php echo getPostViews(get_the_ID()); ?></span>
                </div>
            </div>
        </div>
        <div class="recipe-popular__column">
            <a href="<?php the_permalink(); ?>">
                <div class="recipe-popular__img">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>	
                </div>
            </a>
        </div>
    </div>
</div>