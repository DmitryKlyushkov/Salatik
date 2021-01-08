<?php
/**
 * =================
 *  HEADER TEMPLATE
 * =================
 *
 * @package salatik
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php bloginfo( 'description' ) ?>" />
    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <?php if( is_singular() && pings_open( get_queried_object() ) ) :?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >
    <?php endif; ?>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <?php wp_head(); ?>
  </head>
  <div class="wrapper">
      <a href="#header-sec" class="scroll-top">
        <i class="icon-arrow"></i>
      </a>
      <header class="header" id="header-sec">
    <div class="header__upper">
        <div class="header__upper-container">

            <!-- burger-menu -->
            <div class="menu-icon__container">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <!-- burger-menu -->

            <a href="<?php echo home_url(); ?>" class="header__logo">salatik</a>
            
            <!-- login hidden -->
            <div class="login__hidden">
                <div class="dropdown login-dropdown">
                    <img src="<?php get_template_directory_uri(). 'assets/img/icons/user.png'; ?>" alt="">
                </div>
                <ul class="dropdown__container login-dropdown__container">
                    <li><a href="#" class="header__login">Вход</a></li>
                    <li><a href="#" class="header__reg">Регистрация</a></li>
                </ul>
            </div>
            <!-- login hidden -->
            <?php get_search_form(); ?>
            <!-- <form action="" class="header__search-bar">
                <button class="header__search-btn">
                    <i class="icon-search"></i>
                </button>
                <input type="search" class="header__search-input" placeholder="Поиск рецептов" required>
            </form> -->
            <?php wp_nav_menu( [
                'theme_location'  	    => 'primary',
                'menu'            		=> 'primary menu', 
                'container'       		=>  false, 
                'menu_class'      	    => 'header__nav', 
                'echo'            		=> true,
                'items_wrap'      	    => '<ul class="%2$s">%3$s</ul>',
                'depth'           		=> 0,
            ] );?>
            <?php wp_nav_menu( [
                'theme_location'  	    => 'login',
                'menu'            		=> 'login menu', 
                'container'       		=>  false,
                'menu_class'      	    => 'header__login-container', 
                'echo'            		=> true,
                'items_wrap'      	    => '<ul class="%2$s">%3$s</ul>',
                'depth'           		=> 0,
            ] );?>
            <div class="mobile-menu">
                <?php wp_nav_menu( [
                    'theme_location'  	    => 'mobile_primary',
                    'menu'            		=> 'mobile_primary', 
                    'container'       		=>  false,
                    'menu_class'      	    => 'mobile-menu--up', 
                    'echo'            		=> true,
                    'items_wrap'      	    => '<ul class="%2$s">%3$s</ul>',
                    'depth'           		=> 0,
                ] );?>
                <div class="mobile-menu__line"></div>
                <?php wp_nav_menu( [
                    'theme_location'  	    => 'mobile_bottom',
                    'menu'            		=> 'mobile_bottom', 
                    'container'       		=>  false,
                    'menu_class'      	    => 'mobile-menu--bot', 
                    'echo'            		=> true,
                    'items_wrap'      	    => '<ul class="%2$s">%3$s</ul>',
                    'depth'           		=> 2,
                    'walker'                => new My_Walker_Nav_Menu(),
                ] );?>
            </div>
        </div>
    </div>
    <div class="header__bottom">
    <?php wp_nav_menu( [
        'theme_location'  	    => 'header_bottom',
        'menu'            		=> 'header bottom', 
        'container'       		=> 'nav', 
        'container_class' 	    => 'header__bottom-container', 
        'menu_class'      	    => 'header__nav-bot header-nav-bot', 
        'echo'            		=> true,
        'items_wrap'      	    => '<ul class="%2$s">%3$s</ul>',
        'depth'           		=> 2,
        ] );?>
    </div>
</header>
