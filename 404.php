<?php
/**
 *  =====================
 *  404 PAGE (NOT FOUND)
 *  =====================
 *
 * @package salatik
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'theme_name' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php esc_html_e( 'Maybe try a search?', 'theme_name' ); ?></p>
				</div>
			</div>

		</main>
	</div>

<?php
get_footer();