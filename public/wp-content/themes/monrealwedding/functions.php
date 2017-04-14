<?php

/**
 * MonrealWedding functions and definitions
 *
 * @package MonrealWedding
 */
// Установите ограничение на количество слов в сообщении 
function monrealwedding_content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content) >= $limit) {
    array_pop($content);
    $content = implode(' ', $content) . '...';
  }
  else {
    $content = implode(' ', $content);
  }
  $content = preg_replace('/\[.+\]/', '', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Установите ширину контента, основанную на дизайне и стилях темы.
 */
if (!function_exists('monrealwedding_setup')) :

  /**
   * Устанавливает параметры по умолчанию для тем и поддерживает регистры 
   * для различных функций WordPress.
   *
   * Обратите внимание, что эта функция подключена к хуку after_setup_theme, 
   * который выполняется перед вызовом init hook. Init hook инициализирует
   * слишком поздно для некоторых функций, такие как 
   * отображение значков вспомогательной почты.
   * 
   */
  function monrealwedding_setup() {
    if (!isset($content_width))
      $content_width = 640; /* pixels */

    load_theme_textdomain('monrealwedding', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('woocommerce');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support('title-tag');
    register_nav_menus(array(
      'primary' => __('Primary Menu', 'monrealwedding'),
    ));
    add_theme_support('custom-background', array(
      'default-color' => 'ffffff'
    ));
    add_editor_style('editor-style.css');
  }

endif; // monrealwedding_setup
add_action('after_setup_theme', 'monrealwedding_setup');

function monrealwedding_widgets_init() {

  register_sidebar(array(
    'name' => __('Blog Sidebar', 'monrealwedding'),
    'description' => __('Appears on blog page sidebar', 'monrealwedding'),
    'id' => 'sidebar-1',
    'before_widget' => '',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3><aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
  ));
}

add_action('widgets_init', 'monrealwedding_widgets_init');

/*
 * Используйте эту функцию для настройки боковой панели блога по умолчанию.
 */

function monrealwedding_font_url() {
  $font_url = '';

  /*
   * Переводчики: Если есть какие-либо символы, 
   * которые не поддерживаются Освальдом, 
   * отключите это, не переводите на свой язык.
   */
  $roboto_condensed = _x('on', 'roboto_condensed:on or off', 'monrealwedding');
  $greatvibes = _x('on', 'greatvibes:on or off', 'monrealwedding');

  /* Переводчики: Если у вас есть какой-либо символ, 
   * который не поддерживается Scada, 
   * отключите его, не переводите на свой язык.
   */

  if ('off' !== $roboto_condensed || 'off' !== $greatvibes) {
    $font_family = array();

    if ('off' !== $roboto_condensed) {
      $font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
    }
    if ('off' !== $greatvibes) {
      $font_family[] = 'Great Vibes:400';
    }

    $query_args = array(
      'family' => urlencode(implode('|', $font_family)),
    );

    $font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
  }

  return $font_url;
}

function monrealwedding_scripts() {
  wp_enqueue_style('monrealwedding-font', monrealwedding_font_url(), array());
  wp_enqueue_style('monrealwedding-basic-style', get_stylesheet_uri());
  wp_enqueue_style('monrealwedding-editor-style', get_template_directory_uri() . '/editor-style.css');
  wp_enqueue_style('monrealwedding-nivoslider-style', get_template_directory_uri() . '/css/nivo-slider.css');
  wp_enqueue_style('monrealwedding-main-style', get_template_directory_uri() . '/css/responsive.css');
  wp_enqueue_style('monrealwedding-base-style', get_template_directory_uri() . '/css/style_base.css');
  wp_enqueue_script('monrealwedding-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery'));
  wp_enqueue_script('monrealwedding-custom_js', get_template_directory_uri() . '/js/custom.js');
  wp_enqueue_style('monrealwedding-font-awesome-style', get_template_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_style('monrealwedding-animation-style', get_template_directory_uri() . '/css/animation.css');

  // Load the Internet Explorer specific stylesheet.
  wp_enqueue_style('monrealwedding-ie', get_template_directory_uri() . '/css/ie.css', array('monrealwedding-style'), '20131205');
  wp_style_add_data('monrealwedding-ie', 'conditional', 'IE');

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'monrealwedding_scripts');

function monrealwedding_pagination() {
  /* Установите эту функцию для ссылок разбивки на страницы */
  global $wp_query;
  $big = 12345678;
  $page_format = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'type' => 'array'
  ));
  if (is_array($page_format)) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<div class="pagination"><div><ul>';
    echo '<li><span>' . esc_attr($paged) . ' of ' . esc_attr($wp_query->max_num_pages) . '</span></li>';
    foreach ($page_format as $page) {
      echo '<li>' . $page . '</li>';
    }
    echo '</ul></div></div>';
  }
}

