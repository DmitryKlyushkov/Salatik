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
						<!-- <form class="main-panel__rating" data-da="main-panel_bottom, 1, 525" method="POST" action="">
							<input
							type="radio"
							id="star5"
							name="rating"
							value="5"
							/>
							<label for="star5"></label>
							<input
							type="radio"
							id="star4"
							name="rating"
							value="4"
							/>
							<label for="star4"></label>
							<input
							type="radio"
							id="star3"
							name="rating"
							value="3"
							/>
							<label for="star3"></label>
							<input
							type="radio"
							id="star2"
							name="rating"
							value="2"
							/>
							<label for="star2"></label>
							<input
							type="radio"
							id="star1"
							name="rating"
							value="1"
							/>
							<label for="star1"></label>
						</form> -->
						<div class="main-panel__save" data-da="main-panel_bottom, 2, 525">
							<i class="icon-heart"></i>
							<a href="#" class="main-panel__savetext">В закладки</a>
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
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/vk.svg" type="image/webp"><img src="img/socials/vk.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/facebook.svg" type="image/webp"><img src="img/socials/facebook.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/instagram.svg" type="image/webp"><img src="img/socials/instagram.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/google-plus.svg" type="image/webp"><img src="img/socials/google-plus.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/whatsapp.svg" type="image/webp"><img src="img/socials/whatsapp.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/viber.svg" type="image/webp"><img src="img/socials/viber.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/telegram.svg" type="image/webp"><img src="img/socials/telegram.svg" alt=""></picture>
									</a>
									<a href="#" class="socials-footer__icon">
										<picture><source srcset="img/socials/odnoklassniki.svg" type="image/webp"><img src="img/socials/odnoklassniki.svg" alt=""></picture>
									</a>
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

				<!-- <section class="commentaries">
					<form action="" class="commentaries__form" id="commentaries__form" method="POST">
						<h4 class="commentaries__title">Добавить комментарий:</h4>
						<textarea name="commentary" id="commentary" class="commentaries__textarea" placeholder="Введите текст комментария"></textarea>
						<div class="commentaries__footer">
							<div class="commentaries__emojis">
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
								<a href="#"><div class="commentaries__emoji"></div></a>
							</div>
							<button type="submit" class="commentaries__btn">отправить</button>
						</div>
					</form>                      
					<ul class="commentaries__comments comments">
							<li class="comments__comment">
								<div class="comments__row">
									<div class="comments__column">
										<a href="#">
										<div class="comments__avatar"></div>
										</a>
									</div>
									<div class="comments__column">
										<div class="comments__content">
											<div class="comments__header">
												<div class="comments__username">
													<span>Админ</span>
												</div>
												<div class="comments__datetime">
													<span>03.12.19</span>
												</div>
												<a href="#" class="comments__reply">
													<span>Ответить</span>
												</a>
											</div>
											<div class="comments__footer">
												<span class="comments__text">
													Текст комментария
												</span>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="comments__comment comments__comment--reply">
								<div class="comments__row">
									<div class="comments__column">
										<a href="#">
											<div class="comments__avatar"></div>
										</a>
									</div>
									<div class="comments__column">
										<div class="comments__content">
											<div class="comments__header">
												<div class="comments__username">
													<span>Админ</span>
												</div>
												<div class="comments__datetime">
													<span>03.12.19</span>
												</div>
												<a href="#" class="comments__reply">
													<span>Ответить</span>
												</a>
											</div>
											<div class="comments__footer">
												<div class="comments__text">
													Текст комментария
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
					</ul>
					<div class="commentaries__pagination pagination">
							<div class="pagination__prev">      
								<a href="#" class="prev">
									<i class="icon-arrow"></i>
								</a> 
							</div>
							<div class="pagination__pages">  
								<a href="#" class="pagination__current">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
							</div>
							<div class="pagination__next">
								<a href="#" class="next">
									<i class="icon-arrow"></i>
								</a> 
							</div>
					</div>
				</section> -->

			</div>
			
			<div class="aside__container">
				<?php get_sidebar(); ?>
			</div>
			<!-- <aside class="aside">
				<div class="aside__container">
					<section class="subscribe">
						<form class="subscribe__content">
							<h6 class="subscribe__title">Подпишись на обновления</h6>
							<input type="email" placeholder="Введите ваш e-mail" class="subscribe__input">
							<button type="submit" class="subscribe__btn">Подписаться</button>
						</form>
					</section>
					<section class="popular">
						<div class="popular__content">
							<h6 class="popular__title">Полулярные рецепты</h6>
							<div class="popular__recipe recipe-popular">
								<div class="recipe-popular__row">
									<div class="recipe-popular__column">
										<div class="recipe-popular__title">Бутерброд с сыром</div>
										<div class="recipe-popular__panel">
											<div class="recipe-popular__unit">
												<i class="icon-likes"></i>
												<span>100</span>
											</div>
											<div class="recipe-popular__unit">
												<i class="icon-commets"></i>
												<span>10</span>
											</div>
											<div class="recipe-popular__unit">
												<i class="icon-views"></i>
												<span>10</span>
											</div>
										</div>
									</div>
									<div class="recipe-popular__column">
										<a href="#">
											<div class="recipe-popular__img">
												<picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="popular__recipe recipe-popular">
								<div class="recipe-popular__row">
									<div class="recipe-popular__column">
										<div class="recipe-popular__title">Бутерброд с сыром</div>
										<div class="recipe-popular__panel">
											<div class="recipe-popular__unit">
												<i class="icon-likes"></i>
												<span>100</span>
											</div>
											<div class="recipe-popular__unit">
												<i class="icon-commets"></i>
												<span>10</span>
											</div>
											<div class="recipe-popular__unit">
												<i class="icon-views"></i>
												<span>10</span>
											</div>
										</div>
									</div>
									<div class="recipe-popular__column">
										<a href="#">
											<div class="recipe-popular__img">
												<picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="popular__recipe recipe-popular">
								<div class="recipe-popular__row">
									<div class="recipe-popular__column">
										<div class="recipe-popular__title">Бутерброд с сыром</div>
										<div class="recipe-popular__panel">
											<div class="recipe-popular__unit">
												<i class="icon-likes"></i>
												<span>100</span>
											</div>
											<div class="recipe-popular__unit">
												<i class="icon-commets"></i>
												<span>10</span>
											</div>
											<div class="recipe-popular__unit">
												<i class="icon-views"></i>
												<span>10</span>
											</div>
										</div>
									</div>
									<div class="recipe-popular__column">
										<a href="#">
											<div class="recipe-popular__img">
												<picture><source srcset="img/recipe/02-thumb.webp" type="image/webp"><img src="img/recipe/02-thumb.png" alt=""></picture>
											</div>
										</a>
									</div>
								</div>
							</div>
						
						</div>
					</section>
					<section class="extra">
						<div class="extra__content">
							<h6 class="extra__title">Реклама</h6>
							<div class="extra__body">
								<div class="extra__part">
									<span>Блок с рекламой</span>
								</div>
							</div>
						</div>
					</section>
					<section class="sim">
						<div class="sim__content">
							<h6 class="sim__title">Дополнительный блок</h6>
							<div class="sim__body"></div>
						</div>
					</section>
				</div>
			</aside>     -->

		</div>

	</main>
        
<?php get_footer(); ?>