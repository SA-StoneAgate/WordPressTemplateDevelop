<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package MonrealWedding
 */

get_header(); 
?>
<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>   
<div class="container">
     <div class="page_content">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        monrealwedding_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php else: ?>
       <section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                      <?php if( get_theme_mod('section_title1') ) { ?>
                           <h2 class="section_title"><?php echo esc_attr( get_theme_mod('section_title1')); ?></h2>
                      <?php } else { ?>                      
                       <h2 class="section_title"><?php esc_attr_e('Request the honour of your presence at their marriage','monrealwedding');?></h2> 
						<?php } ?>
                      <?php if( get_theme_mod('column_first') ) { ?>
                           <?php echo wp_kses_post((get_theme_mod('column_first'))); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_half"><h4>Nick <span>Jackson</span></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ligula nisi. Vestibulum a magna auctor, tristique sapien et, tempus velit. Proin feugiat dui ac egestas aliquet. In erat arcu, accumsan mollis tincidunt quis, venenatis ut massa. Duis aliquet auctor dui id placerat. Aenean euismod semper ante adipiscing molestie.</p>
			<div class="social-icons">
    <a href="#" target="_blank" class="fa fa-facebook" title="facebook"></a>
    <a href="#" target="_blank" class="fa fa-twitter" title="twitter"></a>
    <a href="#" target="_blank" class="fa fa-google-plus" title="google-plus"></a>
    <a href="#" target="_blank" class="fa fa-linkedin" title="linkedin"></a>
    <a href="#" target="_blank" class="fa fa-pinterest" title="linkedin"></a>
</div><a class="more-button" href="#">About My <span>Family</span></a></div>'; } ?>

<?php if( get_theme_mod('column_second') ) { ?>
                           <?php echo wp_kses_post((get_theme_mod('column_second'))); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_half last_column"><h4>Nick <span>Jackson</span></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ligula nisi. Vestibulum a magna auctor, tristique sapien et, tempus velit. Proin feugiat dui ac egestas aliquet. In erat arcu, accumsan mollis tincidunt quis, venenatis ut massa. Duis aliquet auctor dui id placerat. Aenean euismod semper ante adipiscing molestie.</p>
			<div class="social-icons">
    <a href="#" target="_blank" class="fa fa-facebook" title="facebook"></a>
    <a href="#" target="_blank" class="fa fa-twitter" title="twitter"></a>
    <a href="#" target="_blank" class="fa fa-google-plus" title="google-plus"></a>
    <a href="#" target="_blank" class="fa fa-linkedin" title="linkedin"></a>
    <a href="#" target="_blank" class="fa fa-pinterest" title="linkedin"></a>
</div><a class="more-button" href="#">About My <span>Family</span></a></div>'; } ?>

                      
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>
  
 <section id="FrontBlogPost">
  <div class="container">
  <h2 class="section_title"><?php esc_attr_e('Latest Posts','monrealwedding'); ?></h2>       
     <div class="site-main">         
       <?php
	   $p = 0;
        global $wp_query;
        query_posts(array_merge($wp_query->query, array(
            'paged'          => get_query_var('paged'),
            'posts_per_page' => 3, 'orderby' => 'title', 'order' => 'DESC' )));       
    ?>
       <?php global $wp_query; ?>
        <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?><?php $p++; ?>      
            <div class="blog_lists BlogPosts <?php if( $p%3==0 ){?>last_column<?php } ?>">        
              <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <?php if( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail(); ?>
                <?php } else {  ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" />
                <?php } ?>
                </a>
               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="blog-meta"><?php echo get_the_date(); ?> | <?php comments_number(); ?></div>
              <?php echo wp_kses_post(monrealwedding_content(27)); ?>
              <a class="MoreLink" href="<?php the_permalink(); ?>"><?php esc_attr_e('Read more &raquo;','monrealwedding');?></a> 
              <div class="clear"></div>
          </div>       
        <?php endwhile; ?> 
        <?php //monrealwedding_pagination(); ?>   
      <div class="clear"></div>
  </div> 
  <?php get_sidebar(); ?>
  <div class="clear"></div>
  </div><!-- .container -->   
 </section><!-- #FrontBlogPost -->  
<?php endif; ?>
<?php get_footer(); ?>