<?php    
/**
 * MonrealWedding functions and definitions
 *
 * @package MonrealWedding
 */

// Set the word limit of post content 
function monrealwedding_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(' ',$content).'...';
} else {
$content = implode(' ',$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'monrealwedding_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function monrealwedding_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'monrealwedding', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'monrealwedding' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // monrealwedding_setup
add_action( 'after_setup_theme', 'monrealwedding_setup' ); 

function monrealwedding_widgets_init() {	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'monrealwedding' ),
		'description'   => __( 'Appears on blog page sidebar', 'monrealwedding' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'monrealwedding_widgets_init' );
/*
* Use this function for Sets up theme defaults blog sidebar.
*/

function monrealwedding_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto_condensed = _x('on','roboto_condensed:on or off','monrealwedding');
		$greatvibes = _x('on','greatvibes:on or off','monrealwedding');		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/		
		
		if('off' !== $roboto_condensed || 'off' !== $greatvibes){
			$font_family = array();
			
			if('off' !== $roboto_condensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			if('off' !== $greatvibes){
				$font_family[] = 'Great Vibes:400';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function monrealwedding_scripts() {
	wp_enqueue_style('monrealwedding-font', monrealwedding_font_url(), array());
	wp_enqueue_style( 'monrealwedding-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'monrealwedding-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'monrealwedding-nivoslider-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_style( 'monrealwedding-main-style', get_template_directory_uri().'/css/responsive.css' );		
	wp_enqueue_style( 'monrealwedding-base-style', get_template_directory_uri().'/css/style_base.css' );
	wp_enqueue_script( 'monrealwedding-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'monrealwedding-custom_js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'monrealwedding-font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style( 'monrealwedding-animation-style', get_template_directory_uri().'/css/animation.css' );	
	
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'monrealwedding-ie', get_template_directory_uri() . '/css/ie.css', array( 'monrealwedding-style' ), '20131205' );
	wp_style_add_data( 'monrealwedding-ie', 'conditional', 'IE' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'monrealwedding_scripts' );


function monrealwedding_pagination() {
    /*Set this function for pagination links*/
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. esc_attr( $paged ) . ' of ' . esc_attr( $wp_query->max_num_pages ) .'</span></li>';
		foreach ( $page_format as $page ) {
			echo '<li>' . $page . '</li>';
		}
		echo '</ul></div></div>';
	}
}

define('MONREALWEDDING_MAIN_URL','htpp://stoneagate.ru');
define('MONREALWEDDING_THEME_URL','htpp://stoneagate.ru/wordpres-themes');
define('MONREALWEDDING_THEME_DOC','htpp://stoneagate.ru/wordpres-themes/documentation/wedding-doc/');
define('MONREALWEDDING_PRO_THEME_URL','htpp://stoneagate.ru/wordpres-themes/');
define('MONREALWEDDING_THEME_FEATURED_SET_VIDEO_URL','https://www.youtube.com/watch?v=310YGYtGLIM');
 
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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Set this fuction for blog pagination
 */
function monrealwedding_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}

// get slug by id
function monrealwedding_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}