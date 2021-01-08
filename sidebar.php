<?php
/**
 * ===============
 *  	SIDEBAR
 * ===============
 *
 * @package salatik
 */

if ( !is_active_sidebar( 'sidebar' ) ) {
	return;
}

?>

<aside id="aside" class="aside" role="complementary"> 
	<div class="aside__container">
		<?php dynamic_sidebar( 'sidebar' ); ?> 
	</div>
</aside>