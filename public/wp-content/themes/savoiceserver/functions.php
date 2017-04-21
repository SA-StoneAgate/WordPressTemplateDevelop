<?php

/**
 * SAVoiceServer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SAVoiceServer
 */
if (!function_exists('savoiceserver_setup')) :

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function savoiceserver_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on SAVoiceServer, use a find and replace
     * to change 'savoiceserver' to the name of your theme in all the template files.
     */
    load_theme_textdomain('savoiceserver', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'menu-1' => esc_html__('Primary', 'savoiceserver'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('savoiceserver_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }

endif;
add_action('after_setup_theme', 'savoiceserver_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function savoiceserver_content_width() {
  $GLOBALS['content_width'] = apply_filters('savoiceserver_content_width', 640);
}

add_action('after_setup_theme', 'savoiceserver_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function savoiceserver_widgets_init() {
  register_sidebar(array(
    'name' => esc_html__('Sidebar', 'savoiceserver'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here.', 'savoiceserver'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'savoiceserver_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function savoiceserver_scripts() {
  wp_enqueue_style('savoiceserver-style', get_stylesheet_uri(), array(), '1.0.0');
  wp_enqueue_style('sav-custom-style', get_template_directory_uri() . '/css/sav-custom-style.css', array(), '1.0.0');
  wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/assets/bootstrap-3.3.7/css/bootstrap.min.css', array(), '3.3.7');
  wp_enqueue_style('font-awesome-min', get_template_directory_uri() . '/assets/font-awesome-4.7.0/css/font-awesome.min.css', array(), '4.7.0');

  wp_enqueue_style('jquery-fancybox-min-css', get_template_directory_uri() . '/assets/fancybox-3.0/dist/jquery.fancybox.min.css', array(), '3.0');

  if (!is_admin()) {
    wp_deregister_script('jquery');
//    wp_register_script('jquery', get_template_directory_uri() . '/assets/jQuery-1.12.4/jquery-1.12.4.min.js', false, '1.12.4', true);
    wp_register_script('jquery', get_template_directory_uri() . '/assets/jQuery-3.2.1/jquery-3.2.1.min.js', false, '3.2.1', true);
    wp_enqueue_script('jquery');
  }

  wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/assets/bootstrap-3.3.7/js/bootstrap.min.js', array(), '3.3.7', true);
  wp_enqueue_script('savoiceserver-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
  wp_enqueue_script('savoiceserver-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
  wp_enqueue_script('jquery-fancybox-min-js', get_template_directory_uri() . '/assets/fancybox-3.0/dist/jquery.fancybox.min.js', array(), '3.0', true);
  wp_enqueue_script('flowtype-js', get_template_directory_uri().'/assets/FlowType.JS/flowtype.js',array(),'1.1',true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'savoiceserver_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * navigation bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
