<?php
/**
 *  ===========================
 *  RECIPE-FAVORITES POST FORMAT
 *  ===========================
 * 
 * @package salatik
 */
?>
<article class="similars__column">
    <div class="similars__card card-similars">
        <div class="card-similars__row">
            <div class="card-similars__column">
                <div class="card-similars__title"><?php the_title(); ?></div>
                <div class="card-similars__text"><?php the_content(); ?></div>
                <div class="card-similars__panel">
                    <div class="card-similars__likes">
                        <i class="icon-likes"></i>
                        <span><?php echo rmp_get_vote_count( get_the_ID() ); ?></span>
                    </div>
                    <div class="card-similars__comments">
                        <i class="icon-commets"></i>
                        <span><?php echo get_comments_number(); ?></span>
                    </div>
                    <div class="card-similars__views">
                        <i class="icon-views"></i>
                        <span><?php echo getPostViews(get_the_ID()); ?></span>
                    </div>
                </div>
            </div>
            <div class="card-similars__column">
                <a href="<?php the_permalink(); ?>">
                    <div class="card-similars__img">
                        <?php the_post_thumbnail( 'thumbnail' ); ?>	
                    </div>
                </a>
            </div>
        </div>
        
    </div>
</article>