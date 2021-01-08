<?php
/**
 * ===============
 *  SEARCH FORM
 * ===============
 *
 * @package theme_name
 */
?>

<form role="search" method="get" class="header__search-bar" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <button class="header__search-btn">
        <i class="icon-search"></i>
    </button>
    <input type="search" name="s" class="header__search-input" placeholder="<?php esc_html_e('Поиск рецептов', 'theme_name'); ?> value="<?php echo get_search_query(); ?>" required>
</form>