define('MONREALWEDDING_MAIN_URL', 'htpp://stoneagate.ru');
define('MONREALWEDDING_THEME_URL', 'htpp://stoneagate.ru/wordpres-themes');
define('MONREALWEDDING_THEME_DOC', 'htpp://stoneagate.ru/wordpres-themes/documentation/wedding-doc/');
define('MONREALWEDDING_PRO_THEME_URL', 'htpp://stoneagate.ru/wordpres-themes/');
define('MONREALWEDDING_THEME_FEATURED_SET_VIDEO_URL', 'https://www.youtube.com/watch?v=310YGYtGLIM');

/**
 * Внедрение функции пользовательского заголовка.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Пользовательские теги шаблонов для этой темы.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Пользовательские функции, которые действуют независимо от шаблонов тем.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Добавления модификатора.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Загрузите файл совместимости Jetpack.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Установите эту функцию для постраничной публикации блога
 */
function monrealwedding_custom_blogpost_pagination($wp_query) {
  $big = 999999999; // need an unlikely integer
  if (get_query_var('paged')) {
    $pageVar = 'paged';
  }
  elseif (get_query_var('page')) {
    $pageVar = 'page';
  }
  else {
    $pageVar = 'paged';
  }
  $pagin = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?' . $pageVar . '=%#%',
    'current' => max(1, get_query_var($pageVar)),
    'total' => $wp_query->max_num_pages,
    'prev_text' => '&laquo; Prev',
    'next_text' => 'Next &raquo;',
    'type' => 'array'
  ));
  if (is_array($pagin)) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<div class="pagination"><div><ul>';
    echo '<li><span>' . $paged . ' of ' . $wp_query->max_num_pages . '</span></li>';
    foreach ($pagin as $page) {
      echo "<li>$page</li>";
    }
    echo '</ul></div></div>';
  }
}

/**
 * Получить slug по id
 */
function monrealwedding_get_slug_by_id($id) {
  $post_data = get_post($id, ARRAY_A);
  $slug = $post_data['post_name'];
  return $slug;
}

/**
 * Вставляю favicon.ico
 */
function monrealwedding_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_template_directory_uri() . '/images/favicons/animated_favicon1.gif ">';
  echo '<link rel="icon" type="image/gif" href="' . get_template_directory_uri() . '/images/favicons/animated_favicon1.gif ">';
}

add_action('wp_head', 'monrealwedding_favicon');

/**
 * Меняю логотип при входе и/или регистрации
 */
function monrealwedding_login_logo() {
  echo '
   <style type="text/css">
        #login h1 a { background: url(' . get_bloginfo('template_directory') . '/images/MonrealWeddingLogo-Red2-smol.svg) no-repeat 0 0 !important; }
    </style>';
}

/**
 * удаляет сообщение о новой версии WordPress у всех пользователей кроме администратора
 */
if (is_admin() && !current_user_can('manage_options')) {
  add_action('init', function() {
    remove_action('init', 'wp_version_check');
  }, 2);
  add_filter('pre_option_update_core', '__return_null');
}
