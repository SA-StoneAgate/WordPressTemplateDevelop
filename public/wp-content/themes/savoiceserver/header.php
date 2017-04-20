<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content" class="site-content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SAVoiceServer
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div class="container">
      <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'savoiceserver'); ?></a>

        <header id="masthead" class="site-header" role="banner">
          <div class="site-branding">
            <?php if (is_front_page() && is_home()) : ?>
              <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
              <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;

            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
              ?>
              <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php endif;
            ?>
          </div><!-- .site-branding -->

          <!--		<nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'savoiceserver'); ?></button>
          <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
              </nav> #site-navigation -->
        </header><!-- #masthead -->

        <!-- #site-navigation -->
        <nav class="navbar navbar-inverse " role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div><!--end navbar-header-->
            <div class="collapse navbar-collapse menu-primary" id="bs-example-navbar-collapse-1">
              <?php
              wp_nav_menu(array(
                'menu' => '',
                'theme_location' => 'primary',
                'depth' => 2,
                'container' => '',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'bs-example-navbar-collapse-1',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker())
              );
              ?>
              <div class="col-sm-3 col-md-3 pull-right search-navbar">
                <form class="navbar-form" role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>" >
                  <div class="input-group">
                    <input type="text" id="searchbox" class="form-control" placeholder="Search" name="s" id="s">
                    <div class="input-group-btn">
                      <button class="btn btn-default"  id="searchsubmit"  type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div><!--end navbar-colapse-->
          </div><!--end container-->
        </nav>

        <div id="content" class="site-content">
