<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Bootstrap_Essentials
*/

?>
  <!DOCTYPE html>
  <html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>

  <?php
          $navbar_margin = '';
          $navbar_position = get_option('navbar_position') == '' ? 'static' : get_option('navbar_position');
          $navbar_type = get_option('navbar_type') == '' ? 'default' : get_option('navbar_type');
          $navbar_align = get_option('navbar_align') == '' ? 'right' : get_option('navbar_align');
          
          if($navbar_position == 'fixed')
          {
            $navbar_margin = 'mt-navbar-height';
          }
  ?>

  <body <?php echo esc_attr(body_class(cards_class( 'well b-0 m-xs-0 p-xs-0 ') . ' ' . $navbar_margin)); ?>>
      <!--<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bootstrap-essentials' ); ?></a>-->

      <header id="masthead" class="site-header" role="banner">
        <?php 
        if($navbar_position == 'default')
        {
          ?>
        <div class="site-branding container">
          <h1 class="site-title mb-xs-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="no-underline"><?php bloginfo( 'name' ); ?></a></h1>
          <?php
          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
          <?php
          endif; ?>
        </div><!-- .site-branding -->
        <?php
        }
        ?>
        <nav class="navbar navbar-<?php echo esc_attr($navbar_type); ?> navbar-<?php echo esc_attr($navbar_position); ?>-top navbar-slide-nav mb-xs-0" role="navigation">
          <div class="container">
            <div class="navbar-right-static ml-xs-0">
              <ul class="navbar-nav nav">
                <li><a class="fs-xs-1-4" data-toggle="collapse" data-target="#searchbox"><span class="glyphicon glyphicon-search"></span></a></li>
              </ul>
            </div>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle pull-left" data-toggle="offcanvas" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <?php
        if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) :
            the_custom_logo();
        else :
            ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
                  <?php bloginfo( 'name' ); ?>
                </a>
                <?php endif; ?>
            </div>

            <?php
        wp_nav_menu( array(
        'menu_id'           => 'primary-menu',
        'theme_location'    => 'menu-1',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'offcanvas navbar-slide navbar-'. esc_attr($navbar_align),
        'container_id'      => 'navbar',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker())
        );
        ?>
          </div>
        </nav>
        
        <div class="collapse <?php echo esc_attr($navbar_margin); ?>" id="searchbox">
          <div class="well mb-xs-0 pb-xs-0">
            <div class="container p-xs-0">
              <?php get_search_form() ?>
            </div>
          </div>
        </div>
      </header>
      <!-- #masthead -->
      <div class="container">
        <?php if ( get_header_image() ) : ?>
            <div id="site-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" class="img-responsive" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            </div>
        <?php endif; ?>
      </div>