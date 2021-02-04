<?php
/**
 * ======================
 *  SINGLE PAGE TEMPLATE
 * ======================
 *
 * @package salatik
 */
setPostViews(get_the_ID());
$category = wp_get_post_categories( get_the_ID() );
?>
<?php get_header(); ?>

<body <?php body_class(); ?>>

	<main class="main">

		<div class="main__container">

			<div class="main-content">
				<div class="breadcrumbs">
					<?php echo esc_attr(salatik_get_breadcrumbs()); ?>
				</div>

				<section class="main-content__inside">
					<div class="main-content__img">
						<?php the_post_thumbnail( 'full' ); ?>	
					</div>
					<div class="main-content__panel main-panel">
						<div class="main-panel__user">
							<a href="">
								<i class="icon-user"></i>
							</a>
							<span class="main-panel__username"><?php the_author_meta('display_name', 1); ?></span>
						</div>
						<div class="main-panel__date">
							<i class="icon-date"></i>
							<span class="main-panel__datetime"><?php the_time( 'd.m.Y' ); ?></span>
						</div>
						<div class="main-panel__comments">
							<a href="<?php the_permalink() ?>#comments">
								<i class="icon-commets"></i>
							</a>
							<span class="main-panel__commentsnum"><?php echo get_comments_number(); ?></span>
						</div>
						<div class="main-panel__views">
							<i class="icon-views"></i>
							<span class="main-panel__viewsnum"><?php echo getPostViews(get_the_ID()); ?></span>
						</div>
						<div class="main-panel__rating">
							<?php echo rmp_get_visual_rating( get_the_ID() ); ?>
						</div>
						<div class="main-panel__save" data-da="main-panel_bottom, 2, 525">
							<?php 
							if(is_user_logged_in(  )) {
								echo do_shortcode( '[favorites]' );
							} else {
								echo '<i class="icon-heart"></i>
								<a href="#" data-action="add" class="main-panel__savetext main-panel__savetext--nolog">В закладки</a>';
							}
							?>
						</div>
					</div>
					<div class="main-content__panel main-panel_bottom">
					</div>
				</section>

				<section class="properties">
					<div class="properties__header">
						<h3 class="properties__title"><?php the_title(); ?></h3>
						<div class="properties__time">
							<i class="icon-watch"></i>
							<h6 class="properties__time--value">30 минут</h6>
						</div>
					</div>
					<div class="properties__text">
						<?php the_content(); ?>  					
					</div>
					<div class="properties__footer">
						<div class="properties__ingredients ingredients">
							<div class="ingredients__inside">
								<div class="ingredients__header">
									<i class="icon-ingredients"></i>
									<span class="ingredients__header--value">Ингредиенты:</span>
								</div>
								<div class="ingredients__content">
									<div class="ingredients__row">
										<div class="ingredients__ingredient">Руккола</div>
										<div class="ingredients__amount">100 г</div>
									</div>
									<div class="ingredients__row">
										<div class="ingredients__ingredient">Томаты черри</div>
										<div class="ingredients__amount">50 г</div>
									</div>
									<div class="ingredients__row">
										<div class="ingredients__ingredient">Оливковое масло</div>
										<div class="ingredients__amount">2 ст.л</div>
									</div>
									<div class="ingredients__row">
										<div class="ingredients__ingredient">Болгарский перец</div>
										<div class="ingredients__amount">1 шт</div>
									</div>
									<div class="ingredients__row">
										<div class="ingredients__ingredient">Сыр рикотта</div>
										<div class="ingredients__amount">50 г</div>
									</div>
								</div>
							</div>
						</div>
						<div class="properties__calories calories">
							<div class="calories__inside">
								<div class="calories__header">
									<span class="calories__header--value">Калорийность</span>
								</div>
								<div class="calories__content">
									<div class="calories__row">
										<div class="calories__chem">Белки</div>
										<div class="calories__amount">10 г</div>
									</div>
									<div class="calories__row">
										<div class="calories__chem">Жиры</div>
										<div class="calories__amount">15 г</div>
									</div>
									<div class="calories__row">
										<div class="calories__chem">Глеводы</div>
										<div class="calories__amount">30 г</div>
									</div>
									<div class="calories__row">
										<div class="calories__chem">Калории</div>
										<div class="calories__amount">300 Ккал</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</section>
				
				<section class="stages">
					<h4 class="stages__title">Этапы приготовления:</h4>
					<div class="stages__content">
						<div class="stages__stage stage">
							<div class="stage__img">
								<picture><source srcset="img/recipe/01.webp" type="image/webp"><img src="img/recipe/01.png" alt=""></picture>
							</div>
							<div class="stage__text"><span>1.</span> Нарезать томаты черри...</div>
						</div>
						<div class="stages__stage stage">
							<div class="stage__img">
								<picture><source srcset="img/recipe/01.webp" type="image/webp"><img src="img/recipe/01.png" alt=""></picture>
							</div>
							<div class="stage__text"><span>2.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
						</div>
						<div class="stages__stage stage">
							<div class="stage__img">
								<picture><source srcset="img/recipe/01.webp" type="image/webp"><img src="img/recipe/01.png" alt=""></picture>
							</div>
							<div class="stage__text"><span>3.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor sapien, tincidunt rutrum fringilla nec, dictum eu ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
						</div>
					</div>
				</section>

				<div class="fff">
					<div class="fff__container">
						<span>728x90</span>
					</div>
				</div>

				<section class="share">
					<div class="share__container">
						<div class="share__row">
							<div class="share__column">
								<h6 class="share__title share__title--u">Поделиться в социальных сетях:</h6>
								<div class="socials-footer__icons share__socials">
								<?php 
                                $socials = Kirki::get_option( 'salatik_footer', 'my_repeater_setting');
                                foreach( $socials as $social ) :
                                    if (isset($social['link_socials'])) :
                                        switch ($social['link_socials']) {
                                            case 'Facebook': ?>
                                                <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/facebook.svg'; ?>" alt="facebook icon">
                                                </a>
                                            <?php
                                            break;
                                            
                                            case 'Instagram': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/instagram.svg'; ?>" alt="instagram icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Google Plus': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/google-plus.svg'; ?>" alt="google-plus icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'WhatsUp': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/whatsapp.svg'; ?>" alt="whatsup icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Viber': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/viber.svg'; ?>" alt="viber icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Vkontakte': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/vk.svg'; ?>" alt="telegram icon">
                                            </a>
                                            <?php
                                            break;

                                            case 'Odnoklassniki': ?>
                                            <a href="<?php echo $social['link_url']; ?>" class="socials-footer__icon">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/img/socials/odnoklassniki.svg'; ?>" alt="odnoklassniki icon">
                                            </a>
                                            <?php
                                            break;
                                        } 
                                    endif;
                                endforeach; ?>
								</div>
							</div>
							<div class="share__column">
								<h6 class="share__title share__title--b">Оценить рецепт:</h6>
								<form class="rating" method="POST" action="">
									<?php echo do_shortcode('[ratemypost]'); ?>	
								</form>
							</div>
						</div>
					</div>
				</section>

				<section class="similars">
					<div class="similars__container">
						<h4 class="similars__title">Похожие рецепты:</h4>
						<div class="similars__content">
							<div class="similars__row">
								<?php 
									$args = array(
										'post_type' => 'recipe',
										'posts_per_page' => 4,
										'category__in' => $category
									);
									$query_similar = new WP_Query($args);
									if ( $query_similar->have_posts() ) :
									   while ( $query_similar->have_posts() ) : $query_similar->the_post();
									   	get_template_part('template-parts/content/content-similar', get_post_format());
									   endwhile;
									endif;
									wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</section>
				
				<?php 
					if ( comments_open() ):
						comments_template();
					endif;
				?>

			</div>
			
			<div class="aside__container">
				<?php get_sidebar(); ?>
			</div>

		</div>

	</main>
        
<?php get_footer(); ?>