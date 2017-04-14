<?php
/**
 * MonrealWedding Theme Customizer
 *
 * @package MonrealWedding
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function monrealwedding_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class Monrealwedding_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'monrealwedding'),
            'priority' => 1,
 			'description' => sprintf( __( 'Logo Settings available in<br /> %s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' ), __( 'PRO Version', 'monrealwedding' )
						)
					),				
        )
    );  
    $wp_customize->add_setting('monrealwedding_options[logo-info]',array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Monrealwedding_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'monrealwedding_options[logo-info]',
        'priority' => null
        ) )
    );
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#c34370',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','monrealwedding'),
 			'description' => sprintf( __( 'More color options in <br /> %s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' ), __( 'PRO Version', 'monrealwedding' )
						)
					),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	

	$wp_customize->add_section('home_boxes', array(
		'title'	=> __('Homepage Boxes','monrealwedding'),
		'description'	=> __('','monrealwedding'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('section_title1',array(
			'default'	=> __('Request the honour of your presence at their marriage','monrealwedding'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control( 'section_title1', array(		
				'label'	=> __('Enter here your section title','monrealwedding'),
				'setting'	=> 'section_title1',
				'section'	=> 'home_boxes'
	));	
	
	$wp_customize->add_setting('column_first', array(
			'default'	=> __('<div class="one_half"><h4>Nick <span>Jackson</span></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ligula nisi. Vestibulum a magna auctor, tristique sapien et, tempus velit. Proin feugiat dui ac egestas aliquet. In erat arcu, accumsan mollis tincidunt quis, venenatis ut massa. Duis aliquet auctor dui id placerat. Aenean euismod semper ante adipiscing molestie.</p>
			<div class="social-icons">
    <a href="#" target="_blank" class="fa fa-facebook" title="facebook"></a>
    <a href="#" target="_blank" class="fa fa-twitter" title="twitter"></a>
    <a href="#" target="_blank" class="fa fa-google-plus" title="google-plus"></a>
    <a href="#" target="_blank" class="fa fa-linkedin" title="linkedin"></a>
    <a href="#" target="_blank" class="fa fa-pinterest" title="linkedin"></a>
</div><a class="more-button" href="#">About My <span>Family</span></a></div>','monrealwedding'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'column_first',
        array(
            'label'          => __( 'First column content','monrealwedding' ),
            'section'        => 'home_boxes',
            'settings'       => 'column_first',
            'type'           => 'textarea',
        )
    )
);	
		
	$wp_customize->add_setting('column_second',array(
			'default'	=> __('<div class="one_half last_column"><h4>Nick <span>Jackson</span></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ligula nisi. Vestibulum a magna auctor, tristique sapien et, tempus velit. Proin feugiat dui ac egestas aliquet. In erat arcu, accumsan mollis tincidunt quis, venenatis ut massa. Duis aliquet auctor dui id placerat. Aenean euismod semper ante adipiscing molestie.</p><div class="social-icons">
    <a href="#" target="_blank" class="fa fa-facebook" title="facebook"></a>
    <a href="#" target="_blank" class="fa fa-twitter" title="twitter"></a>
    <a href="#" target="_blank" class="fa fa-google-plus" title="google-plus"></a>
    <a href="#" target="_blank" class="fa fa-linkedin" title="linkedin"></a>
    <a href="#" target="_blank" class="fa fa-pinterest" title="linkedin"></a>
</div><a class="more-button" href="#">About My <span>Family</span></a></div> ','monrealwedding'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'column_second',
        array(
            'label'          => __( 'Second column content','monrealwedding' ),
            'section'        => 'home_boxes',
            'settings'       => 'column_second',
            'type'           => 'textarea',
        )
    )
);	
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','monrealwedding'),
		'description' => sprintf( __( 'Slider Image Dimensions ( 1400 X 459 )<br/><br/> More slider settings available in <a href="%1$s" target="_blank">PRO Version</a>', 'monrealwedding' ),
			esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' )
		),			   	
		'priority'		=> null
	));
// Slider Section

	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(   new WP_Customize_Image_Control( $wp_customize, 'slide_image1', array(
            'label' => __('Slide Image 1','monrealwedding'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
       		)
     	 )
	);	
	$wp_customize->add_setting('slide_title1',array(
			'default'	=> __('Nick and Sarah','monrealwedding'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title1', array(	
			'label'	=> __('Slide title 1','monrealwedding'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title1'
	));
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> __('We inviting you and your family on 25 December 2015','monrealwedding'),
		'sanitize_callback'	=> 'wptexturize'	
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'slide_desc1',
			array(
				'label'          => __( 'Slider description  1','monrealwedding' ),
				'section'        => 'slider_section',
				'settings'       => 'slide_desc1',
				'type'           => 'textarea',
			)
		)
	);	
	
	$wp_customize->add_setting('slide_link1',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link1',array(
			'label'	=> __('Slide link 1','monrealwedding'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link1'
	));	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'slide_image2', array(
				'label'	=> __('Slide image 2','monrealwedding'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image2'
			)
		)
	);	
	$wp_customize->add_setting('slide_title2',array(
			'default'	=> __('Nick and Sarah','monrealwedding'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title2', array(	
			'label'	=> __('Slide title 2','monrealwedding'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title2'
	));	
	$wp_customize->add_setting('slide_desc2',array(
			'default'	=> __('We inviting you and your family on 25 December 2015','monrealwedding'),
			'sanitize_callback'	=> 'wptexturize'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'slide_desc2',
			array(
				'label'          => __( 'Slider description 2','monrealwedding' ),
				'section'        => 'slider_section',
				'settings'       => 'slide_desc2',
				'type'           => 'textarea',
			)
		)
	);		
	
	$wp_customize->add_setting('slide_link2',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide link 2','monrealwedding'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_link2'
	));	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,'slide_image3', array(
				'label'	=> __('Slide Image 3','monrealwedding'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image3'				
		))
	);	
	$wp_customize->add_setting('slide_title3',array(
			'default'	=> __('Nick and Sarah','monrealwedding'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title3', array(		
			'label'	=> __('Slide title 3','monrealwedding'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title3'			
	));	
	$wp_customize->add_setting('slide_desc3',array(
			'default'	=> __('We inviting you and your family on 25 December 2015','monrealwedding'),
			'sanitize_callback'	=> 'wptexturize'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'slide_desc3',
			array(
				'label'          => __( 'Slider description 3','monrealwedding' ),
				'section'        => 'slider_section',
				'settings'       => 'slide_desc3',
				'type'           => 'textarea',
			)
		)
	);		
	
	$wp_customize->add_setting('slide_link3',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link3',array(
			'label'	=> __('Slide link 3','monrealwedding'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link3'
	));	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','monrealwedding'),
 			'description' => sprintf( __( 'Add social icons link here.<br />More icon available in %s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' ), __( 'PRO Version', 'monrealwedding' )
						)
					),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','monrealwedding'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','monrealwedding'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','monrealwedding'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','monrealwedding'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','monrealwedding'),
			'priority'	=> null,
 			'description' => sprintf( __( 'To remove credit &amp; copyright text upgrade to <br />%s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' ), __( 'PRO Version', 'monrealwedding' )
						)),			
	));
	$wp_customize->add_setting('monrealwedding_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Monrealwedding_Info( $wp_customize, 'cred_section', array(
		'label'	=> __('','monrealwedding'),
        'section' => 'footer_area',
        'settings' => 'monrealwedding_options[credit-info]'
        ) )
    );
	
	
	$wp_customize->add_section( 'theme_layout_sec', array(
            'title' => __('Layout Settings (PRO Version)', 'monrealwedding'),
            'priority' => null,
 			'description' => sprintf( __( 'Layout Settings available in <br />%s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' ), __( 'PRO Version', 'monrealwedding' )
						)),				
        )
    );  
    $wp_customize->add_setting('monrealwedding_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Monrealwedding_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'monrealwedding_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section('theme_font_sec', array(
            'title' => __('Fonts Settings (PRO Version)', 'monrealwedding'),
            'priority' => null,
 			'description' => sprintf( __( 'Font Settings available in <br />%s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_PRO_THEME_URL.'"' ), __( 'PRO Version', 'monrealwedding' )
						)),				
        )
    );  
    $wp_customize->add_setting('monrealwedding_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Monrealwedding_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'monrealwedding_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section( 'theme_doc_sec', array(
            'title' => __('Documentation &amp; Support', 'monrealwedding'),
            'priority' => null,
 			'description' => sprintf( __( 'For documentation and support check this link <br />%s.', 'monrealwedding' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.MONREALWEDDING_THEME_DOC.'"' ), __( 'Wedding Documentation', 'monrealwedding' )
						)),				
        )
    );  
    $wp_customize->add_setting('monrealwedding_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Monrealwedding_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'monrealwedding_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'monrealwedding_customize_register' );

//Integer
function monrealwedding_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function monrealwedding_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,									
					.services-wrap .one_half h4 span,
					.copyright-txt span,					
					a.more-button span,
					.cols-4 span,
					.header .header-inner .logo h1		
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#c34370')); ?>;}
					 
					.social-icons a:hover, 
					.pagination ul li .current, 
					.pagination ul li a:hover, 
					#commentform input#submit:hover,
					.ReadMore,
					.ReadMore:hover,
					.nivo-controlNav a.active,
					h3.widget-title,
					.header .header-inner .nav ul li a:hover, 
					.header .header-inner .nav ul li.current_page_item a,
					.MoreLink:hover,
					.wpcf7 input[type="submit"]
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#c34370')); ?>;}
					
					.ReadMore, 
					.MoreLink,
					.header .header-inner .nav
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#c34370')); ?>;}
					
			</style>  
<?php   
} 
add_action('wp_head','monrealwedding_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function monrealwedding_customize_preview_js() {
	wp_enqueue_script( 'monrealwedding_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'monrealwedding_customize_preview_js' );


function monrealwedding_custom_customize_enqueue() {
	wp_enqueue_script( 'monrealwedding_custom_customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'monrealwedding_custom_customize_enqueue' );