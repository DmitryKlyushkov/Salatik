<?php
/**
 * ===============
 * SIDEBAR LOW AD
 * ===============
 *
 * @package salatik
 */

if ( !is_active_sidebar( 'sidebar-low-ad' ) ) {
	return;
}

?>

<div class="fff">
    <div class="fff__container">
        <?php dynamic_sidebar( 'sidebar-low-ad' ); ?> 
    </div>
</div>
