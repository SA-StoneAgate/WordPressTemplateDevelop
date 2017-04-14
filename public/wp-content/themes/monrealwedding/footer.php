<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package MonrealWedding
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-4 widget-column-2">            	
             <div class="social-icons">
             		<?php if ( '' !== get_theme_mod( 'fb_link' ) ){  ?>
                    <a title="facebook" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a> 
                    <?php } ?>
                    <?php if ( '' !== get_theme_mod( 'twitt_link' ) ){  ?>
                    <a title="twitter" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?> 
                    <?php if ( '' !== get_theme_mod( 'gplus_link' ) ){  ?>
                    <a title="google-plus" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php } ?>
                    <?php if ( '' !== get_theme_mod( 'linked_link' ) ){  ?>
                    <a title="linkedin" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?>
                  </div>  
              </div><!--end .widget-column-2-->     
               <div class="cols-last widget-column-3">    
               <?php printf( esc_html__( 'Theme %1$s %2$s', 'monrealwedding' ), esc_html__('by', 'monrealwedding'), '<a href="'.esc_url(MONREALWEDDING_MAIN_URL).'">'.esc_html__('StoneAgate Themes', 'monrealwedding').'</a>' ); ?>                            
                </div><!--end .widget-column-3-->
            <div class="clear"></div>
        </div><!--end .container-->
    </div><!--end .footer-->
<?php wp_footer(); ?>
</body>
</html>