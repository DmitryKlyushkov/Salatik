<?php
/**
 * =======================
 *  ARCHIVE PAGE TEMPLATE
 * =======================
 *
 * @package salatik
 */
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

<h2 class="archive__title"><?php esc_html_e('Все рецепты', 'salatik'); ?></h2>
<section class="about about--search">
	<div class="about__recipes">
		<div class="about__recepies_container">
			<div class="about__row">
			<?php 
				$args = array(
				'post_type'       => 'recipe',
				'posts_per_page'  => -1,
				'post_status'     => 'publish'
				);

				$query = new WP_Query( $args );

				if ($query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
					get_template_part('template-parts/content/content-recipe-home', get_post_format());
					endwhile;
				endif;

			?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>