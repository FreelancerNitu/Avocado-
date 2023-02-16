<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avocado
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'avocado' ); ?></a>

    <header id="masthead" class="site-header">
      <div class="container">
        <!-- <div class="row header-top">
          <div class="col">
            <span class="header-top-element">+88 01757288990</span>
          </div>
        </div> -->

        <div class="row header-bottom">
          <div class="col my-auto">
            <div class="social-links">
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-youtube"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col my-auto text-center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo d-block">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
              <p>NaCommerce Ecommerce Website</p>
            </a>
          </div>
          <div class="col my-auto text-right header-right">
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/user.png" alt=""></a>
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/heart.png" alt=""></a>
            <a href=""><span class="cart-count">20</span><img
                src="<?php echo get_template_directory_uri(); ?>/assets/img/cart.png" alt=""></a>
          </div>
        </div>
      </div>

      <nav id="site-navigation" class="main-navigation">
        <div class="container">
          <div class="row">
            <div class="col">
              <?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
            </div>
          </div>
        </div>
      </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
      <div class="container">
        <div class="row">
          <div class="col">