<?php
/**
 * ===============
 *  PAGE TEMPLATE
 * ===============
 *
 * @package salatik
 */

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
$parent = category_has_parent($cat_id);
if ($parent) {
	$parent_cat = get_category($category->parent);
	$parent_name = $parent_cat->cat_name;
}
$cat_name = single_cat_title( '', false );
?>

<?php get_header(); ?>

<body <?php body_class(); ?>>

	<h2 class="archive__title">
	<?php 
	if( !empty($parent_name) ) {
		echo $parent_name, ':', '&nbsp;', $cat_name;
	} else {
		echo $cat_name;
	}
	
	?>
	</h2>
	<section class="about about--search">
		<div class="about__recipes">
			<div class="about__recepies_container">
				<div class="about__row">
				<?php 
					$args = array(
					'post_type'			=> 'recipe',
					'posts_per_page'	=> -1,
					'post_status'     	=> 'publish',
					'category__in'	  	=>	$cat_id,
					);

					$query = new WP_Query( $args );

					if ($query->have_posts() ) :
						while ( $query->have_posts() ) : $query->the_post();
						get_template_part('template-parts/content/content-recipe-home', get_post_format());
						endwhile;
					else:
						echo '<h2>'.esc_html__('Рецептов данного типа еще нет', 'salatik').'</h2>';
					endif;
					
				?>
				</div>
			</div>
		</div>
	</section>
        
<?php get_footer(); ?>