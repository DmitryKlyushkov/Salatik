<?php
/**
 * ======================
 *  SINGLE PAGE TEMPLATE
 * ======================
 *
 * @package salatik
 */
global $post;
$author_id = $post->post_author;
$post_id = get_the_ID();
setPostViews($post_id);
$category = wp_get_post_categories( $post_id );

$meta_ingredients = trim( get_post_meta( $post_id, 'ingredients', true ) );
preg_match_all("/([А-Яа-я]+\s)+(?=\()/imu", $meta_ingredients, $ingredients_names );
preg_match_all("/(?<=\()(.*?)(?=\))/m", $meta_ingredients, $ingredients_numbers );
				
$meta_calories = trim( get_post_meta( $post_id, 'calories', true ) );
preg_match_all("/[A-Za-zА-Яа-я]+\s([A-Za-zА-Яа-я]?)+/imu", $meta_calories, $calories_names );
preg_match_all("/(?<=\()(.*?)(?=\))/m", $meta_calories, $calories_numbers);
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
							<span class="main-panel__username">

								<?php the_author_meta('display_name', $author_id); ?>

							</span>
						</div>
						<div class="main-panel__date">
							<i class="icon-date"></i>
							<span class="main-panel__datetime">

								<?php the_time( 'd.m.Y' ); ?>

							</span>
						</div>
						<div class="main-panel__comments">
							<a href="<?php the_permalink() ?>#comments">
								<i class="icon-commets"></i>
							</a>
							<span class="main-panel__commentsnum">

								<?php echo get_comments_number(); ?>

							</span>
						</div>
						<div class="main-panel__views">
							<i class="icon-views"></i>
							<span class="main-panel__viewsnum">

								<?php echo getPostViews($post_id); ?>

							</span>
						</div>
						<div class="main-panel__rating">

							<?php echo rmp_get_visual_rating( $post_id ); ?>

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

						<?php 
						$title = get_the_title();
						if(!empty($title)):
						?>
						<h3 class="properties__title">

							<?php echo $title; ?>

						</h3>
						<?php endif; ?>

						<?php 
						$time = trim( get_post_meta( $post_id, 'time', true ) );
						if(!empty($time)): 
						?>
						<div class="properties__time">
							<i class="icon-watch"></i>
							<h6 class="properties__time--value">

								<?php echo $time ?>

							</h6>
						</div>
						<?php endif; ?>

					</div>

					<?php 
					$content = get_the_content();
					if(!empty($content)):
					?>
					<div class="properties__text">

						<?php echo $content; ?>  	

					</div>
					<?php endif; ?>

					<div class="properties__footer">

					<?php 
					if(!empty($ingredients_names[0])): 
					?>
						<div class="properties__ingredients ingredients">
							<div class="ingredients__inside">
								<div class="ingredients__header">
									<i class="icon-ingredients"></i>
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
							</div>
						</div>
						<?php endif; ?>

						<?php 
						if(!empty($calories_names[0])): 
						?>
						<div class="properties__calories calories">
							<div class="calories__inside">
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
							</div>
						</div>
						<?php endif; ?>

					</div>

				</section>
				
				<!-- <section class="stages">
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
				</section> -->

				<?php get_sidebar( 'low-ad' ); ?>

				<section class="share">
					<div class="share__container">
						<div class="share__row">
							<div class="share__column">
								<h6 class="share__title share__title--u"><?php esc_html_e('Поделиться в социальных сетях:', 'salatik'); ?></h6>
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
								<h6 class="share__title share__title--b"><?php esc_html_e('Оценить рецепт', 'salatik'); ?></h6>
								<form class="rating" method="POST" action="">
									<?php echo do_shortcode('[ratemypost]'); ?>	
								</form>
							</div>
						</div>
					</div>
				</section>

				<section class="similars">
					<?php 
					$args = array(
						'post_type' 	=> 'recipe',
						'posts_per_page'=> 4,
						'category__in' 	=> $category,
						'post__not_in'	=> array($post_id)
					);
					$query_similar = new WP_Query($args);
					if ( $query_similar->have_posts() ) : 
					?>				
					<div class="similars__container">
						<h4 class="similars__title"><?php esc_html_e('Похожие рецепты:', 'salatik'); ?></h4>
						<div class="similars__content">
							<div class="similars__row">
								<?php 
								while ( $query_similar->have_posts() ) : $query_similar->the_post();
								get_template_part('template-parts/content/content-similar', get_post_format());
								endwhile;
								?>
							</div>
						</div>
					</div>
					<?php 
					endif;
					wp_reset_postdata();
					?>
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