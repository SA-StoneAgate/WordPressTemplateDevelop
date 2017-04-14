<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package MonrealWedding
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php body_class(''); ?> <?php if ( !is_home() || !is_front_page() ) {?>id="innerPage"<?php } ?>>
<div class="header">  
        <div class="header-inner">
                <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                <h1><span class="textlogo"><span class="rightstyle"><?php bloginfo('name'); ?></span></span></h1>
                                <span class="tagline"><?php bloginfo( 'description' ); ?></span>                          
                        </a>
                        
                 </div><!-- logo -->                 
                <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_attr_e('Menu','monrealwedding'); ?></a>
                </div><!-- toggle -->
                <div class="nav">                  
                    <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
                </div><!-- nav --><div class="clear"></div>
                    </div><!-- header-inner -->
</div><!-- header -->
		<?php if ( is_home() || is_front_page() ) {?>
        <section id="home_slider">
					        
        	<?php
			$sldimages = ''; 
			$sldimages = array(
						'1' => get_template_directory_uri().'/images/slides/slider1.jpg',
						'2' => get_template_directory_uri().'/images/slides/slider2.jpg',
						'3' => get_template_directory_uri().'/images/slides/slider3.jpg',
			); ?>
            
        	<?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<4; $i++) {
				if ( get_theme_mod('slide_image'.$i, $sldimages[$i]) != "" ) {
					$imgSrc 	= get_theme_mod('slide_image'.$i, $sldimages[$i]);
					$imgTitle	= get_theme_mod('slide_title'.$i);
					$imgDesc	= get_theme_mod('slide_desc'.$i);
					$imgLink	= get_theme_mod('slide_link'.$i);
					if ( strlen($imgSrc) > 3 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $sldimages[$i]);
						$slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
						$slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ; ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                </div><?php
 
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                    <h2> 
                    <a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php echo esc_attr(get_theme_mod('slide_title'.$sln, __('Nick and Sarah','monrealwedding'))); ?></a>
                    </h2>
                    <p><?php  echo esc_attr(get_theme_mod('slide_desc'.$sln, __('We inviting you and your family on 25 December 2015','monrealwedding'))); ?></p>
                    <?php if( get_theme_mod('slide_link'.$sln, '#link') ) { ?>
                              <a class="ReadMore" href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php esc_html_e('Read More','monrealwedding'); ?></a>
                           <?php } ?>
                    </div>
                    </div><?php 
                } ?>
                </div>
                <div class="clear"></div><?php 
			}
            ?>           
        </section>
       <?php } else { ?>	
       
        <?php
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) {
				echo ' <div class="innerbanner"><img src="'.esc_url( $header_image ).'" width="'.get_custom_header()->width.'" height="'.get_custom_header()->height.'" alt="" /> </div>';
            }	
			else { 
            	echo '<div class="space10"></div>';
		    } ?>     
       
        <?php } ?>	